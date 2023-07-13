<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FuncionariosPlantoes Model
 *
 * @property \App\Model\Table\FuncionariosTable&\Cake\ORM\Association\BelongsTo $Funcionarios
 * @property \App\Model\Table\PlantoesTable&\Cake\ORM\Association\BelongsTo $Plantoes
 *
 * @method \App\Model\Entity\FuncionariosPlanto get($primaryKey, $options = [])
 * @method \App\Model\Entity\FuncionariosPlanto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FuncionariosPlanto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FuncionariosPlanto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FuncionariosPlanto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FuncionariosPlanto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FuncionariosPlanto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FuncionariosPlanto findOrCreate($search, callable $callback = null, $options = [])
 */
class FuncionariosPlantoesTable extends Table
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

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['funcionario_id'], 'Funcionarios'));
        $rules->add($rules->existsIn(['plantao_id'], 'Plantoes'));

        return $rules;
    }
}
