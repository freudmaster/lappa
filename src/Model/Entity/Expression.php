<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Expression Entity
 *
 * @property int $id
 * @property string|null $texte
 * @property int $administrator_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $category_id
 * @property int $level_id
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\ExpressionTraduite[] $expression_traduites
 */
class Expression extends Entity
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
        'texte' => true,
        'administrator_id' => true,
        'created' => true,
        'modified' => true,
        'category_id' => true,
        'level_id' => true,
        'category' => true,
        'level' => true,
        'expression_traduites' => true,
    ];
}
