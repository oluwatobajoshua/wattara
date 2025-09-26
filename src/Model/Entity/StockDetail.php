<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StockDetail Entity
 *
 * @property int $id
 * @property int $stock_id
 * @property int $book_id
 * @property float $cost_price
 * @property float $sales_price
 * @property int $quantity
 * @property int|null $quantity_out
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Stock $stock
 * @property \App\Model\Entity\Book $book
 */
class StockDetail extends Entity
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
        'stock_id' => true,
        'book_id' => true,
        'cost_price' => true,
        'sales_price' => true,
        'quantity' => true,
        'quantity_out' => true,
        'created' => true,
        'modified' => true,
        'stock' => true,
        'book' => true,
    ];
}
