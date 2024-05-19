<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CidadesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('cidades');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Enderecos', [
            'foreignKey' => 'cidade_id',
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 80)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->integer('cod_ibge')
            ->requirePresence('cod_ibge', 'create')
            ->notEmptyString('cod_ibge');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));

        return $rules;
    }
}
