<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProfileFieldsUser Entity
 *
 * @property int $id
 * @property int $profile_field_id
 * @property int $user_id
 * @property string $val
 *
 * @property \App\Model\Entity\ProfileField $profile_field
 * @property \App\Model\Entity\User $user
 */
class ProfileFieldsUser extends Entity
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
        'profile_field_id' => true,
        'user_id' => true,
        'val' => true,
        'profile_field' => true,
        'user' => true,
    ];
}
