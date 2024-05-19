<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class EquipamentosTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('equipamentos');
        $this->setDisplayField('num_patrimonio');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Funcionarios', [
            'foreignKey' => 'funcionario_id',
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
            ->scalar('num_patrimonio')
            ->maxLength('num_patrimonio', 45)
            ->requirePresence('num_patrimonio', 'create')
            ->notEmptyString('num_patrimonio')
            ->add('num_patrimonio', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 100)
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');
            
            
        //$validator
        //    ->notEmptyString('is_active');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['funcionario_id'], 'Funcionarios'));

        return $rules;
    }
}
