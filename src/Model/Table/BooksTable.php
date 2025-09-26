<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Books Model
 *
 * @property \App\Model\Table\PublishersTable&\Cake\ORM\Association\BelongsTo $Publishers
 * @property \App\Model\Table\BookTypesTable&\Cake\ORM\Association\BelongsTo $BookTypes
 *
 * @method \App\Model\Entity\Book newEmptyEntity()
 * @method \App\Model\Entity\Book newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Book[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Book get($primaryKey, $options = [])
 * @method \App\Model\Entity\Book findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Book patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Book[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Book|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BooksTable extends Table
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

        $this->setTable('books');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Publishers', [
            'foreignKey' => 'publisher_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('BookTypes', [
            'foreignKey' => 'book_type_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('StockDetails', [
            'foreignKey' => 'book_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('OrderDetails', [
            'foreignKey' => 'book_id',
        ])->setDependent(true);
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

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
        $rules->add($rules->existsIn(['publisher_id'], 'Publishers'), ['errorField' => 'publisher_id']);
        $rules->add($rules->existsIn(['book_type_id'], 'BookTypes'), ['errorField' => 'book_type_id']);
        $rules->add($rules->isUnique(['title'], 'Book with this title already exist'), ['errorField' => 'title']);

        return $rules;
    }
}