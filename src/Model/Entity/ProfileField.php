<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProfileField Entity
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $options_values
 * @property string $icon
 * @property int $group_id
 * @property bool $front_back
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\User[] $users
 */
class ProfileField extends Entity
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
        'type' => true,
        'options_values' => true,
        'icon' => true,
        'group_id' => true,
        'front_back' => true,
        'created' => true,
        'modified' => true,
        'group' => true,
        'users' => true,
    ];
}
