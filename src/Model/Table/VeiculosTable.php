<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Veiculos Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Veiculo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Veiculo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Veiculo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Veiculo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Veiculo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Veiculo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Veiculo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Veiculo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VeiculosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('veiculos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Empresas', [
            'className' => 'Empresa',
            'foreignKey' => 'empresa_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('placa')
            ->maxLength('placa', 10)
            ->requirePresence('placa', 'create')
            ->notEmptyString('placa');

        $validator
            ->scalar('modelo')
            ->maxLength('modelo', 45)
            ->requirePresence('modelo', 'create')
            ->notEmptyString('modelo');

        $validator
            ->scalar('cor')
            ->maxLength('cor', 45)
            ->requirePresence('cor', 'create')
            ->notEmptyString('cor');

        $validator
            ->scalar('veiculoscol')
            ->maxLength('veiculoscol', 45)
            ->allowEmptyString('veiculoscol');

        //$validator
        //    ->notEmptyString('is_active');
        
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
