<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Plantoes Model
 *
 * @property \App\Model\Table\FuncionariosTable&\Cake\ORM\Association\BelongsTo $Funcionarios
 * @property \App\Model\Table\FuncionariosTable&\Cake\ORM\Association\BelongsToMany $Funcionarios
 *
 * @method \App\Model\Entity\Planto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Planto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Planto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Planto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Planto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Planto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Planto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Planto findOrCreate($search, callable $callback = null, $options = [])
 */
class PlantoesTable extends Table
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

        $this->setTable('plantoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Funcionarios', [
            'foreignKey' => 'funcionario_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Funcionarios', [
            'foreignKey' => 'plantao_id',
            'targetForeignKey' => 'funcionario_id',
            'joinTable' => 'funcionarios_plantoes',
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
            ->date('data')
            ->requirePresence('data', 'create')
            ->notEmptyDate('data');

        $validator
            ->time('hora_total')
            ->requirePresence('hora_total', 'create')
            ->notEmptyTime('hora_total');

        $validator
            ->time('hora_inicio')
            ->requirePresence('hora_inicio', 'create')
            ->notEmptyTime('hora_inicio');

        $validator
            ->time('hora_termino')
            ->requirePresence('hora_termino', 'create')
            ->notEmptyTime('hora_termino');

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

        return $rules;
    }
}
