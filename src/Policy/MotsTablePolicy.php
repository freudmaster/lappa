<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\MotsTable;
use Authorization\IdentityInterface;

/**
 * Mots policy
 */
class MotsTablePolicy extends allPolicy
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
