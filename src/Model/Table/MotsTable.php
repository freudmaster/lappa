<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mots Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\LevelsTable&\Cake\ORM\Association\BelongsTo $Levels
 * @property \App\Model\Table\FavoriesTable&\Cake\ORM\Association\HasMany $Favories
 * @property \App\Model\Table\TraductionsTable&\Cake\ORM\Association\HasMany $Traductions
 *
 * @method \App\Model\Entity\Mot newEmptyEntity()
 * @method \App\Model\Entity\Mot newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Mot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mot get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mot findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Mot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mot[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mot|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mot saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mot[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Mot[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Mot[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Mot[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MotsTable extends Table
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

        $this->setTable('mots');
        $this->setDisplayField('valeur');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Levels', [
            'foreignKey' => 'level_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Administrators', [
            'foreignKey' => 'administrator_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Favories', [
            'foreignKey' => 'mot_id',
        ]);
        $this->hasMany('Traductions', [
            'foreignKey' => 'mot_id',
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
            ->scalar('valeur')
            ->maxLength('valeur', 100)
            ->requirePresence('valeur', 'create')
            ->notEmptyString('valeur');

        $validator
            ->scalar('definition')
            ->allowEmptyString('definition');

        $validator
            ->scalar('path')
            ->allowEmptyString('path');

        $validator
            ->scalar('plural')
            ->allowEmptyString('plural');

        $validator
            ->integer('code')
            ->allowEmptyString('code');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['level_id'], 'Levels'));
        $rules->add($rules->existsIn(['administrator_id'], 'Administrators'));

        return $rules;
    }
}
