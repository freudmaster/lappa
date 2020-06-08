<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\TraductionsTable;
use Authorization\IdentityInterface;
use Cake\ORM\Query;

/**
 * Traductions policy
 */
class TraductionsTablePolicy
{
    function canList(IdentityInterface $user,Query $languages){

        $obj=$user->getOriginalData();
        return true;
    }
    public function scopeList($user, $query)
    {
        return $query->where(['administrator_id'=> $user->id]);
    }
}
