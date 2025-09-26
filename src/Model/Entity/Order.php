<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $payment_mode_id
 * @property float $received
 * @property float $total
 * @property \Cake\I18n\FrozenTime $paid_date
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\PaymentMode $payment_mode
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\OrderDetail[] $order_details
 */
class Order extends Entity
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
        'client_id' => true,
        'payment_mode_id' => true,
        'received' => true,
        'total' => true,
        'return_total' => true,
        'paid_date' => true,
        'status_id' => true,
        'created' => true,
        'modified' => true,
        'client' => true,
        'payment_mode' => true,
        'status' => true,
        'order_details' => true,
        'receipts' => true,
    ];

    // full_name virtual field
    protected function _getBalanceDue()
    {
        return $this->total - ($this->received + $this->return_total);
    }

    protected $_virtual = ['balance_due'];
}