<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class FuncionariosTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('funcionarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cargos', [
            'foreignKey' => 'cargo_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PlanosSaudes', [
            'foreignKey' => 'plano_saude_id',
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Equipamentos', [
            'foreignKey' => 'funcionario_id',
        ]);
        $this->hasMany('HistoricosPontos', [
            'foreignKey' => 'funcionario_id',
        ]);
        $this->hasMany('Holerites', [
            'foreignKey' => 'funcionario_id',
        ]);
        $this->hasMany('Plantoes', [
            'foreignKey' => 'funcionario_id',
        ]);
        $this->belongsToMany('Plantoes', [
            'foreignKey' => 'funcionario_id',
            'targetForeignKey' => 'plantao_id',
            'joinTable' => 'funcionarios_plantoes',
        ]);
    }


    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->decimal('salario')
            ->requirePresence('salario', 'create')
            ->notEmptyString('salario');
            
        //$validator
        //    ->notEmptyString('is_active');

        return $validator;
    }


    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cargo_id'], 'Cargos'));
        $rules->add($rules->existsIn(['plano_saude_id'], 'PlanosSaudes'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function getSalarioPorId($funcionarioId)
    {
        $query = $this->find()
            ->select(['salario'])
            ->where(['id' => $funcionarioId])
            ->first();

        return $query ? $query->salario : null;
    }
}
