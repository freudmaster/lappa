<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quizz Entity
 *
 * @property int $id
 * @property int|null $nb_word
 * @property int|null $nb_expression
 * @property int $level_id
 *
 * @property \App\Model\Entity\Level $level
 */
class Quizz extends Entity
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
        'nb_word' => true,
        'nb_expression' => true,
        'level_id' => true,
        'level' => true,
    ];
}
