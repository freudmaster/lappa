<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Administrator;
use App\Model\Entity\Language;
use Authorization\IdentityInterface;

/**
 * Language policy
 */
class LanguagePolicy
{
    /**
     * Check if $user can create Language
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Language $language
     * @return bool
     */
    public function canCreate(IdentityInterface $user, Language $language)
    {
        return $this->isSuperAdministratorOrMore($user);
    }

    protected function isSuperAdministratorOrMore(IdentityInterface $user){
        $obj=$user->getOriginalData();
        return $obj instanceof Administrator && $obj->role_id>1;
    }

    /**
     * Check if $user can update Language
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Language $language
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Language $language)
    {
        return $this->isSuperAdministratorOrMore($user);
    }

    /**
     * Check if $user can delete Language
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Language $language
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Language $language)
    {
        return $this->isSuperAdministratorOrMore($user);
    }

    /**
     * Check if $user can view Language
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Language $language
     * @return bool
     */
    public function canView(IdentityInterface $user, Language $language)
    {
        return true;
    }
}
