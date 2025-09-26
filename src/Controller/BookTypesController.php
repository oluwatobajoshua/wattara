<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BookTypes Controller
 *
 * @property \App\Model\Table\BookTypesTable $BookTypes
 * @method \App\Model\Entity\BookType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $bookTypes = $this->paginate($this->BookTypes);

        $this->set(compact('bookTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Book Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookType = $this->BookTypes->get($id, [
            'contain' => ['Books'],
        ]);

        $this->set(compact('bookType'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookType = $this->BookTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $bookType = $this->BookTypes->patchEntity($bookType, $this->request->getData());
            if ($this->BookTypes->save($bookType)) {
                $this->Flash->success(__('The {0} has been saved.', 'Book Type'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Book Type'));
        }
        $this->set(compact('bookType'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Book Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookType = $this->BookTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookType = $this->BookTypes->patchEntity($bookType, $this->request->getData());
            if ($this->BookTypes->save($bookType)) {
                $this->Flash->success(__('The {0} has been saved.', 'Book Type'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Book Type'));
        }
        $this->set(compact('bookType'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Book Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookType = $this->BookTypes->get($id);
        if ($this->BookTypes->delete($bookType)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Book Type'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Book Type'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
