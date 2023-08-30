<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Empresas Model
 *
 * @property \App\Model\Table\FuncionariosTable&\Cake\ORM\Association\HasMany $Funcionarios
 *
 * @method \App\Model\Entity\Empresa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Empresa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Empresa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Empresa|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empresa saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empresa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmpresasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('empresas');
        $this->setDisplayField('razao_social');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Funcionarios', [
            'foreignKey' => 'empresa_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('razao_social')
            ->maxLength('razao_social', 200)
            ->requirePresence('razao_social', 'create')
            ->notEmptyString('razao_social');

        $validator
            ->scalar('nome_fantasia')
            ->maxLength('nome_fantasia', 200)
            ->requirePresence('nome_fantasia', 'create')
            ->notEmptyString('nome_fantasia');

        $validator
            ->scalar('cnpj')
            ->maxLength('cnpj', 15)
            ->requirePresence('cnpj', 'create')
            ->notEmptyString('cnpj');

        $validator
            ->scalar('ie')
            ->maxLength('ie', 15)
            ->requirePresence('ie', 'create')
            ->notEmptyString('ie');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 10)
            ->requirePresence('cep', 'create')
            ->notEmptyString('cep');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 200)
            ->requirePresence('endereco', 'create')
            ->notEmptyString('endereco');

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
            ->scalar('telefone')
            ->maxLength('telefone', 30)
            ->requirePresence('telefone', 'create')
            ->notEmptyString('telefone');

        $validator
            ->integer('qtd_funcionarios')
            ->requirePresence('qtd_funcionarios', 'create')
            ->notEmptyString('qtd_funcionarios');

        $validator
            ->scalar('desc_empresa')
            ->maxLength('desc_empresa', 200)
            ->allowEmptyString('desc_empresa');

         //$validator
        //    ->notEmptyString('is_active');
        return $validator;
    }
}
