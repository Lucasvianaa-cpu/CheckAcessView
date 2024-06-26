<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsersTable extends Table
{

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

         $validator
             ->scalar('cpf')
             ->maxLength('cpf', 45)
             //->requirePresence('cpf', 'create')
             ->add('cpf', 'custom', [
                'rule' => [$this, 'validateCpf'],
                'message' => 'CPF inválido'
            ]);

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


    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }
    public function validateCpf($value, array $context)
    {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/[^0-9]/', '', $value);

        // Se o CPF estiver formatado, mantenha apenas os números
        if (strlen($cpf) == 14) {
            $cpf = substr($cpf, 0, 3) . substr($cpf, 4, 3) . substr($cpf, 8, 3) . substr($cpf, 12, 2);
        }

        // Verifica se o CPF tem 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        // Calcula os dígitos verificadores
        $digit1 = $digit2 = 0;
        for ($i = 0; $i < 9; $i++) {
            $digit1 += $cpf[$i] * (10 - $i);
            $digit2 += $cpf[$i] * (11 - $i);
        }

        $digit1 = ($digit1 % 11) < 2 ? 0 : 11 - ($digit1 % 11);
        $digit2 = ($digit2 + $digit1 * 2) % 11;

        $digit2 = $digit2 < 2 ? 0 : 11 - $digit2;

        // Verifica se os dígitos calculados são iguais aos dígitos informados
        if ($cpf[9] != $digit1 || $cpf[10] != $digit2) {
            return false;
        }

        return true;
    }

}
     

