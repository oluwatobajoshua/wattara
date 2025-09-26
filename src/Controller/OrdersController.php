<?php

declare(strict_types=1);

use Cake\Mailer\MailerAwareTrait;

namespace App\Controller;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients.Profiles', 'PaymentModes', 'Statuses'],
        ];
        
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Invoices','Clients.Profiles', 'PaymentModes', 'Statuses', 'OrderDetails.Books','OrderDetails.Discounts','Receipts','Returns'],
        ]);

        $this->set(compact('order'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($clientId = null)
    {
        $stockNumber = 1;
        $order = $this->Orders->newEmptyEntity($data=null,['associated' => 'OrderDetails']);

        if ($this->request->is('post') && $this->request->getData('number')) {
            $stockNumber = $this->request->getData('number');
            //debug($stockNumber);
        }
        
        if ($this->request->is('post') && !$this->request->getData('number')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData()); 
            //debug($order->receipts[0]->amount) ;
            //set the amount received           
            if($order->receipts[0]->amount == null){
                $order->receipts = null;
            }else{
                $order->received = $order->receipts[0]->amount;
            }
            $order->status_id = 1;
            //update stock 
                foreach($order->order_details as $orderDetails){                
                        $orderQty = $orderDetails->qty;  
                        $stockDetails = $this->Orders->OrderDetails->Books->StockDetails->find()->where(['book_id' => $orderDetails->book_id])->all();
                        $totalQuantityIn = $stockDetails->sumOf('quantity');
                        $totalQuantityOut = $stockDetails->sumOf('quantity_out');
                        $availableStock = $totalQuantityIn - $totalQuantityOut; 
                        /*debug('Availabe Stock '.$availableStock);
                        debug('Qty Requested '.$orderQty);
                        */
                        if($availableStock >= $orderQty){
                            foreach($stockDetails as $stockDetail){                                                          
                                if(($stockDetail->quantity > $stockDetail->quantity_out) && ($orderQty > 0)){
                                    //debug('detail id '.$stockDetail->id );                                    
                                    //get total stock 
                                    $totalStock = $stockDetail->quantity - $stockDetail->quantity_out; 
                                    //debug('Total Stock '.$totalStock);
                                    //remove orderQty from total stock
                                    $remaininOrderQty =  abs($totalStock - $orderQty);
                                    //debug('Remaining Stock '.$remaininOrderQty);
                                    //number of stock removed
                                    $stockRemoved = abs($totalStock - $remaininOrderQty);
                                    //debug('What was removed '.$stockRemoved);                                                                                                                                            
                                    $orderQty = $orderQty - $stockRemoved;
                                    $stockDetail->quantity_out += $stockRemoved;  
                                    //debug('Remaining Order Qty '.$orderQty);                                                                                                                                                                                                                                                        
                                    $this->Orders->OrderDetails->Books->StockDetails->save($stockDetail);                                                                                             
                                }
                                                                                                                                    
                            }
                            
                        }else{
                            $this->Flash->error(__('There is not enough stock to perform this order, please check your stock level'));
                            return $this->redirect(['action' => 'index']);
                        }                                                              
                }
            //exit;
            if ($this->Orders->save($order)) {
                                
                $this->Flash->success(__('The {0} has been saved.', 'Order'));
                return $this->redirect(['action' => 'view', $order->id]);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Order'));
        }

        $books = $this->Orders->OrderDetails->Books->find('list');
        $discounts = $this->Orders->OrderDetails->Discounts->find('list', ['limit' => 200]);

        if($clientId){
            $clients = $this->Orders->Clients->find('list', [
                'contain'=>['Profiles'], 
                'keyField' => 'id', 
                'valueField' => function ($e) {
                return $e->profile->full_name;
                }])->where(['Clients.id' => $clientId]);
        }else{
            $clients = $this->Orders->Clients->find('list', [
                'contain'=>['Profiles'], 
                'keyField' => 'id', 
                'valueField' => function ($e) {
                return $e->profile->full_name;
                }]);
        }

        $paymentModes = $this->Orders->PaymentModes->find('list', ['limit' => 200]);
        $statuses = $this->Orders->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('stockNumber','order', 'clients', 'paymentModes', 'statuses','books','discounts'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function returns($orderId = null)
    {
        $stockNumber = 1;
        $order = $this->Orders->get($orderId,['contain'=>['OrderDetails']]);
        $newOrder = $this->Orders->newEmptyEntity(['contain'=>'OrderDetails']);
        $this->loadModel('Stocks');
        $stock = $this->Stocks->newEmptyEntity(['contain'=>'OrderDetails']);
        
        $oldReturnedTotal = $order->return_total;
        
        if ($this->request->is('post') && $this->request->getData('number')) {
            $stockNumber = $this->request->getData('number');
        }
        
        if ($this->request->is(['put','post']) && !$this->request->getData('number')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData()); 
            //debug($order->receipts[0]->amount) ;
            if($order->receipts[0]->amount == null){
                $order->receipts = null;
            }else{
                $order->received = $order->receipts[0]->amount;
            }
            $order->status_id = 1;
            //update stock 
            $stock->stock_details = [];
            $stock->stock_type = 'RETURNS';
                foreach($order->order_details as $orderDetails){ 
                    /*  */                     
                    $stock_details = $this->Stocks->StockDetails->newEmptyEntity();                                  
                    $stock_details->book_id = $orderDetails->book_id;
                    $stock_details->sales_price = $orderDetails->unit_price;
                    $stock_details->quantity = $orderDetails->return_qty;
                    $stock_details->total = $orderDetails->return_detail_total;                    
                    array_push($stock->stock_details,$stock_details);                                                                                                                                                                                                                
                }
            $this->Stocks->save($stock);  
            //exit;
            $newOrder->client_id = $order->client_id;
            $newOrder->order_id = $order->id;
            $newOrder->payment_mode_id = 3;
            $newOrder->received = $order->return_total;
            $newOrder->total = $order->return_total;
            $order->return_total = 0;
            $order->return_total = $oldReturnedTotal + $newOrder->total;
            $newOrder->order_details = $order->order_details;
            $newOrder->status_id = 1;
            //foreach new order details qty = return_qty
            $index = 0;
            foreach($newOrder->order_details as $newOrderDetails){                               
                $newOrder->order_details[$index]->qty = $newOrderDetails->return_qty;
                $newOrder->order_details[$index]->return_qty = 0;
                $newOrder->order_details[$index]->total = $newOrderDetails->return_detail_total;
                $index++;                
            }
            
            //exit;   
            $order->order_details = null;         
            $this->Orders->save($order); 
            if ($this->Orders->save($newOrder)) {                                
                $this->Flash->success(__('The {0} has been saved.', 'Order'));
                return $this->redirect(['action' => 'view', $order->id]);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Order'));
        }

        $books = $this->Orders->OrderDetails->Books->find('list');
        $discounts = $this->Orders->OrderDetails->Discounts->find('list', ['limit' => 200]);

        $parentOrder = $this->Orders->find('list', [
                'contain'=>['Clients.Profiles'], 
                'keyField' => 'id', 
                'valueField' => function ($e) {
                return 'Order Id: '. $e->id . ' - '. 'Balance: ' . $e->total . ' Client: ' . $e->client->profile->full_name;
        }])->where(['Orders.id' => $orderId]);
        
        //debug($order);

        $paymentModes = $this->Orders->PaymentModes->find('list', ['limit' => 200]);
        $parentOrderDetails = $this->Orders->OrderDetails->find()->where(['order_id' => $orderId]);
        //debug($parentOrderDetails);
        $statuses = $this->Orders->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('stockNumber','order', 'parentOrder', 'paymentModes', 'statuses','books','discounts','parentOrderDetails'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The {0} has been saved.', 'Order'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Order'));
        }
        $clients = $this->Orders->Clients->find('list', ['limit' => 200]);
        $paymentModes = $this->Orders->PaymentModes->find('list', ['limit' => 200]);
        $statuses = $this->Orders->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('order', 'clients', 'paymentModes', 'statuses'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);

        if($order->payment_mode_id == 3){
            $parent = $this->Orders->get($order->order_id);
            $parent->return_total -= $order->total;
            $this->Orders->save($parent);            
        }
                
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Order'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Order'));
        }

        return $this->redirect(['action' => 'index']);
    }
}