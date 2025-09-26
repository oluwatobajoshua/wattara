<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Mailer\MailerAwareTrait;
use Cake\Routing\Router;



/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    use MailerAwareTrait;
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
     
    public function setpermission(){
        
        $user = $this->Users->get($this->Auth->User('id'));
        
        if($user->role_id == 1){
            $this->set('admin','admin');
        }elseif($user->role_id == 3){
            $this->set('cashier','cashier');
        }elseif($user->role_id == 2){
            $this->set('manager','manager');
        }
    }
    

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
                $this->Flash->success('You are logged in');
                
            }
            $this->Flash->error('Your username or password is wrong.');
        }
    }

    
    public function activate($getUniCode='', $randomKey=''){
        if(trim($getUniCode)!="" && $randomKey!="") {
            $getUniCode = filter_var($getUniCode, FILTER_SANITIZE_STRING);
            $getUser = $this->Users->find('all',['conditions'=> ['password_reset_token'=> $getUniCode,'status_id'=> 0]])->first(); 
            if($getUser) {
              $getUserId = $getUser->id;
              $updateActivate  = $this->Users->updateAll(['status_id'=> 1, 'password_reset_token'=> ''], ['id'=> $getUserId]);
              $this->Flash->success(__('Your account has been Activated successfully. please login'));              
            }
        }else{
            return $this->redirect(['action' => 'login']);
        }

        $this->set(compact('getUser'));
    }

    /*

    Reset Password

    */

    public function passwordReset($getUniCode='', $randomKey='')
    {
        $user = null;
    
        if(trim($getUniCode)!="" && $randomKey!="") {
            $user = $this->Users->find('all',['conditions'=> ['password_reset_token'=> $getUniCode,'status_id'=> 0]])->first(); 
            if(!$user){
                return $this->redirect(['action' => 'login']);
            }
        }else{
            return $this->redirect(['action' => 'login']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user ->password_reset_token = '';
            if ($this->Users->save($user)) {                
                $this->Flash->success(__('{0} reset successful, Please login with your new password', 'Password'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
        }

        $this->set(compact('user'));    
    }

    /*
     * Register method
     *
     * @return \Cake\Http\Response|null
     */
    public function register()
    {
        $newuser = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($newuser, $this->request->getData());
            debug($user);
            
            $user->role_id = 6; 
            $user->branch_id = 17;  
            $uniquecode = substr(md5(microtime()),0,10); //generate random string
            $randomKey = substr(md5(microtime()),0,10);
            $user->password_reset_token = $uniquecode;
            $user->hashval = $randomKey; 
            $user->accounts_count = 0;
            $user->status_id = 2;
            $user->currency = 'NGN';
            $userDataArr = [
                'userFullName' => $user->first_name,
                'userName' => $user->username,
                'userEmail' => $user->email,
                'url' => $aLink = Router::url(array("controller"=>"users","action"=>"activate", $uniquecode, $randomKey),true)
            ];
        
            if ($this->Users->save($user)) {
                debug($userDataArr);
                $this->getMailer('User')->send('welcome', [$userDataArr]);
                $this->Flash->success(__('Registration successful, please check your email to activate your account'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
        }
        
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $branches = $this->Users->Branches->find('list', ['limit' => 200]);

        $this->set(compact('newuser', 'roles', 'branches'));
    }

    /**
     * Forgot password  method
     *
     * @return \Cake\Http\Response|null
     */
    public function forgotPassword()
    {
        if ($this->request->is('post')) 
        {
            if (!empty($this->request->data))
            {
                $email = $this->request->data['email'];
                $username = $this->request->data['username'];
                $user = $this->Users->findByUsername($username)->first();
     
                if (!empty($user))
                {
                    $uniquecode = substr(md5(microtime()),0,10); //generate random string
                    $randomKey = substr(md5(microtime()),0,10);

                    $user->password_reset_token = $uniquecode;
                    $user->hashval = $randomKey;    

                    $reset_token_link = Router::url(array("controller"=>"users","action"=>"passwordReset", $uniquecode, $randomKey),true);

                    $user->email = $email;
                    $user->status_id = 0;

                    $userDataArr = [
                        'userFullName' => $user->username,
                        'userEmail' => $user->email,
                        'url' => $reset_token_link
                    ];
                                                         
                    $this->getMailer('User')->send('resetPassword', [$userDataArr]);
                    
                    $this->Users->save($user);
                    $this->Flash->success('Please click on password reset link, sent in your email address to reset password.');
                
                }
                else
                {
                    $this->Flash->error('Sorry! Email address is not available here.');
                }
            }
        }
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->setpermission();
        
        $keyword = '';
        if($this->request->is('post'))
        {
            //delete using id
            $keyword = $this->request->getData('table_search');     
        }
        
        $this->paginate = [
            'contain' => ['Roles', 'Branches'],
            'limit' => 10,
            'order' => [
            'created' => 'desc'],
            'sortWhitelist' => [
                 'id', 'username', 'role_id','branch_id','created','modified'
            ]
        ];
        $users = $this->paginate($this->Users->find()->where(['username LIKE'=>'%'.$keyword.'%']));

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        //$id = $this->Auth->user('id');
        
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Branches','Accounts','Profiles']
        ]);

        $keyword = '';
        
        if($this->request->is('post'))
        {
            //delete using id
            $keyword = $this->request->getData('table_search');        
       
        }
        
        $accountsQuery = $this->Users->Accounts
            ->find()
            ->matching('Users', function (\Cake\ORM\Query $query) use ($user,$keyword) {
                return $query->where([
                    'Users.id' => $user->id,
                    //'first_name LIKE'=>'%'.$keyword.'%'
                ]);
            });
        
        $paginationOptions = [
            'contain' => ['Branches','Users'],
            'limit' => 10,
            'order' => [
                'Accounts.id' => 'DESC'
            ]
        ];

        $accounts = $this->paginate($accountsQuery, $paginationOptions);

        $this->set('user', $user);
        $this->set('accounts', $accounts);
    }


    public function co($branchid = null)
    {
        
        $this->setpermission();
        
        $branch = $this->Users->Branches->get($branchid);  
        
        $creditofficers =  $this->Users->find('all',['contain' => 'Branches'])
                ->where(['branch_id' => $branchid])
                ->where(['role_id' => 4]);
        
        $this->set('branchid',$branchid);
        $this->set('branch',$branch);
        
        /* credit officer details */
        $user = $this->Users->get($this->Auth->User('id'));
        $this->set('toid',$user->role_id);  
        //$this->request->allowMethod('ajax');               
        //if the person logging in is a staff

        if($user->role_id == 1)
       {
                //THIS IS THE ADMIN
                //$u_count = $this->Users->find()->->where(['role_id != 1'])->count();
                //$accounts = $this->loadModel('Accounts')->find()
                //->where(['branch_id' => $branchid]);;

                //get total credit and debit
                $query = $this->loadModel('Branches')->get($branchid);   
                $users = $this->Users->find()
                ->where(['branch_id' => $branchid]);                

                $admin = 'admin';
                $co = 'co';
                $this->set('admin',$admin);
                $this->set('co',$co);
                $this->set('branch',$query);             
        }
        
        $branchname = $this->Users->Branches->get($branchid);
        $this->set('creditofficers',$creditofficers);
        //$this->set('count',$accounts->count());
        $this->set('user',$user); 
        $this->set('branchId',$branch);  
        $this->set('branchname',$branchname);  
    }

    /**
     * Other services
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function os($branchid = null)
    {
        $this->setpermission();
        
        $branch = $this->loadModel('Branches')->get($branchid);  
        
        $creditofficers =  $this->Users->find('all',['contain' => 'Branches'])
                ->where(['branch_id' => $branchid])
                ->where(['role_id' => 4]);
        
        $this->set('branchid',$branchid);
        $this->set('branch',$branch);
        
        /* credit officer details */
        $user = $this->Users->get($this->Auth->User('id'));
        $this->set('toid',$user->role_id);  
        //$this->request->allowMethod('ajax');               
        //if the person logging in is a staff

        if($user->role_id == 1)
       {
                //THIS IS THE ADMIN
                //$u_count = $this->Users->find()->->where(['role_id != 1'])->count();
                //$accounts = $this->loadModel('Accounts')->find()
                //->where(['branch_id' => $branchid]);;

                //get total credit and debit
                $query = $this->loadModel('Branches')->get($branchid);   
                $users = $this->Users->find()
                ->where(['branch_id' => $branchid]);                

                $admin = 'admin';
                $co = 'co';
                $this->set('admin',$admin);
                $this->set('co',$co);
                $this->set('branch',$query);             
        }
        
        $branchname = $this->Users->Branches->get($branchid);
        $this->set('creditofficers',$creditofficers);
        //$this->set('count',$accounts->count());
        $this->set('user',$user); 
        $this->set('branchId',$branch);  
        $this->set('branchname',$branchname);  
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->setpermission();
        
        $newuser = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($newuser, $this->request->getData(), [
                'associated' => [
                    'Profiles.Addresses',                
                ]
            ]);
            //debug($user);
            
            if ($this->Users->save($newuser)) {
                $this->Flash->success(__('The {0} has been saved.', 'User'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $branches = $this->Users->Branches->find('list', ['limit' => 200]);
        $this->set(compact('newuser', 'roles', 'branches'));
    }


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($this->Auth->User('id'));
        
        $this->setpermission();
        
        $newuser = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newuser = $this->Users->patchEntity($newuser, $this->request->getData());
            if ($this->Users->save($newuser)) {
                
                $this->Flash->success(__('The {0} has been saved.', 'User'));
                
                if($id == $this->Auth->User('id')){
                    return $this->redirect(['action' => 'logout']);
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $branches = $this->Users->Branches->find('list', ['limit' => 200]);
        $this->set(compact('newuser', 'roles', 'branches'));
    }


    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The {0} has been deleted.', 'User'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'User'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
    
}