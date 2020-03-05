<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Group Entity
 *
 * @property int $id
 * @property string $name
 * @property string $parent_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ParentGroup $parent_group
 * @property \App\Model\Entity\ChildGroup[] $child_groups
 * @property \App\Model\Entity\Permission[] $permissions
 * @property \App\Model\Entity\ProfileField[] $profile_fields
 * @property \App\Model\Entity\User[] $users
 */
class Group extends Entity
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
        'parent_id' => true,
        'created' => true,
        'modified' => true,
        'parent_group' => true,
        'child_groups' => true,
        'permissions' => true,
        'profile_fields' => true,
        'users' => true,
    ];
}
