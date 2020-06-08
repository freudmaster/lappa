<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExpressionTraduite Entity
 *
 * @property int $id
 * @property int $language_id
 * @property int $expression_id
 * @property string|null $traduction
 * @property string|null $path
 * @property string|null $plural
 * @property int $administrator_id
 *
 * @property \App\Model\Entity\Language $language
 * @property \App\Model\Entity\Expression $expression
 */
class ExpressionTraduite extends Entity
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
        'language_id' => true,
        'expression_id' => true,
        'traduction' => true,
        'path' => true,
        'plural' => true,
        'administrator_id' => true,
        'language' => true,
        'expression' => true,
    ];
}
