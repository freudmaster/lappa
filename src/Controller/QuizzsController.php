<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Quizzs Controller
 *
 * @property \App\Model\Table\QuizzsTable $Quizzs
 *
 * @method \App\Model\Entity\Quizz[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuizzsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Levels']
        ];
        $quizzs = $this->paginate($this->Quizzs);

        $this->set(compact('quizzs'));
    }

    /**
     * View method
     *
     * @param string|null $id Quizz id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quizz = $this->Quizzs->get($id, [
            'contain' => ['Levels']
        ]);

        $this->set('quizz', $quizz);
    }
    public function generateQuizz(){
        if($this->request->is("post")) {
            $level_id = $this->request->getData("level");
            $lang_id = $this->request->getData("lang");
            $quizz = $this->Quizzs->find()->where(["level_id" => $level_id])->first();
            if ($quizz) {
                $traductionsTable = TableRegistry::get("traductions");
                $expressionsTables = TableRegistry::get("expressionTraduites");
                $quizz["traductions"] = $traductionsTable->find("all", [
                    "order" => "rand()",
                    "limit" => $quizz->get("nb_word")
                ])->contain(['languages', "mots" => ['levels']])->where(['level_id' => $level_id, 'language_id' => $lang_id])->toList();
                $quizz["expressionTraduites"] = $expressionsTables->find("all", [
                    "order" => "rand()",
                    "limit" => $quizz->get("nb_expression")
                ])->contain(["Languages", "Expressions" => ["levels"]])->where(['level_id' => $level_id, 'language_id' => $lang_id])->toList();

                $this->set(["quizz" => $quizz, "_serialize" => "quizz"]);
            }
        }


    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quizz = $this->Quizzs->newEntity();
        if ($this->request->is('post')) {
            $quizz = $this->Quizzs->patchEntity($quizz, $this->request->getData());
            if ($this->Quizzs->save($quizz)) {
                $this->Flash->success(__('The quizz has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quizz could not be saved. Please, try again.'));
        }
        $levels = $this->Quizzs->Levels->find('list', ['limit' => 200]);
        $this->set(compact('quizz', 'levels'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quizz id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quizz = $this->Quizzs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quizz = $this->Quizzs->patchEntity($quizz, $this->request->getData());
            if ($this->Quizzs->save($quizz)) {
                $this->Flash->success(__('The quizz has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quizz could not be saved. Please, try again.'));
        }
        $levels = $this->Quizzs->Levels->find('list', ['limit' => 200]);
        $this->set(compact('quizz', 'levels'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quizz id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quizz = $this->Quizzs->get($id);
        if ($this->Quizzs->delete($quizz)) {
            $this->Flash->success(__('The quizz has been deleted.'));
        } else {
            $this->Flash->error(__('The quizz could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
