<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Profiles.Addresses', 'Orders.PaymentModes', 'Orders.Statuses','Orders.Invoices'],
        ];

        $clients = $this->Clients;

        foreach($clients as $client){

        }

        $clients = $this->paginate($clients);

        $this->set(compact('clients'));
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => ['Profiles.Addresses', 'Orders.PaymentModes', 'Orders.Statuses','Orders.Invoices'],
        ]);

        $orders = $this->Clients->Orders->find()->where(['client_id' => $id, 'payment_mode_id !='=> 3])->all();
        $orderTotal = $orders->sumOf('total');
        $receivedTotal = $orders->sumOf('received');
        $return = $this->Clients->Orders->find()->where(['client_id' => $id, 'payment_mode_id'=> 3])->all();
        $returnTotal = $return->sumOf('total');   
        $balance = $orderTotal - ($receivedTotal + $returnTotal);

        $this->set(compact('client','orderTotal','returnTotal','receivedTotal','balance'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Auth->user('id');
         $client = $this->Clients->newEmptyEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData(),['associated' => 
            ['Profiles','Profiles.Addresses']]);
            //debug($client); exit;
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The {0} has been saved.', 'Client'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Client'));
        }
        $profiles = $this->Clients->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('client', 'profiles', 'user'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The {0} has been saved.', 'Client'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Client'));
        }
        $profiles = $this->Clients->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('client', 'profiles'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Client'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Client'));
        }

        return $this->redirect(['action' => 'index']);
    }
}