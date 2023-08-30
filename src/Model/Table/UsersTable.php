<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 * @property &\Cake\ORM\Association\HasMany $Enderecos
 * @property &\Cake\ORM\Association\HasMany $Funcionarios
 * @property \App\Model\Table\VeiculosTable&\Cake\ORM\Association\HasMany $Veiculos
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Enderecos', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Funcionarios', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Veiculos', [
            'foreignKey' => 'user_id',
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

        //$validator
        //    ->notEmptyString('is_active');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 100)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        // $validator
        //     ->scalar('sobrenome')
        //     ->maxLength('sobrenome', 100)
        //     ->requirePresence('sobrenome', 'create')
        //     ->notEmptyString('sobrenome');

        // $validator
        //     ->scalar('cpf')
        //     ->maxLength('cpf', 45)
        //     ->requirePresence('cpf', 'create')
        //     ->notEmptyString('cpf');

        // $validator
        //     ->scalar('rg')
        //     ->maxLength('rg', 45)
        //     ->requirePresence('rg', 'create')
        //     ->notEmptyString('rg');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        // $validator
        //     ->scalar('telefone')
        //     ->maxLength('telefone', 30)
        //     ->requirePresence('telefone', 'create')
        //     ->notEmptyString('telefone');

        // $validator
        //     ->decimal('salario')
        //     ->requirePresence('salario', 'create')
        //     ->notEmptyString('salario');

        // $validator
        //     ->dateTime('data_nascimento')
        //     ->requirePresence('data_nascimento', 'create')
        //     ->notEmptyDateTime('data_nascimento');

        // $validator
        //     ->scalar('tipo_sanguineo')
        //     ->maxLength('tipo_sanguineo', 3)
        //     ->requirePresence('tipo_sanguineo', 'create')
        //     ->notEmptyString('tipo_sanguineo');

        // $validator
        //     ->scalar('exp_profissional')
        //     ->maxLength('exp_profissional', 250)
        //     ->allowEmptyString('exp_profissional');

        // $validator
        //     ->scalar('agencia')
        //     ->maxLength('agencia', 8)
        //     ->allowEmptyString('agencia');

        // $validator
        //     ->scalar('conta')
        //     ->maxLength('conta', 25)
        //     ->allowEmptyString('conta');

        // $validator
        //     ->scalar('codigo_banco')
        //     ->maxLength('codigo_banco', 5)
        //     ->allowEmptyString('codigo_banco');

        // $validator
        //     ->scalar('pix')
        //     ->maxLength('pix', 120)
        //     ->allowEmptyString('pix');

        // $validator
        //     ->scalar('uid_rfid')
        //     ->maxLength('uid_rfid', 255)
        //     ->allowEmptyString('uid_rfid');

        // $validator
        //     ->scalar('email_empresarial')
        //     ->maxLength('email_empresarial', 120)
        //     ->allowEmptyString('email_empresarial');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }
}
