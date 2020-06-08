<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $password
 * @property string|null $email
 * @property string $token
 * @property \Cake\I18n\FrozenTime $date_created
 * @property \Cake\I18n\FrozenTime $date_modified
 * @property int $language_id
 * @property int $level_id
 *
 * @property \App\Model\Entity\Language $language
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\Favory[] $favories
 * @property \App\Model\Entity\UserLanguage[] $user_languages
 */
class User extends Entity
{
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
        'password' => true,
        'email' => true,
        'token' => true,
        'date_created' => true,
        'date_modified' => true,
        'language_id' => true,
        'level_id' => true,
        'language' => true,
        'level' => true,
        'favories' => true,
        'user_languages' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token',
    ];
}
