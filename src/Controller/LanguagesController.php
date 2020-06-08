<?php
namespace App\Controller;

use App\Controller\AppController;
use Authorization\Exception\MissingIdentityException;
use Authorization\Controller\Component\AuthorizationComponent;
use Cake\ORM\TableRegistry;

/**
 * Languages Controller
 *
 * @property \App\Model\Table\LanguagesTable $Languages
 *
 * @method \App\Model\Entity\Language[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LanguagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $languages = $this->Languages->find()->contain(["ExpressionTraduites",'Traductions']);
        $tableRegistor=TableRegistry::getTableLocator();
        $expression=$tableRegistor->get("Expressions")->find();
        $traductions=$tableRegistor->get("Mots")->find();
        $this->Authorization->authorize($languages);
        $this->set(['languages'=>$languages,'expressions'=>$expression,'traductions'=>$traductions,'_serialize'=>'languages','expressions','traductions']);
    }

    /**
     * View method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(string $name = null)
    {
        $language = $this->Languages->find()->contain(['Traductions'=>["Mots"],"ExpressionTraduites"=>["Expressions"], 'Users'])
            ->where(["name"=>$name])->first();
        $expressions=TableRegistry::getTableLocator()->get("Expressions")->find();
        $mots=TableRegistry::getTableLocator()->get("Mots")->find();
        $this->Authorization->authorize($language);
        $this->set(['language'=>$language,'expressions'=>$expressions,"mots"=>$mots,'_serialize'=>["language",'expressions','mots']]);
    }

    public function initialize(): void
    {
        parent::initialize();

    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $language = $this->Languages->newEmptyEntity();
        $this->Authorization->authorize($language);
        if ($this->request->is('post')) {
            $language = $this->Languages->patchEntity($language, $this->request->getData());
            if ($this->Languages->save($language)) {
                $this->Flash->success(__('The language has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The language could not be saved. Please, try again.'));
        }
        $this->set(compact('language'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $language = $this->Languages->get($id, [
            'contain' => []
        ]);
        $this->Authorization->authorize($language);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $language = $this->Languages->patchEntity($language, $this->request->getData());
            if ($this->Languages->save($language)) {
                $this->Flash->success(__('The language has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The language could not be saved. Please, try again.'));
        }
        $this->set(compact('language'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $language = $this->Languages->get($id);
        $this->Authorization->authorize($language);
        if ($this->Languages->delete($language)) {
            $this->Flash->success(__('The language has been deleted.'));
        } else {
            $this->Flash->error(__('The language could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
