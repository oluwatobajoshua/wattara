<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OrderDetails Controller
 *
 * @property \App\Model\Table\OrderDetailsTable $OrderDetails
 * @method \App\Model\Entity\OrderDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders', 'Books', 'Discounts'],
            'limit' => 100
        ];
        $orderDetails = $this->paginate($this->OrderDetails);

        $this->set(compact('orderDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Order Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderDetail = $this->OrderDetails->get($id, [
            'contain' => ['Orders', 'Books', 'Discounts'],
        ]);

        $this->set(compact('orderDetail'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderDetail = $this->OrderDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $orderDetail = $this->OrderDetails->patchEntity($orderDetail, $this->request->getData());
            if ($this->OrderDetails->save($orderDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Order Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Order Detail'));
        }
        $orders = $this->OrderDetails->Orders->find('list', ['limit' => 200]);
        $books = $this->OrderDetails->Books->find('list', ['limit' => 200]);
        $discounts = $this->OrderDetails->Discounts->find('list', ['limit' => 200]);
        $this->set(compact('orderDetail', 'orders', 'books', 'discounts'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Order Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderDetail = $this->OrderDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderDetail = $this->OrderDetails->patchEntity($orderDetail, $this->request->getData());
            if ($this->OrderDetails->save($orderDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Order Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Order Detail'));
        }
        $orders = $this->OrderDetails->Orders->find('list', ['limit' => 200]);
        $books = $this->OrderDetails->Books->find('list', ['limit' => 200]);
        $discounts = $this->OrderDetails->Discounts->find('list', ['limit' => 200]);
        $this->set(compact('orderDetail', 'orders', 'books', 'discounts'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Order Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderDetail = $this->OrderDetails->get($id);
        if ($this->OrderDetails->delete($orderDetail)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Order Detail'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Order Detail'));
        }

        return $this->redirect($this->referer());
    }
}