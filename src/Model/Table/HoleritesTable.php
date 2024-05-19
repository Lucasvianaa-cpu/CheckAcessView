<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class HoleritesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('holerites');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Funcionarios', [
            'foreignKey' => 'funcionario_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->date('data_holerite')
            ->requirePresence('data_holerite', 'create')
            ->notEmptyDate('data_holerite');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 60)
            ->allowEmptyString('descricao');

        $validator
            ->scalar('mes')
            ->maxLength('mes', 45)
            ->allowEmptyString('mes');

        $validator
            ->decimal('salario_base')
            ->requirePresence('salario_base', 'create')
            ->notEmptyString('salario_base');

        $validator
            ->decimal('inss')
            ->allowEmptyString('inss');

        $validator
            ->decimal('fgts')
            ->allowEmptyString('fgts');

        $validator
            ->decimal('ir')
            ->allowEmptyString('ir');

        $validator
            ->decimal('base_fgts')
            ->requirePresence('base_fgts', 'create')
            ->notEmptyString('base_fgts');

        $validator
            ->decimal('base_inss')
            ->allowEmptyString('base_inss');

        $validator
            ->decimal('liquido')
            ->requirePresence('liquido', 'create')
            ->notEmptyString('liquido');

        $validator
            ->decimal('total_descontos')
            ->requirePresence('total_descontos', 'create')
            ->notEmptyString('total_descontos');

        $validator
            ->decimal('total_vencimentos')
            ->requirePresence('total_vencimentos', 'create')
            ->notEmptyString('total_vencimentos');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['funcionario_id'], 'Funcionarios'));

        return $rules;
    }
}
