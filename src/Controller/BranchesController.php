<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Branches Controller
 *
 * @property \App\Model\Table\BranchesTable $Branches
 * @method \App\Model\Entity\Branch[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BranchesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies'],
        ];
        $branches = $this->paginate($this->Branches);

        $this->set(compact('branches'));
    }

    /**
     * View method
     *
     * @param string|null $id Branch id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $branch = $this->Branches->get($id, [
            'contain' => ['Companies', 'Users'],
        ]);

        $this->set(compact('branch'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $branch = $this->Branches->newEmptyEntity();
        if ($this->request->is('post')) {
            $branch = $this->Branches->patchEntity($branch, $this->request->getData());
            if ($this->Branches->save($branch)) {
                $this->Flash->success(__('The {0} has been saved.', 'Branch'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Branch'));
        }
        $companies = $this->Branches->Companies->find('list', ['limit' => 200]);
        $this->set(compact('branch', 'companies'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Branch id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $branch = $this->Branches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $branch = $this->Branches->patchEntity($branch, $this->request->getData());
            if ($this->Branches->save($branch)) {
                $this->Flash->success(__('The {0} has been saved.', 'Branch'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Branch'));
        }
        $companies = $this->Branches->Companies->find('list', ['limit' => 200]);
        $this->set(compact('branch', 'companies'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Branch id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $branch = $this->Branches->get($id);
        if ($this->Branches->delete($branch)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Branch'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Branch'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
