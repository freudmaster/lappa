<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserLanguages Controller
 *
 * @property \App\Model\Table\UserLanguagesTable $UserLanguages
 *
 * @method \App\Model\Entity\UserLanguage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserLanguagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Languages', 'Users']
        ];
        $userLanguages = $this->paginate($this->UserLanguages);

        $this->set(compact('userLanguages'));
    }

    /**
     * View method
     *
     * @param string|null $id User Language id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userLanguage = $this->UserLanguages->get($id, [
            'contain' => ['Languages', 'Users']
        ]);

        $this->set('userLanguage', $userLanguage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userLanguage = $this->UserLanguages->newEntity();
        if ($this->request->is('post')) {
            $userLanguage = $this->UserLanguages->patchEntity($userLanguage, $this->request->getData());
            if ($this->UserLanguages->save($userLanguage)) {
                $this->Flash->success(__('The user language has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user language could not be saved. Please, try again.'));
        }
        $languages = $this->UserLanguages->Languages->find('list', ['limit' => 200]);
        $users = $this->UserLanguages->Users->find('list', ['limit' => 200]);
        $this->set(compact('userLanguage', 'languages', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Language id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userLanguage = $this->UserLanguages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userLanguage = $this->UserLanguages->patchEntity($userLanguage, $this->request->getData());
            if ($this->UserLanguages->save($userLanguage)) {
                $this->Flash->success(__('The user language has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user language could not be saved. Please, try again.'));
        }
        $languages = $this->UserLanguages->Languages->find('list', ['limit' => 200]);
        $users = $this->UserLanguages->Users->find('list', ['limit' => 200]);
        $this->set(compact('userLanguage', 'languages', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Language id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userLanguage = $this->UserLanguages->get($id);
        if ($this->UserLanguages->delete($userLanguage)) {
            $this->Flash->success(__('The user language has been deleted.'));
        } else {
            $this->Flash->error(__('The user language could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
