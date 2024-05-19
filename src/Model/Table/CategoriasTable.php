<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class CategoriasTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('categorias');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('Cargos', [
            'foreignKey' => 'categoria_id',
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
            ->scalar('nome')
            ->maxLength('nome', 45)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 100)
            ->allowEmptyString('descricao');

        //$validator
        //    ->notEmptyString('is_active');
        return $validator;
    }
}
