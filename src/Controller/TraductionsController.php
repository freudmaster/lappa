<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;
use Cake\ORM\TableRegistry;

/**
 * Traductions Controller
 *
 * @property \App\Model\Table\TraductionsTable $Traductions
 *
 * @method \App\Model\Entity\Traduction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TraductionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Languages', 'Mots']
        ];
        $traductions =$this->Traductions->find();
        $expressionsTraduites=$this->Traductions->Languages->ExpressionTraduites->find();
        $expressions=$this->Traductions->Languages->ExpressionTraduites->Expressions->find();
        $mots=$this->Traductions->Mots->find();
        $languages=$this->Traductions->Languages->find()->contain(['Traductions'=>["Mots"=>["Administrators","Levels"],"Administrators"],"ExpressionTraduites"=>['Expressions'=>["Administrators","Levels"],"Administrators"]]);
        $this->Authorization->authorize($traductions);
        $user=$this->Authentication->getIdentity();
        $this->set(['traductions'=>$traductions,
            'mots'=>$mots,
            'user'=>$user,
            'expressions'=>$expressions,
            'expressionsTraduites'=>$expressionsTraduites,
            'languages'=>$languages,
            "_serialize"=>["traductions","languages"]]);
    }

    public function view($id = null)
    {
        $traduction = $this->Traductions->get($id, [
            'contain' => ['Languages', 'Mots']
        ]);
        $this->Authorization->authorize($traduction);

        $this->set('traduction', $traduction);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $traduction = $this->Traductions->newEmptyEntity();
        $ExpressionTraduites=TableRegistry::getTableLocator()->get("ExpressionTraduites");
        $expression=$ExpressionTraduites->newEmptyEntity();
        $this->Authorization->authorize($traduction);
        if ($this->request->is('post')) {
            $traduction = $this->Traductions->patchEntity($traduction, $this->request->getData());
            $expressionTraduite =$ExpressionTraduites->patchEntity($expression, $this->request->getData());
            $this->Authorization->authorize($traduction);
            $this->Authorization->authorize($expressionTraduite);
            if ($ExpressionTraduites->save($expressionTraduite)) {
                $this->Flash->success(__('The expression traduite has been saved.'));
             //   return $this->redirect(['action' => 'index']);
            }else if ($this->Traductions->save($traduction)) {
                $this->Flash->success(__('The traduction has been saved.'));
           //     return $this->redirect(['action' => 'index']);
            }else
                $this->Flash->error(__('The traduction could not be saved. Please, try again.'));
        }

        $expressions = $ExpressionTraduites->Expressions->find('list', ['limit' => 200]);
        $languages = $this->Traductions->Languages->find('list', ['limit' => 200]);
        $mots = $this->Traductions->Mots->find('list', ['limit' => 200,'order'=>["Mots.valeur"=>"ASC"]]);
        $this->set(compact('traduction', 'mots','expression', 'languages', 'expressions'));
    }
    public function listWords(){
        if($this->request->is("post")){
            $lang_id=$this->request->getData("lang");
            $level_id=$this->request->getData("level");
            $count_word=$this->request->getData("count_word");
            $restrict=$this->request->getData("restrict_id");
            $listWords= $this->Traductions->find("all", [
                "order" => "rand()",
                "limit" => $count_word
            ])->contain(['languages', "mots" => ['levels']])->
            where(['level_id' => $level_id, 'language_id' => $lang_id])->andWhere(["Traductions.id != ">$restrict])->andWhere(["code !="=>0])->distinct()->toList();
            $this->set(['list'=>$listWords,'_serialize'=>'list']);
        }
    }
    /**
     * Edit method
     *
     * @param string|null $id Traduction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $traduction = $this->Traductions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $traduction = $this->Traductions->patchEntity($traduction, $this->request->getData());
            if ($this->Traductions->save($traduction)) {
                $this->Flash->success(__('The traduction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The traduction could not be saved. Please, try again.'));
        }
        $languages = $this->Traductions->Languages->find('list', ['limit' => 200]);
        $mots = $this->Traductions->Mots->find('list', ['limit' => 200]);
        $this->set(compact('traduction', 'languages', 'mots'));
    }
    public function inlangue(){
        if($this->request->is("post")){
            $langue=$this->request->getData("lang");
                $id=$this->request->getData("id");
                $traduction=$this->Traductions->find()->contain(["Languages","Mots"])->where(["language_id"=>$langue,"mot_id"=>$id])->first();
            $this->set(["traduction"=>$traduction,"_serialize"=>"traduction"]);
        }
    }
    /**
     * Delete method
     *
     * @param string|null $id Traduction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $traduction = $this->Traductions->get($id);
        if ($this->Traductions->delete($traduction)) {
            $this->Flash->success(__('The traduction has been deleted.'));
        } else {
            $this->Flash->error(__('The traduction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
   /* public function sendfile(){
        if($this->request->is("post")){
            $traducions=$this->Traductions->newEntity();
            if($this->Traductions->patchEntity($traducions,$this->request->getData())){
            $path=WWW_ROOT."audio/".$traducions->language->name."/".$traducions->traduction.".wav";
            $file=new File($path);
            if($file->exists())
                return $this->response->withFile($path);
        }
    }
    return null;
}*/
    public function createWordTranslate(){
       $traduction = $this->Traductions->newEntity();
       if ($this->request->is('post')) {
           $traduction = $this->Traductions->patchEntity($traduction, $this->request->getData());
           if ($this->Traductions->save($traduction)) {
               $this->Flash->success(__('The traduction has been saved.'));

               //     return $this->redirect(['action' => 'index']);
           }else
               $this->Flash->error(__('The traduction could not be saved. Please, try again.'));
       }
       $languages = $this->Traductions->Languages->find('list', ['limit' => 200]);
       $mots = $this->Traductions->Mots->find('list', ['limit' => 200,'order'=>["Mots.valeur"=>"ASC"]]);
       $this->set(compact('traduction', 'languages', 'mots'));

   }
    public function sendfile(){

                $path=WWW_ROOT."audio/yilumbu/diteli.wav";
                $file=new File($path);
                if($file->exists())
                    return $this->response->withFile($path);


        return null;
    }
    public function translate($id=null){
        if(isset($id) && $id!=null){
            $word=$this->Traductions->Mots->get($id);
        }
        $words=$this->Traductions->Mots->find();
        $langues=$this->Traductions->Languages->find();
        if(isset($word))
            $this->set(["words"=>$words,"langues"=>$langues,"word"=>$word,"_serialize"=>["words","langues","word"]]);
        else
            $this->set(["words"=>$words,"langues"=>$langues,"_serialize"=>["words","langues"]]);

    }

}
