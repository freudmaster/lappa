<?php
namespace App\Controller;

use App\Controller\AppController;
use Authorization\Controller\Component\AuthorizationComponent;
use Cake\ORM\TableRegistry;

/**
 * Mots Controller
 *
 * @property \App\Model\Table\MotsTable $Mots
 *
 * @method \App\Model\Entity\Mot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MotsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

     if($this->getRequest()->is('get')) {
         $mots = $this->Mots->find()->contain(['Categories', 'Levels', 'Administrators', 'Traductions' => ["Languages"]])->order("Levels.name");
         $langues = $this->Mots->Traductions->Languages->find("all");
         $this->Authorization->authorize($mots);
         $this->Authorization->applyScope($mots);
     }else{
         $mots = $this->Mots->find()->contain(['Categories', 'Levels', 'Administrators', 'Traductions' => ["Languages"]])->order("Levels.name");
         $langues = $this->Mots->Traductions->Languages->find("all");
         $this->Authorization->skipAuthorization($mots);
     }
     $this->set(['mots'=>$mots,"langues"=>$langues,'_serialize'=>['mots','langues']]);
    }
    public function listword(){
        $this->paginate = [
            'contain' => ['Categories', 'Levels','Traductions'=>['Languages']],
        ];
        $mots = $this->paginate($this->Mots);

        $this->set(['mots'=>$mots,'_serialize'=>'mots']);

    }
    
    /**
     * View method
     *
     * @param string|null $id Mot id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mot = $this->Mots->get($id, [
            'contain' => ['Categories', 'Levels', 'Traductions'=>["languages"],'Administrators']
        ]);
        $this->Authorization->authorize($mot);
        $this->set(['mot'=> $mot,"_serialize"=>"mot"]);
    }




    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mot = $this->Mots->newEmptyEntity();
        $this->Authorization->authorize($mot);
        $user = $this->Authentication->getIdentity()->getIdentifier();
        if ($this->request->is('post')) {
            $mot = $this->Mots->patchEntity($mot, $this->request->getData());
            $mot->administrator_id=$user;
            if ($this->Mots->save($mot)) {
                $this->Flash->success(__('The mot has been saved.'));

                return $this->redirect(['action' => 'add']);
            }else
            $this->Flash->error(__('The mot could not be saved. Please, try again.'));
        }
        $categories = $this->Mots->Categories->find('list', ['limit' => 200]);
        $levels = $this->Mots->Levels->find('list', ['limit' => 200]);
        $this->set(compact('mot', 'categories', 'levels'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mot id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mot = $this->Mots->get($id, [
            'contain' => []
        ]);
        $this->Authorization->authorize($mot);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mot = $this->Mots->patchEntity($mot, $this->request->getData());
            if ($this->Mots->save($mot)) {
                $this->Flash->success(__('The mot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mot could not be saved. Please, try again.'));
        }
        $categories = $this->Mots->Categories->find('list', ['limit' => 200]);
        $levels = $this->Mots->Levels->find('list', ['limit' => 200]);
        $this->set(compact('mot', 'categories', 'levels'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mot id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mot = $this->Mots->get($id);
        if ($this->Mots->delete($mot)) {
            $this->Flash->success(__('The mot has been deleted.'));
        } else {
            $this->Flash->error(__('The mot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
