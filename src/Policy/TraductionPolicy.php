<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Administrator;
use App\Model\Entity\Traduction;
use Authorization\IdentityInterface;

/**
 * Traduction policy
 */
class TraductionPolicy extends allPolicy
{
    /**
     * Check if $user can create Traduction
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Traduction $traduction
     * @return bool
     */
    public function canCreate(IdentityInterface $user, Traduction $traduction)
    {
        return $this->isAdministratorOrMore($user);
    }


    /**
     * Check if $user can update Traduction
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Traduction $traduction
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, Traduction $traduction)
    {
    }

    /**
     * Check if $user can delete Traduction
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Traduction $traduction
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Traduction $traduction)
    {
    }

    /**
     * Check if $user can view Traduction
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Traduction $traduction
     * @return bool
     */
    public function canView(IdentityInterface $user, Traduction $traduction)
    {
    }
}
