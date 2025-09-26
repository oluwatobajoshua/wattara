<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StockDetails Model
 *
 * @property \App\Model\Table\StocksTable&\Cake\ORM\Association\BelongsTo $Stocks
 * @property \App\Model\Table\BooksTable&\Cake\ORM\Association\BelongsTo $Books
 *
 * @method \App\Model\Entity\StockDetail newEmptyEntity()
 * @method \App\Model\Entity\StockDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\StockDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StockDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\StockDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\StockDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StockDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\StockDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StockDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StockDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StockDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\StockDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StockDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StockDetailsTable extends Table
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

        $this->setTable('stock_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Stocks', [
            'foreignKey' => 'stock_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
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
        /*
        $validator
            ->numeric('cost_price')
            ->requirePresence('cost_price', 'create')
            ->notEmptyString('cost_price');
        

        $validator
            ->numeric('sales_price')
            ->requirePresence('sales_price', 'create')
            ->notEmptyString('sales_price');*/

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->integer('quantity_out')
            ->allowEmptyString('quantity_out');

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
        $rules->add($rules->existsIn(['stock_id'], 'Stocks'), ['errorField' => 'stock_id']);
        $rules->add($rules->existsIn(['book_id'], 'Books'), ['errorField' => 'book_id']);

        return $rules;
    }
}