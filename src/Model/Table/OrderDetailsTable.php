<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderDetails Model
 *
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \App\Model\Table\BooksTable&\Cake\ORM\Association\BelongsTo $Books
 * @property \App\Model\Table\DiscountsTable&\Cake\ORM\Association\BelongsTo $Discounts
 *
 * @method \App\Model\Entity\OrderDetail newEmptyEntity()
 * @method \App\Model\Entity\OrderDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OrderDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrderDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrderDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OrderDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrderDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrderDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrderDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrderDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrderDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrderDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrderDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrderDetailsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('order_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Discounts', [
            'foreignKey' => 'discount_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('qty')
            ->requirePresence('qty', 'create')
            ->notEmptyString('qty');

        $validator
            ->numeric('unit_price')
            ->requirePresence('unit_price', 'create')
            ->notEmptyString('unit_price');
        /*
        $validator
            ->numeric('total')
            ->requirePresence('total', 'create')
            ->notEmptyString('total');*/

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['order_id'], 'Orders'), ['errorField' => 'order_id']);
        $rules->add($rules->existsIn(['book_id'], 'Books'), ['errorField' => 'book_id']);
        $rules->add($rules->existsIn(['discount_id'], 'Discounts'), ['errorField' => 'discount_id']);

        return $rules;
    }
}