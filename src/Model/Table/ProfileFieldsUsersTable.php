<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProfileFieldsUsers Model
 *
 * @property \App\Model\Table\ProfileFieldsTable&\Cake\ORM\Association\BelongsTo $ProfileFields
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ProfileFieldsUser newEmptyEntity()
 * @method \App\Model\Entity\ProfileFieldsUser newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ProfileFieldsUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProfileFieldsUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProfileFieldsUser findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ProfileFieldsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProfileFieldsUser[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProfileFieldsUser|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProfileFieldsUser saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProfileFieldsUser[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProfileFieldsUser[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProfileFieldsUser[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProfileFieldsUser[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProfileFieldsUsersTable extends Table
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

        $this->setTable('profile_fields_users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ProfileFields', [
            'foreignKey' => 'profile_field_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('val')
            ->maxLength('val', 255)
            ->requirePresence('val', 'create')
            ->notEmptyString('val');

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
        $rules->add($rules->existsIn(['profile_field_id'], 'ProfileFields'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
