<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Expression;
use Authorization\IdentityInterface;

/**
 * Expression policy
 */
class ExpressionPolicy extends allPolicy
{
    /**
     * Check if $user can create Expression
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Expression $expression
     * @return bool
     */
    public function canCreate(IdentityInterface $user, Expression $expression)
    {
        return $this->isAdministratorOrMore($user);
    }

    /**
     * Check if $user can update Expression
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Expression $expression
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, Expression $expression)
    {
    }

    /**
     * Check if $user can delete Expression
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Expression $expression
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Expression $expression)
    {
    }

    /**
     * Check if $user can view Expression
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Expression $expression
     * @return bool
     */
    public function canView(IdentityInterface $user, Expression $expression)
    {
    }
}
