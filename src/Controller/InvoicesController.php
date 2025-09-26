<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Mailer\MailerAwareTrait;


/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoicesController extends AppController
{
    use MailerAwareTrait;

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders'],
        ];
        $invoices = $this->paginate($this->Invoices);

        $this->set(compact('invoices'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $order = null)
    {
        $args = $this->request->getParam('pass');
        
        
        //check for number of args 
        if(count($args)>1){
            $id = $args[0];
        }else{
            $order = $args[0];
        }
        /*
        debug($args);
        debug('invoice '. $id);
        debug('Order '.$order);
        */
                
        $newInvoice = $this->Invoices->newEmptyEntity([
            'contain' => ['Orders.Clients.Profiles.Addresses','Orders.OrderDetails.Books','Orders.OrderDetails.Discounts',
            'Orders.Returns.OrderDetails.Books','Orders.Returns.OrderDetails.Discounts'
            ]]);
        $branch = $this->loadModel('Branches')->get(1,['contain'=>'Companies']);
        $invoice = null;
        try {
            $invoice = $this->Invoices->get($id, [
                'contain' => ['Orders.Clients.Profiles.Addresses','Orders.OrderDetails.Books','Orders.OrderDetails.Discounts',
                'Orders.Returns.OrderDetails.Books','Orders.Returns.OrderDetails.Discounts'
                ],
            ]);
            
            // ...
        } catch (\Cake\Datasource\Exception\RecordNotFoundException $exeption) {

            $this->add($id = null, $order = null);
            /*
            $newInvoice->order_id = $order;
            if($this->Invoices->save($newInvoice)){
                //debug($newInvoice->id);
                $this->getMailer('invoice')->send('welcome', [$newInvoice]);
                return $this->redirect(['action' => 'view', $newInvoice->id,$order]);
            }
            //$this->redirect($this->referer());
            // record doesn't exist*/
        }
        
        $this->set(compact('invoice','branch'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null, $order = null)
    {
        $this->Flash->error(__('Generated new invoice....'));

        $args = $this->request->getParam('pass');
                
        //check for number of args 
        if(count($args)>1){
            $id = $args[0];
        }else{
            $order = $args[0];
        }

        $invoice = $this->Invoices->newEmptyEntity([
            'associated' => ['Orders.Clients.Profiles.Addresses','Orders.OrderDetails.Books','Orders.OrderDetails.Discounts',
            'Orders.Returns.OrderDetails.Books','Orders.Returns.OrderDetails.Discounts'
            ]]);
        
        if ($this->request->is('post')) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The {0} has been saved.', 'Invoice'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Invoice'));
        }else{

            $invoice->order_id = $order;
            if($this->Invoices->save($invoice)){
                $invoice = $this->Invoices->get($invoice->id, [
                    'contain' => ['Orders.Clients.Profiles.Addresses','Orders.OrderDetails.Books','Orders.OrderDetails.Discounts',
                    'Orders.Returns.OrderDetails.Books','Orders.Returns.OrderDetails.Discounts'
                    ],
                ]);
                //debug($invoice);
                $this->getMailer('invoice')->send('welcome', [$invoice]);
                return $this->redirect(['action' => 'view', $invoice->id,$order]);
            }
            //$this->redirect($this->referer());
        }
        $orders = $this->Invoices->Orders->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'orders'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The {0} has been saved.', 'Invoice'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Invoice'));
        }
        $orders = $this->Invoices->Orders->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'orders'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoice = $this->Invoices->get($id);
        if ($this->Invoices->delete($invoice)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Invoice'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Invoice'));
        }

        return $this->redirect(['action' => 'index']);
    }
}