<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * StockDetails Controller
 *
 * @property \App\Model\Table\StockDetailsTable $StockDetails
 * @method \App\Model\Entity\StockDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StockDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stocks', 'Books'],
        ];
        $stockDetails = $this->paginate($this->StockDetails);

        $this->set(compact('stockDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Stock Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stockDetail = $this->StockDetails->get($id, [
            'contain' => ['Stocks', 'Books'],
        ]);

        $this->set(compact('stockDetail'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stockDetail = $this->StockDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $stockDetail = $this->StockDetails->patchEntity($stockDetail, $this->request->getData());
            if ($this->StockDetails->save($stockDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Stock Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Stock Detail'));
        }
        $stocks = $this->StockDetails->Stocks->find('list', ['limit' => 200]);
        $books = $this->StockDetails->Books->find('list', ['limit' => 200]);
        $this->set(compact('stockDetail', 'stocks', 'books'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Stock Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stockDetail = $this->StockDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stockDetail = $this->StockDetails->patchEntity($stockDetail, $this->request->getData());
            if ($this->StockDetails->save($stockDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Stock Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Stock Detail'));
        }
        $stocks = $this->StockDetails->Stocks->find('list', ['limit' => 200]);
        $books = $this->StockDetails->Books->find('list', ['limit' => 200]);
        $this->set(compact('stockDetail', 'stocks', 'books'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Stock Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stockDetail = $this->StockDetails->get($id);
        if ($this->StockDetails->delete($stockDetail)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Stock Detail'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Stock Detail'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
