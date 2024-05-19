<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class VeiculosTable extends Table
{
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

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
