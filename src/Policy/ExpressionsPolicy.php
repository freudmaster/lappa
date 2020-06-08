<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Expressions;
use Authorization\IdentityInterface;

/**
 * Expressions policy
 */
class ExpressionsPolicy extends allPolicy
{
    /**
     * Check if $user can create Expressions
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Expressions $expressions
     * @return bool
     */
    public function canCreate(IdentityInterface $user, Expressions $expressions)
    {
        return $this->isAdministratorOrMore($user);
    }

    /**
     * Check if $user can update Expressions
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Expressions $expressions
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, Expressions $expressions)
    {
    }

    /**
     * Check if $user can delete Expressions
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Expressions $expressions
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Expressions $expressions)
    {
    }

    /**
     * Check if $user can view Expressions
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Expressions $expressions
     * @return bool
     */
    public function canView(IdentityInterface $user, Expressions $expressions)
    {
    }
}
