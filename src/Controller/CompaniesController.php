<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 * @method \App\Model\Entity\Company[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompaniesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function home()
    {
        
        return $this->index();
        
    }

    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    
    {
                
        $users = $this->loadModel('Users')->find()->count();
        $publishers = $this->loadModel('Publishers')->find()->count();
        $books = $this->Publishers->Books->find()->count();
        $stocks = $this->Publishers->Books->StockDetails->find()->where(['quantity >' => 0])->all();
        $clients = $this->loadModel('Clients')->find('all',['contain'=>'Profiles']);
        $companies = $this->paginate($this->Companies);

        $totalOrders = $this->Clients->Orders->find('all',['contain'=>'OrderDetails.Discounts'])->where(['payment_mode_id !=' => 3])->all();
        $totalOrderReturns = $this->Clients->Orders->find('all')->where(['payment_mode_id' => 3])->all();
        $allOrders = $this->Clients->Orders->find('all')->all();
        $allORder = 0;
        $totalOrderReturn = 0;
        $orderTotal = 0;
        $orderReceived = 0;
        $orderBalanceDue = 0;
        $stockCount = 0;
        $stockValue = 0;
        $totalDiscount = 0;

        //total order
        foreach($totalOrders as $totalOrder){
            $orderTotal += $totalOrder->total;
            $orderReceived += $totalOrder->received;    
            $orderBalanceDue += $totalOrder->balance_due; 
            //get order discoung
            foreach($totalOrder->order_details as $orderDetails){
                $discount = str_replace('%','',$orderDetails->discount->name);
                $totalDiscount += ($orderDetails->qty * $orderDetails->unit_price) * ($discount/100);
                
            }        
        }
        
        //total returned
        foreach($totalOrderReturns as $totalReturned){
            $totalOrderReturn += $totalReturned->total;                   
        }

        //total returned
        foreach($allOrders as $allOfOrders){
            $allORder += $allOfOrders->total;                   
        }

        //stocks
        foreach($stocks as $stock){
            $stockCount += $stock->quantity - $stock->quantity_out; 
            $stockValue += ($stock->quantity - $stock->quantity_out) * $stock->sales_price;   

        }
        
        $this->set(compact('companies','publishers','users','books','clients','orderTotal','orderReceived',
        'orderBalanceDue','totalOrderReturn','allORder','stockCount','stockValue','totalOrders','totalDiscount'));
    }

    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => ['Departments'],
        ]);

        $this->set(compact('company'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $company = $this->Companies->newEmptyEntity();
        if ($this->request->is('post')) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The {0} has been saved.', 'Company'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Company'));
        }
        $this->set(compact('company'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The {0} has been saved.', 'Company'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Company'));
        }
        $this->set(compact('company'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $company = $this->Companies->get($id);
        if ($this->Companies->delete($company)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Company'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Company'));
        }

        return $this->redirect(['action' => 'index']);
    }
}