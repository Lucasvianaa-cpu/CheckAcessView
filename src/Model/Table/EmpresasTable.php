<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class EmpresasTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('empresas');
        $this->setDisplayField('razao_social');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Funcionarios', [
            'foreignKey' => 'empresa_id',
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('razao_social')
            ->maxLength('razao_social', 200)
            ->requirePresence('razao_social', 'create')
            ->notEmptyString('razao_social');

        $validator
            ->scalar('nome_fantasia')
            ->maxLength('nome_fantasia', 200)
            ->requirePresence('nome_fantasia', 'create')
            ->notEmptyString('nome_fantasia');

        $validator
            ->scalar('cnpj')
            ->maxLength('cnpj', 20)
            ->requirePresence('cnpj', 'create')
            ->notEmptyString('cnpj')
            ->add('cnpj', 'custom', [
                'rule' => [$this, 'validateCnpj'],
                'message' => 'CNPJ inválido'
            ]);

        $validator
            ->scalar('ie')
            ->maxLength('ie', 15)
            ->requirePresence('ie', 'create')
            ->notEmptyString('ie');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 10)
            ->requirePresence('cep', 'create')
            ->notEmptyString('cep');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 200)
            ->requirePresence('endereco', 'create')
            ->notEmptyString('endereco');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 100)
            ->requirePresence('bairro', 'create')
            ->notEmptyString('bairro');

        $validator
            ->scalar('numero')
            ->maxLength('numero', 8)
            ->requirePresence('numero', 'create')
            ->notEmptyString('numero');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 30)
            ->requirePresence('telefone', 'create')
            ->notEmptyString('telefone');

        $validator
            ->integer('qtd_funcionarios')
            ->requirePresence('qtd_funcionarios', 'create')
            ->notEmptyString('qtd_funcionarios');

        $validator
            ->scalar('desc_empresa')
            ->maxLength('desc_empresa', 200)
            ->allowEmptyString('desc_empresa');

         //$validator
        //    ->notEmptyString('is_active');
        return $validator;
    }

    public function validateCnpj($value, array $context)
    {
        // Remove caracteres não numéricos
        $cnpj = preg_replace('/[^0-9]/', '', $value);

        // Se o CNPJ estiver formatado, mantenha apenas os números
        if (strlen($cnpj) == 18) {
            $cnpj = substr($cnpj, 0, 2) . substr($cnpj, 3, 3) . substr($cnpj, 7, 3) . substr($cnpj, 11, 4) . substr($cnpj, 16, 2);
        }

        // Verifica se o CNPJ tem 14 dígitos
        if (strlen($cnpj) != 14) {
            return false;
        }

        // Calcula os dígitos verificadores
        $digit1 = $digit2 = 0;
        $multipliers = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        // Cálculo do primeiro dígito verificador
        for ($i = 0; $i < 12; $i++) {
            $digit1 += $cnpj[$i] * $multipliers[$i];
        }

        $remainder = $digit1 % 11;
        $digit1 = $remainder < 2 ? 0 : 11 - $remainder;

        // Cálculo do segundo dígito verificador
        $multipliers = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        for ($i = 0; $i < 13; $i++) {
            $digit2 += $cnpj[$i] * $multipliers[$i];
        }

        $remainder = $digit2 % 11;
        $digit2 = $remainder < 2 ? 0 : 11 - $remainder;

        // Verifica se os dígitos calculados são iguais aos dígitos informados
        if ($cnpj[12] != $digit1 || $cnpj[13] != $digit2) {
            return false;
        }

        return true;
    }
}