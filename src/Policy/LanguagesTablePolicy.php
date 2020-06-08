<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Language;
use App\Model\Entity\User;
use App\Model\Table\languagesTable;
use Authorization\IdentityInterface;
use Cake\ORM\Query;
use App\Model\Entity\Administrator;

/**
 * languages policy
 */
class languagesTablePolicy
{
    function canList( $user, $languages){

        //$obj=$user->getOriginalData();
        return true;
    }
}
