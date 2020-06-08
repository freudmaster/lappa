<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExpressionTraduites Model
 *
 * @property \App\Model\Table\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 * @property \App\Model\Table\ExpressionsTable&\Cake\ORM\Association\BelongsTo $Expressions
 *
 * @method \App\Model\Entity\ExpressionTraduite newEmptyEntity()
 * @method \App\Model\Entity\ExpressionTraduite newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ExpressionTraduite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExpressionTraduite get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExpressionTraduite findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ExpressionTraduite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExpressionTraduite[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExpressionTraduite|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExpressionTraduite saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExpressionTraduite[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExpressionTraduite[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExpressionTraduite[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExpressionTraduite[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ExpressionTraduitesTable extends Table
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

        $this->setTable('expression_traduites');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Expressions', [
            'foreignKey' => 'expression_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Administrators', [
            'foreignKey' => 'administrator_id',
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
            ->scalar('traduction')
            ->maxLength('traduction', 255)
            ->allowEmptyString('traduction')
            ->add('traduction', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('path')
            ->maxLength('path', 255)
            ->allowEmptyString('path');

        $validator
            ->scalar('plural')
            ->allowEmptyString('plural');

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
        $rules->add($rules->isUnique(['traduction']));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));
        $rules->add($rules->existsIn(['expression_id'], 'Expressions'));
        $rules->add($rules->existsIn(['administrator_id'], 'Administrators'));

        return $rules;
    }
}
