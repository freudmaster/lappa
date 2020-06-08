<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Expressions Controller
 *
 * @property \App\Model\Table\ExpressionsTable $Expressions
 *
 * @method \App\Model\Entity\Expression[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExpressionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $expressions = $this->Expressions->find()->contain(['Categories', 'Levels','ExpressionTraduites']);
        $langues=TableRegistry::getTableLocator()->get( "Languages")->find();
        $this->Authorization->authorize($expressions);
        $this->set(compact('expressions','langues'));
    }

    /**
     * View method
     *
     * @param string|null $id Expression id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expression = $this->Expressions->get($id, [
            'contain' => ['Categories', 'Levels']
        ]);

        $this->set('expression', $expression);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expression = $this->Expressions->newEmptyEntity();
        $this->Authorization->authorize($expression);
        if ($this->request->is('post')) {
            $expression = $this->Expressions->patchEntity($expression, $this->request->getData());
            if ($this->Expressions->save($expression)) {
                $this->Flash->success(__('The expression has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expression could not be saved. Please, try again.'));
        }
        $categories = $this->Expressions->Categories->find('list', ['limit' => 200]);
        $levels = $this->Expressions->Levels->find('list', ['limit' => 200]);
        $this->set(compact('expression', 'categories', 'levels'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Expression id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expression = $this->Expressions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expression = $this->Expressions->patchEntity($expression, $this->request->getData());
            if ($this->Expressions->save($expression)) {
                $this->Flash->success(__('The expression has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expression could not be saved. Please, try again.'));
        }
        $categories = $this->Expressions->Categories->find('list', ['limit' => 200]);
        $levels = $this->Expressions->Levels->find('list', ['limit' => 200]);
        $this->set(compact('expression', 'categories', 'levels'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Expression id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expression = $this->Expressions->get($id);
        if ($this->Expressions->delete($expression)) {
            $this->Flash->success(__('The expression has been deleted.'));
        } else {
            $this->Flash->error(__('The expression could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
