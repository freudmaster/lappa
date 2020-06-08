<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExpressionTraduites Controller
 *
 * @property \App\Model\Table\ExpressionTraduitesTable $ExpressionTraduites
 *
 * @method \App\Model\Entity\ExpressionTraduite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExpressionTraduitesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Languages', 'Expressions']
        ];
        $expressionTraduites = $this->paginate($this->ExpressionTraduites);

        $this->set(compact('expressionTraduites'));
    }

    /**
     * View method
     *
     * @param string|null $id Expression Traduite id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expressionTraduite = $this->ExpressionTraduites->get($id, [
            'contain' => ['Languages', 'Expressions']
        ]);

        $this->set('expressionTraduite', $expressionTraduite);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expressionTraduite = $this->ExpressionTraduites->newEmptyEntity();
        if ($this->request->is('post')) {
            $expressionTraduite = $this->ExpressionTraduites->patchEntity($expressionTraduite, $this->request->getData());
            if ($this->ExpressionTraduites->save($expressionTraduite)) {
                $this->Flash->success(__('The expression traduite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expression traduite could not be saved. Please, try again.'));
        }
        $languages = $this->ExpressionTraduites->Languages->find('list', ['limit' => 200]);
        $expressions = $this->ExpressionTraduites->Expressions->find('list', ['limit' => 200]);
        $this->set(compact('expressionTraduite', 'languages', 'expressions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Expression Traduite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expressionTraduite = $this->ExpressionTraduites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expressionTraduite = $this->ExpressionTraduites->patchEntity($expressionTraduite, $this->request->getData());
            if ($this->ExpressionTraduites->save($expressionTraduite)) {
                $this->Flash->success(__('The expression traduite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expression traduite could not be saved. Please, try again.'));
        }
        $languages = $this->ExpressionTraduites->Languages->find('list', ['limit' => 200]);
        $expressions = $this->ExpressionTraduites->Expressions->find('list', ['limit' => 200]);
        $this->set(compact('expressionTraduite', 'languages', 'expressions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Expression Traduite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expressionTraduite = $this->ExpressionTraduites->get($id);
        if ($this->ExpressionTraduites->delete($expressionTraduite)) {
            $this->Flash->success(__('The expression traduite has been deleted.'));
        } else {
            $this->Flash->error(__('The expression traduite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
