<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class EnderecosTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('enderecos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cidades', [
            'foreignKey' => 'cidade_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('rua')
            ->maxLength('rua', 200)
            ->requirePresence('rua', 'create')
            ->notEmptyString('rua');

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
            ->scalar('cep')
            ->maxLength('cep', 15)
            ->requirePresence('cep', 'create')
            ->notEmptyString('cep');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cidade_id'], 'Cidades'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
