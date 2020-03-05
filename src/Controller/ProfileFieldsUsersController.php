<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProfileFieldsUsers Controller
 *
 * @property \App\Model\Table\ProfileFieldsUsersTable $ProfileFieldsUsers
 *
 * @method \App\Model\Entity\ProfileFieldsUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfileFieldsUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ProfileFields', 'Users'],
        ];
        $profileFieldsUsers = $this->paginate($this->ProfileFieldsUsers);

        $this->set(compact('profileFieldsUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Profile Fields User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profileFieldsUser = $this->ProfileFieldsUsers->get($id, [
            'contain' => ['ProfileFields', 'Users'],
        ]);

        $this->set('profileFieldsUser', $profileFieldsUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profileFieldsUser = $this->ProfileFieldsUsers->newEmptyEntity();
        if ($this->request->is('post')) {
            $profileFieldsUser = $this->ProfileFieldsUsers->patchEntity($profileFieldsUser, $this->request->getData());
            if ($this->ProfileFieldsUsers->save($profileFieldsUser)) {
                $this->Flash->success(__('The profile fields user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profile fields user could not be saved. Please, try again.'));
        }
        $profileFields = $this->ProfileFieldsUsers->ProfileFields->find('list', ['limit' => 200]);
        $users = $this->ProfileFieldsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('profileFieldsUser', 'profileFields', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Profile Fields User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profileFieldsUser = $this->ProfileFieldsUsers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profileFieldsUser = $this->ProfileFieldsUsers->patchEntity($profileFieldsUser, $this->request->getData());
            if ($this->ProfileFieldsUsers->save($profileFieldsUser)) {
                $this->Flash->success(__('The profile fields user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profile fields user could not be saved. Please, try again.'));
        }
        $profileFields = $this->ProfileFieldsUsers->ProfileFields->find('list', ['limit' => 200]);
        $users = $this->ProfileFieldsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('profileFieldsUser', 'profileFields', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Profile Fields User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profileFieldsUser = $this->ProfileFieldsUsers->get($id);
        if ($this->ProfileFieldsUsers->delete($profileFieldsUser)) {
            $this->Flash->success(__('The profile fields user has been deleted.'));
        } else {
            $this->Flash->error(__('The profile fields user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
