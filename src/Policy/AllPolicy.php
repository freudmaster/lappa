<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Administrator;
use App\Model\Entity\all;
use Authorization\IdentityInterface;

/**
 * all policy
 */
abstract class allPolicy
{

    protected function isSuperAdministratorOrMore(IdentityInterface $user){
        $obj=$user->getOriginalData();
        return $obj instanceof Administrator && $obj->role_id>1;
    }
    protected function isAdministratorOrMore(IdentityInterface $user){
        $obj=$user->getOriginalData();
        return $obj instanceof Administrator && $obj->role_id>0;
    }

}
