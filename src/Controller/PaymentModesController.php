<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PaymentModes Controller
 *
 * @property \App\Model\Table\PaymentModesTable $PaymentModes
 * @method \App\Model\Entity\PaymentMode[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentModesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $paymentModes = $this->paginate($this->PaymentModes);

        $this->set(compact('paymentModes'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment Mode id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentMode = $this->PaymentModes->get($id, [
            'contain' => ['Orders'],
        ]);

        $this->set(compact('paymentMode'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentMode = $this->PaymentModes->newEmptyEntity();
        if ($this->request->is('post')) {
            $paymentMode = $this->PaymentModes->patchEntity($paymentMode, $this->request->getData());
            if ($this->PaymentModes->save($paymentMode)) {
                $this->Flash->success(__('The {0} has been saved.', 'Payment Mode'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Payment Mode'));
        }
        $this->set(compact('paymentMode'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Payment Mode id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentMode = $this->PaymentModes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentMode = $this->PaymentModes->patchEntity($paymentMode, $this->request->getData());
            if ($this->PaymentModes->save($paymentMode)) {
                $this->Flash->success(__('The {0} has been saved.', 'Payment Mode'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Payment Mode'));
        }
        $this->set(compact('paymentMode'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Payment Mode id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentMode = $this->PaymentModes->get($id);
        if ($this->PaymentModes->delete($paymentMode)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Payment Mode'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Payment Mode'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
