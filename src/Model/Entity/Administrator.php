<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\IdentityInterface;
use Cake\ORM\Entity;

/**
 * Administrator Entity
 *
 * @property int $id
 * @property string $username
 * @property string|null $email
 * @property string $password
 * @property string $firstname
 * @property string $lastname
 * @property string $picture
 * @property string $slug_name
 * @property \Cake\I18n\FrozenTime $date_created
 * @property \Cake\I18n\FrozenTime $date_modified
 * @property int $role_id
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Mot[] $mots
 */
class Administrator extends Entity
    implements IdentityInterface
{
    /**
     * Authentication\IdentityInterface method
     */
    public function getIdentifier()
    {
        return $this->id;
    }

    /**
     * Authentication\IdentityInterface method
     */
    public function getOriginalData()
    {
        return $this;
    }
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'email' => true,
        'password' => true,
        'firstname' => true,
        'lastname' => true,
        'picture' => true,
        'slug_name' => true,
        'date_created' => true,
        'date_modified' => true,
        'role_id' => true,
        'role' => true,
        'mots' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
