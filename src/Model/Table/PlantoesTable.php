<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class PlantoesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('plantoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Funcionarios', [
            'foreignKey' => 'funcionario_id',
            'joinType' => 'INNER',
        ]);
        // $this->belongsToMany('Funcionarios', [
        //     'foreignKey' => 'plantao_id',
        //     'targetForeignKey' => 'funcionario_id',
        //     'joinTable' => 'funcionarios_plantoes',
        // ]);
    }


    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->date('data')
            ->requirePresence('data', 'create')
            ->notEmptyDate('data');

        // $validator
        //     ->time('hora_total')
        //     ->requirePresence('hora_total', 'create')
        //     ->notEmptyTime('hora_total');

        $validator
            ->time('hora_inicio')
            ->requirePresence('hora_inicio', 'create')
            ->notEmptyTime('hora_inicio');

        // $validator
        //     ->time('hora_termino')
        //     ->requirePresence('hora_termino', 'create')
        //     ->notEmptyTime('hora_termino');

        return $validator;
    }

    // public function buildRules(RulesChecker $rules)
    // {
    //     $rules->add($rules->existsIn(['funcionario_id'], 'Funcionarios'));

    //     return $rules;
    // }
}
