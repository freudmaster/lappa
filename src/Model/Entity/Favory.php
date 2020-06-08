<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Favory Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $mot_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property bool|null $activate
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Mot $mot
 */
class Favory extends Entity
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
        'user_id' => true,
        'mot_id' => true,
        'created' => true,
        'modified' => true,
        'activate' => true,
        'user' => true,
        'mot' => true,
    ];
}
