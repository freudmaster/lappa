<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Favories Controller
 *
 * @property \App\Model\Table\FavoriesTable $Favories
 *
 * @method \App\Model\Entity\Favory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FavoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Mots']
        ];
        $favories = $this->paginate($this->Favories);

        $this->set(compact('favories'));
    }
    public function popular(){
        $popular=$this->Favories->find()->contain(["Mots"])->distinct()->distinct();
        $this->set(["popular"=>$popular,"_serialize"=>"popular"]);
    }
    /**
     * View method
     *
     * @param string|null $id Favory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $favory = $this->Favories->get($id, [
            'contain' => ['Users', 'Mots']
        ]);

        $this->set('favory', $favory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $favory = $this->Favories->newEntity();
        if ($this->request->is('post')) {
            $favory = $this->Favories->patchEntity($favory, $this->request->getData());
            if ($this->Favories->save($favory)) {
                $this->Flash->success(__('The favory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The favory could not be saved. Please, try again.'));
        }
        $users = $this->Favories->Users->find('list', ['limit' => 200]);
        $mots = $this->Favories->Mots->find('list', ['limit' => 200]);
        $this->set(compact('favory', 'users', 'mots'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Favory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $favory = $this->Favories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $favory = $this->Favories->patchEntity($favory, $this->request->getData());
            if ($this->Favories->save($favory)) {
                $this->Flash->success(__('The favory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The favory could not be saved. Please, try again.'));
        }
        $users = $this->Favories->Users->find('list', ['limit' => 200]);
        $mots = $this->Favories->Mots->find('list', ['limit' => 200]);
        $this->set(compact('favory', 'users', 'mots'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Favory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $favory = $this->Favories->get($id);
        if ($this->Favories->delete($favory)) {
            $this->Flash->success(__('The favory has been deleted.'));
        } else {
            $this->Flash->error(__('The favory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
