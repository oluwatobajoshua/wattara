<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Stocks Controller
 *
 * @property \App\Model\Table\StocksTable $Stocks
 * @method \App\Model\Entity\Stock[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StocksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['StockDetails.Books'],
            'limit' => 10
        ];
        
        $stocks = $this->paginate($this->Stocks);

        $this->set(compact('stocks'));
    }

    /**
     * View method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stock = $this->Stocks->get($id, [
            'contain' => ['StockDetails.Books'],
        ]);

        $this->set(compact('stock'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($bookId = null)
    {
        $stockNumber = 1;
        
        $stock = $this->Stocks->newEmptyEntity();
        if ($this->request->is('post') && $this->request->getData('number')) {
            $stockNumber = $this->request->getData('number');
            //debug($stockNumber);
        }
        
        if ($this->request->is('post') && !$this->request->getData('number')) {
            $stock = $this->Stocks->patchEntity($stock, $this->request->getData());
            foreach($stock->stock_details as $stockDetails){
                $stockDetails->quantity_out = 0;
                if($stockDetails->sales_price == null){
                    $stockDetails->sales_price = 0;
                }
                $stockDetails->cost_price = $stockDetails->sales_price;
            }
            //debug($stock->stock_details);
            //exit;
            if ($this->Stocks->save($stock)) {
                $this->Flash->success(__('The {0} has been saved.', 'Stock'));

                return $this->redirect(['controller'=>'books','action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Stock'));
        }
        if($bookId){
            $books = $this->Stocks->StockDetails->Books->find('list')->where(['id IN' => $bookId]);
        }else{
            $books = $this->Stocks->StockDetails->Books->find('list');
        }
        $this->set(compact('stockNumber','stock','books'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stock = $this->Stocks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stock = $this->Stocks->patchEntity($stock, $this->request->getData());
            if ($this->Stocks->save($stock)) {
                $this->Flash->success(__('The {0} has been saved.', 'Stock'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Stock'));
        }
        $this->set(compact('stock'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stock = $this->Stocks->get($id);
        if ($this->Stocks->delete($stock)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Stock'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Stock'));
        }

        return $this->redirect(['action' => 'index']);
    }
}