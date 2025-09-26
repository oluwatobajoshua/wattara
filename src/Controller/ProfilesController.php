<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Profiles Controller
 *
 * @property \App\Model\Table\ProfilesTable $Profiles
 * @method \App\Model\Entity\Profile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfilesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Statuses', 'Users'],
        ];
        $profiles = $this->paginate($this->Profiles);

        $this->set(compact('profiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profile = $this->Profiles->get($id, [
            'contain' => ['Statuses', 'Users', 'Addresses', 'Clients'],
        ]);

        $this->set(compact('profile'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profile = $this->Profiles->newEmptyEntity();
        if ($this->request->is('post')) {
            $profile = $this->Profiles->patchEntity($profile, $this->request->getData());
            if ($this->Profiles->save($profile)) {
                $this->Flash->success(__('The {0} has been saved.', 'Profile'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Profile'));
        }
        $statuses = $this->Profiles->Statuses->find('list', ['limit' => 200]);
        $users = $this->Profiles->Users->find('list', ['limit' => 200]);
        $this->set(compact('profile', 'statuses', 'users'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profile = $this->Profiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profile = $this->Profiles->patchEntity($profile, $this->request->getData());
            if ($this->Profiles->save($profile)) {
                $this->Flash->success(__('The {0} has been saved.', 'Profile'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Profile'));
        }
        $statuses = $this->Profiles->Statuses->find('list', ['limit' => 200]);
        $users = $this->Profiles->Users->find('list', ['limit' => 200]);
        $this->set(compact('profile', 'statuses', 'users'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profile = $this->Profiles->get($id);
        if ($this->Profiles->delete($profile)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Profile'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Profile'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
