<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\CategoriesTable;
use Authorization\IdentityInterface;
use Cake\ORM\Query;

/**
 * Categories policy
 */
class CategoriesTablePolicy extends allPolicy
{
    function canList(IdentityInterface $user,Query $languages){

        $obj=$user->getOriginalData();
        return true;
    }
}
