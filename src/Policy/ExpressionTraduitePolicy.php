<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\expressionTraduite;
use Authorization\IdentityInterface;

/**
 * expressionTraduite policy
 */
class expressionTraduitePolicy extends allPolicy
{
    /**
     * Check if $user can create expressionTraduite
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\expressionTraduite $expressionTraduite
     * @return bool
     */
    public function canCreate(IdentityInterface $user, expressionTraduite $expressionTraduite)
    {
        if($this->isAdministratorOrMore($user)){
            $expressionTraduite->administrator_id=$user->getIdentifier();
            return true;
        }
        return false;
    }

    /**
     * Check if $user can update expressionTraduite
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\expressionTraduite $expressionTraduite
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, expressionTraduite $expressionTraduite)
    {
    }

    /**
     * Check if $user can delete expressionTraduite
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\expressionTraduite $expressionTraduite
     * @return bool
     */
    public function canDelete(IdentityInterface $user, expressionTraduite $expressionTraduite)
    {
    }

    /**
     * Check if $user can view expressionTraduite
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\expressionTraduite $expressionTraduite
     * @return bool
     */
    public function canView(IdentityInterface $user, expressionTraduite $expressionTraduite)
    {
    }
}
