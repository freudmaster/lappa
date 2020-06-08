<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Administrator;
use App\Model\Entity\Mot;
use Authorization\IdentityInterface;

/**
 * Mot policy
 */
class MotPolicy extends allPolicy
{
    /**
     * Check if $user can create Mot
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Mot $mot
     * @return bool
     */
    public function canCreate(IdentityInterface $user, Mot $mot)
    {
        return $this->isAdministratorOrMore($user);
    }
    public function canInsert(IdentityInterface $user, Mot $mot)
    {
        return true;
    }

    /**
     * Check if $user can update Mot
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Mot $mot
     * @return bool
     */

    public function canUpdate(IdentityInterface $user, Mot $mot)
    {
        return $this->isSuperAdministratorOrMore($user) or $mot->administrator_id==$user->getOriginalData()->id;
    }

    /**
     * Check if $user can delete Mot
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Mot $mot
     * @return bool
     */
    public function canRemove(IdentityInterface $user, Mot $mot)
    {
        return $this->isSuperAdministratorOrMore($user) or $mot->administrator_id==$user->getOriginalData()->id;
    }

    /**
     * Check if $user can view Mot
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Mot $mot
     * @return bool
     */
    public function canView(IdentityInterface $user, Mot $mot)
    {
        return true;
    }
}
