<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
/**
 * User Entity
 *
 * @property int $id
 * @property int $role_id
 * @property int $branch_id
 * @property int $accounts_count
 * @property float|null $credit
 * @property float|null $debit
 * @property float|null $balance
 * @property string $username
 * @property string $password
 * @property string $raw_password
 * @property string $password_reset_token
 * @property string $quest_one
 * @property string $ans_one
 * @property string $quest_two
 * @property string $ans_two
 * @property string $currency
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Account[] $accounts
 * @property \App\Model\Entity\Profile[] $profiles
 */
class User extends Entity
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
        'role_id' => true,
        'branch_id' => true,
        'accounts_count' => true,
        'credit' => true,
        'debit' => true,
        'balance' => true,
        'username' => true,
        'password' => true,
        'raw_password' => true,
        'password_reset_token' => true,
        'quest_one' => true,
        'ans_one' => true,
        'quest_two' => true,
        'ans_two' => true,
        'currency' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'branch' => true,
        'accounts' => true,
        'profiles' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'raw_password'
    ];
    
    // Add this method
    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
    
    // Add this method
    protected function _setRawPassword(string $raw_password) : ?string
    {
        if (strlen($raw_password) > 0) {
            return (new DefaultPasswordHasher())->hash($raw_password);
        }
    }
}