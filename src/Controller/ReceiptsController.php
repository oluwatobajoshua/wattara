<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Receipts Controller
 *
 * @property \App\Model\Table\ReceiptsTable $Receipts
 * @method \App\Model\Entity\Receipt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReceiptsController extends AppController
{
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
        $receipts = $this->paginate($this->Receipts);

        $this->set(compact('receipts'));
    }

    /**
     * View method
     *
     * @param string|null $id Receipt id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $receipt = $this->Receipts->get($id, [
            'contain' => ['Orders'],
        ]);

        $this->set(compact('receipt'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($orderId = null)
    {
        $receipt = $this->Receipts->newEmptyEntity();
        if ($this->request->is('post')) {
            $receipt = $this->Receipts->patchEntity($receipt, $this->request->getData());
            if ($this->Receipts->save($receipt)) {
                $order = $this->Receipts->Orders->get($orderId);
                $order->received += $receipt->amount;
                $this->Receipts->Orders->save($order);
                $this->Flash->success(__('The {0} has been saved.', 'Receipt'));

                return $this->redirect(['controller'=>'orders','action' => 'view', $orderId]);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Receipt'));
        }
        $orders = $this->Receipts->Orders->find('list')->where(['id' => $orderId]);
        $this->set(compact('receipt', 'orders'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Receipt id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $receipt = $this->Receipts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $receipt = $this->Receipts->patchEntity($receipt, $this->request->getData());
            if ($this->Receipts->save($receipt)) {
                $this->Flash->success(__('The {0} has been saved.', 'Receipt'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Receipt'));
        }
        $orders = $this->Receipts->Orders->find('list', ['limit' => 200]);
        $this->set(compact('receipt', 'orders'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Receipt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $receipt = $this->Receipts->get($id);
        if ($this->Receipts->delete($receipt)) {
            $order = $this->Receipts->Orders->get($receipt->order_id);
            $order->received -= $receipt->amount;
            $this->Receipts->Orders->save($order);
            $this->Flash->success(__('The {0} has been deleted.', 'Receipt'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Receipt'));
        }

        return $this->redirect($this->referer());
    }
}