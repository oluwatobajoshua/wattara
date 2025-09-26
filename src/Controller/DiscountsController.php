<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Discounts Controller
 *
 * @property \App\Model\Table\DiscountsTable $Discounts
 * @method \App\Model\Entity\Discount[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiscountsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $discounts = $this->paginate($this->Discounts);

        $this->set(compact('discounts'));
    }

    /**
     * View method
     *
     * @param string|null $id Discount id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $discount = $this->Discounts->get($id, [
            'contain' => ['OrderDetails'],
        ]);

        $this->set(compact('discount'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $discount = $this->Discounts->newEmptyEntity();
        if ($this->request->is('post')) {
            $discount = $this->Discounts->patchEntity($discount, $this->request->getData());
            if ($this->Discounts->save($discount)) {
                $this->Flash->success(__('The {0} has been saved.', 'Discount'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Discount'));
        }
        $this->set(compact('discount'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Discount id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $discount = $this->Discounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $discount = $this->Discounts->patchEntity($discount, $this->request->getData());
            if ($this->Discounts->save($discount)) {
                $this->Flash->success(__('The {0} has been saved.', 'Discount'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Discount'));
        }
        $this->set(compact('discount'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Discount id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $discount = $this->Discounts->get($id);
        if ($this->Discounts->delete($discount)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Discount'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Discount'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
