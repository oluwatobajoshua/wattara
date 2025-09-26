<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string $name
 * @property string $repayment_mode
 * @property float $interest
 * @property float $service_charge
 * @property int $soft_loan
 * @property float $soft_loan_sc
 * @property int $normal_loan
 *
 * @property \App\Model\Entity\Package[] $packages
 */
class Category extends Entity
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
        'repayment_mode' => true,
        'interest' => true,
        'service_charge' => true,
        'soft_loan' => true,
        'soft_loan_sc' => true,
        'normal_loan' => true,
        'packages' => true,
    ];
}
