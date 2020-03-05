<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProfileFields Controller
 *
 * @property \App\Model\Table\ProfileFieldsTable $ProfileFields
 *
 * @method \App\Model\Entity\ProfileField[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfileFieldsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups'],
        ];
        $profileFields = $this->paginate($this->ProfileFields);

        $this->set(compact('profileFields'));
    }

    /**
     * View method
     *
     * @param string|null $id Profile Field id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profileField = $this->ProfileFields->get($id, [
            'contain' => ['Groups', 'Users'],
        ]);

        $this->set('profileField', $profileField);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profileField = $this->ProfileFields->newEmptyEntity();
        if ($this->request->is('post')) {
            $profileField = $this->ProfileFields->patchEntity($profileField, $this->request->getData());
            if ($this->ProfileFields->save($profileField)) {
                $this->Flash->success(__('The profile field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profile field could not be saved. Please, try again.'));
        }
        $groups = $this->ProfileFields->Groups->find('list', ['limit' => 200]);
        $users = $this->ProfileFields->Users->find('list', ['limit' => 200]);
        $this->set(compact('profileField', 'groups', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Profile Field id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profileField = $this->ProfileFields->get($id, [
            'contain' => ['Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profileField = $this->ProfileFields->patchEntity($profileField, $this->request->getData());
            if ($this->ProfileFields->save($profileField)) {
                $this->Flash->success(__('The profile field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profile field could not be saved. Please, try again.'));
        }
        $groups = $this->ProfileFields->Groups->find('list', ['limit' => 200]);
        $users = $this->ProfileFields->Users->find('list', ['limit' => 200]);
        $this->set(compact('profileField', 'groups', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Profile Field id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profileField = $this->ProfileFields->get($id);
        if ($this->ProfileFields->delete($profileField)) {
            $this->Flash->success(__('The profile field has been deleted.'));
        } else {
            $this->Flash->error(__('The profile field could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
