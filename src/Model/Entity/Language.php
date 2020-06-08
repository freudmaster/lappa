<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Language Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 *
 * @property \App\Model\Entity\Traduction[] $traductions
 * @property \App\Model\Entity\ExpressionTraduite[] $expression_traduites
 * @property \App\Model\Entity\User[] $users
 */
class Language extends Entity
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
        'name' => true,
        'description' => true,
        'traductions' => true,
        'expression_traduites' => true,
        'users' => true,
    ];
}
