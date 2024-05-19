<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PontosHorasTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('pontos_horas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('HistoricosPontos', [
            'foreignKey' => 'pontos_horas_id',
        ]);

        $this->belongsTo('Funcionarios', [
            'foreignKey' => 'funcionario_id',
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->date('data_ponto')
            ->requirePresence('data_ponto', 'create')
            ->notEmptyDate('data_ponto');

        $validator
            ->time('hora')
            ->requirePresence('hora', 'create')
            ->notEmptyTime('hora');

        return $validator;
    }


    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['historico_ponto_id'], 'HistoricosPontos'));

        return $rules;
    }
}
