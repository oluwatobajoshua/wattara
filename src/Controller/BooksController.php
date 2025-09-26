<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Publishers', 'BookTypes','StockDetails'],
            'limit' => 100
        ];

        $keyword = '';
        if($this->request->is('post'))
        {
            //delete using id
            $keyword = $this->request->getData('title');  
            //debug($keyword);      
        }

        $books = $this->paginate($this->Books->find()->where(['title LIKE'=>'%'.$keyword.'%']));

        $this->set(compact('books'));
    }

    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => ['Publishers', 'BookTypes','StockDetails.Stocks','OrderDetails.Discounts','OrderDetails.Orders'],
        ]);

        $this->set(compact('book'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $book = $this->Books->newEmptyEntity();
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The {0} has been saved.', 'Book'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Book'));
        }
        $publishers = $this->Books->Publishers->find('list', ['limit' => 200]);
        $bookTypes = $this->Books->BookTypes->find('list', ['limit' => 200]);
        $this->set(compact('book', 'publishers', 'bookTypes'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The {0} has been saved.', 'Book'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Book'));
        }
        $publishers = $this->Books->Publishers->find('list', ['limit' => 200]);
        $bookTypes = $this->Books->BookTypes->find('list', ['limit' => 200]);
        $this->set(compact('book', 'publishers', 'bookTypes'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Book'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Book'));
        }

        return $this->redirect(['action' => 'index']);
    }
}