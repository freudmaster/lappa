<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Traductions Model
 *
 * @property \App\Model\Table\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 * @property \App\Model\Table\MotsTable&\Cake\ORM\Association\BelongsTo $Mots
 *
 * @method \App\Model\Entity\Traduction newEmptyEntity()
 * @method \App\Model\Entity\Traduction newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Traduction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Traduction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Traduction findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Traduction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Traduction[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Traduction|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Traduction saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Traduction[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Traduction[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Traduction[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Traduction[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TraductionsTable extends Table
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

        $this->setTable('traductions');
        $this->setDisplayField('mots');
        $this->setPrimaryKey('id');

        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Mots', [
            'foreignKey' => 'mot_id',
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
            ->maxLength('traduction', 300)
            ->requirePresence('traduction', 'create')
            ->notEmptyString('traduction');

        $validator
            ->scalar('path_audio')
            ->maxLength('path_audio', 255)
            ->allowEmptyString('path_audio');

        $validator
            ->scalar('plural')
            ->maxLength('plural', 255)
            ->allowEmptyString('plural');

        $validator
            ->dateTime('date_created')
            ->notEmptyDateTime('date_created');

        $validator
            ->dateTime('date_modified')
            ->notEmptyDateTime('date_modified');

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
        $rules->add($rules->existsIn(['language_id'], 'Languages'));
        $rules->add($rules->existsIn(['mot_id'], 'Mots'));
        $rules->add($rules->existsIn(['administrator_id'], 'Administrators'));

        return $rules;
    }
}
