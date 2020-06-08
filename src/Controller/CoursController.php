<?php
/**
 * Created by PhpStorm.
 * User: freuddebian
 * Date: 19/12/18
 * Time: 13:09
 */

namespace App\Controller;


use Cake\ORM\TableRegistry;

class CoursController extends AppController
{  
    
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['cours']);
    }

    public function cours(){
        if($this->request->is("post")){
            $level_id=$this->request->getData("level");
            $langue_id=$this->request->getData("lang");
            $motsTable=TableRegistry::get("Traductions");
            $expressionTable=TableRegistry::get("ExpressionTraduites");
            $this->Authorization->skipAuthorization();
            $mots= $motsTable->find("all", [
                "order" => "rand()",
                "limit" => 10
            ])
                ->contain(["Mots"])->where(["level_id"=>$level_id,"language_id"=>$langue_id]);
            $expression=$expressionTable->find("all", [
                "order" => "rand()",
                "limit" =>10
            ])->contain(["Expressions","Languages"])->where(["language_id"=>$langue_id,"level_id"=>$level_id]);

            $this->set(["mots"=>$mots,"expressions"=>$expression,"_serialize"=>["mots","expressions"]]);
        }
    }
}