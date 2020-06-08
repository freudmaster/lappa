<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\UsersTable;
use Authorization\IdentityInterface;
use Cake\ORM\Query;

/**
 * Users policy
 */
class UsersTablePolicy extends allPolicy
{
    function canList(IdentityInterface $user,Query $resource){

        return $this->isAdministratorOrMore($user);
    }
}
