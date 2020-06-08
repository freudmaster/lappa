<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Traduction Entity
 *
 * @property int $id
 * @property int $language_id
 * @property int $mot_id
 * @property string $traduction
 * @property string|null $path_audio
 * @property string|null $plural
 * @property int $administrator_id
 * @property \Cake\I18n\FrozenTime $date_created
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \App\Model\Entity\Language $language
 * @property \App\Model\Entity\Mot $mot
 */
class Traduction extends Entity
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
        'mot_id' => true,
        'traduction' => true,
        'path_audio' => true,
        'plural' => true,
        'administrator_id' => true,
        'date_created' => true,
        'date_modified' => true,
        'language' => true,
        'mot' => true,
    ];
}
