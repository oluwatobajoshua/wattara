<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderDetail Entity
 *
 * @property int $id
 * @property int $order_id
 * @property int $qty
 * @property int $book_id
 * @property float $unit_price
 * @property int $discount_id
 * @property float $total
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Book $book
 * @property \App\Model\Entity\Discount $discount
 */
class OrderDetail extends Entity
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
        'order_id' => true,
        'return_qty' => true,
        'qty' => true,
        'book_id' => true,
        'unit_price' => true,
        'discount_id' => true,
        'return_detail_total' => true,
        'total' => true,
        'created' => true,
        'modified' => true,
        'order' => true,
        'book' => true,
        'discount' => true,
    ];
}