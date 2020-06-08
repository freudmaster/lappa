<?php


namespace App\Controller;

use Cake\Database\Query;
use Cake\ORM\TableRegistry;
use Authentication;

class HomeController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['login']);
    }

    public function index()
    {
        $registrator=TableRegistry::getTableLocator();
        $mots=$registrator->get('Mots')->find()->contain(["levels","traductions"]);
        $expressions=$registrator->get("Expressions")->find();
        $users=$registrator->get("Users")->find()->contain('Languages');
        $traductions=$registrator->get("Traductions")->find();
        $expressionTraduites=$registrator->get("ExpressionTraduites")->find();
        $langues=$registrator->get("Languages")->find();
        $this->Authorization->applyScope($mots);
        $this->Authorization->applyScope($traductions);
        $this->Authorization->applyScope($expressionTraduites);
        $this->Authorization->authorize($mots);
        $this->Authorization->authorize($expressions);
        $this->Authorization->authorize($traductions);
        $this->Authorization->authorize($mots);
        $this->Authorization->authorize($expressions);
        $this->Authorization->authorize($expressionTraduites);
        $langues=$langues->select(
            [
                "name"=>"Languages.name",
                "id"=>"languages.id",
                "count_traductions"=>$langues->func()->count('Traductions.id')])
            ->leftJoinWith("Traductions")
            ->matching(
                'Traductions.Mots', function ($q) {
                return $q->where(['Mots.administrator_id' => $this->Authentication->getIdentity()->getIdentifier()]);
            })
            ->order(["count_traductions"=>"DESC"])->group("name");
        $this->set(["mots"=>$mots,"expressions"=>$expressions,"users"=>$users,

            "traductions"=>$traductions,"langues"=>$langues,"expressionTraduites"=>$expressionTraduites,
            '_serialize'=>['mots',"expression","users","traductions","langues",'expressionTraduites']]);
    }
    public function chart(){
        $this->Authorization->skipAuthorization();
        if($this->request->is('ajax')) {
            $this->response = $this->response->withDisabledCache();
            $registrator=TableRegistry::getTableLocator();
             $langues=$registrator->get("Languages")->find()->contain(["Traductions"])->innerJoinWith("Traductions")->distinct();
            $this->set(["langues"=>$langues,'_serialize'=>["langues"]]);
        }
    }
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Home',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
            $this->set(compact($result));
        }
    }
   public function logout()
   {
       $result = $this->Authentication->getResult();
       // regardless of POST or GET, redirect if user is logged in
       if ($result->isValid()) {
           $this->Authentication->logout();
           return $this->redirect(['controller' => 'Home', 'action' => 'login']);
       }
   }

}
