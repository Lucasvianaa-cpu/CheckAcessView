<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class FuncionariosPlantoesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('funcionarios_plantoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Funcionarios', [
            'foreignKey' => 'funcionario_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Plantoes', [
            'foreignKey' => 'plantao_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['funcionario_id'], 'Funcionarios'));
        $rules->add($rules->existsIn(['plantao_id'], 'Plantoes'));

        return $rules;
    }
}
