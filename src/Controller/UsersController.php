<?php
namespace App\Controller;

use App\Controller\AppController;
use Exception;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['login','loginGoogle','loginFacebook','details']);
    }

    public function index()
    {

        $users = $this->Users->find()->contain( ['Languages', 'Levels']);
        $this->Authorization->authorize($users);

        $this->set(['users'=>$users,"_serialize"=>["users"]]);
    }
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Languages', 'Levels', 'Favories', 'UserLanguages']
        ]);

        $this->set('user', $user);
    }
    public function details()
    {
        if ($this->request->is("post")) {
            $token=$this->request->getData("id");
            $this->Authorization->skipAuthorization();

            $user = $this->Users->find()->contain([
               'Languages', 'Levels', 'Favories.Mots', 'UserLanguages'
            ])->where(["Users.id"=>$token])->first();
            $this->set(['user'=> $user,'_serialize'=>'user']);
        }
    }
    public function levelup(){
        if ($this->request->is('post')) {
            $id= $this->request->getData("id");
            $level=$this->request->getData("level_id");
            $user=$this->Users->find()->where(['id'=>$id])->first();
            if(isset($user)){
                $user->set("level_id",$level+1);
                if($this->Users->save($user)){
                    $this->set(['user'=>$user,'_serialize'=>'user']);
                }else {
                    $this->set(['user'=> null,'_serialize'=>'user']);

                }
            }else{
                $this->set(['user'=> $this->request->getData(),'_serialize'=>'user']);
            }
        }
    }
    public function create()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->level_id=1;
            $user->level=$this->Users->Levels->find()->where(['id'=>1])->first();
            if($user->password==null && $user->token!=null)$user->password=$user->token;
            if ($this->Users->save($user)) {
                $this->set(['user'=>$user,'_serialize'=>'user']);
            }else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
                $this->set(['user'=>$user,'_serialize'=>'user']);
            }
        }
    }
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $languages = $this->Users->Languages->find('list', ['limit' => 200]);
        $levels = $this->Users->Levels->find('list', ['limit' => 200]);
        $this->set(compact('user', 'languages', 'levels'));
    }
    public function login(){
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
        
            $user = $this->Users->patchEntity($user, $this->request->getData());
           // debug($user);
            $q=$this->Users->find()->contain(['Levels','Languages'])->where(['username'=>$user->username,'password'=>$user->password])->first();
            $this->set(['user'=>$q,'_serialize'=>'user']);
          //  $this->render('AdminLTE.login');
        }
    }
    public function loginFacebook(){
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $token= $this->request->getData("token");
            $q=$this->Users->find()->contain(['Levels','Languages'])->where(['token'=>$token])->count();
            if($q!=null && $q>0){
            $this->set(['user'=>$this->Users->find()->contain(['Levels','Languages'])->where(['token'=>$token])->first(),'_serialize'=>'user']);
        }else{
                $this->set(['user'=>$this->request->getData(),'_serialize'=>'user']);
            }
        }
    }
    public function loginGoogle(){
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $email= $this->request->getData("email");
            $q=$this->Users->find()->contain(['Levels','Languages'])->where(['email'=>$email])->first();
            if(isset($q)){
                $this->set(['user'=>$q,'_serialize'=>'user']);
            }else{
                $this->set(['user'=> $this->request->getData(),'_serialize'=>'user']);
            }
        }
    }
    public function update(){
       if($this->request->is("post")){
           $user=$this->Users->newEntity();
           $data=$this->request->getData();
           $this->Users->patchEntity($user,$this->request->getData());
           $user=$this->Users->find()->where(["id"=>$data['id']])->first();
           $user->set("level_id",1);
           $user->set("language_id",$data["language_id"]);
           try {
               $this->Users->saveOrFail($user);
                   $this->set(['user' => $user, "_serialize" => "user"]);
           }catch (Exception $e){
               $this->set(['user' => $e->getMessage(), "_serialize" => "user"]);

           }
       }
    }
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $languages = $this->Users->Languages->find('list', ['limit' => 200]);
        $levels = $this->Users->Levels->find('list', ['limit' => 200]);
        $this->set(compact('user', 'languages', 'levels'));
    }
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
