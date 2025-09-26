<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Profile Entity
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property \Cake\I18n\FrozenDate|null $date_of_birth
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $passport
 * @property string|null $sign
 * @property int $status_id
 * @property int|null $user_id
 *
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\Client[] $clients
 */
class Profile extends Entity
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
        'last_name' => true,
        'first_name' => true,
        'date_of_birth' => true,
        'email' => true,
        'phone' => true,
        'passport' => true,
        'sign' => true,
        'status_id' => true,
        'user_id' => true,
        'status' => true,
        'user' => true,
        'addresses' => true,
        'clients' => true
    ];

    // full_name virtual field
    protected function _getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    protected $_virtual = ['full_name'];
}