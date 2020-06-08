<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\ExpressionsTable;
use Authorization\IdentityInterface;
use Cake\ORM\Query;

/**
 * Expressions policy
 */
class ExpressionsTablePolicy extends allPolicy
{
    public function canList($user, $query)
    {
        return $this->isAdministratorOrMore($user);
    }
    public function scopeList($user, $query)
    {
        return $query->where(['administrator_id'=> $user->id]);
    }
}
