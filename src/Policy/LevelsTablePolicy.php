<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\LevelsTable;
use Authorization\IdentityInterface;
use Cake\ORM\Query;

/**
 * Levels policy
 */
class LevelsTablePolicy
{
    function canList($user,$languages){

       // $obj=$user->getOriginalData();
        return true;
    }
}
