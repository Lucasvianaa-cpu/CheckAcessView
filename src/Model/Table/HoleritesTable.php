<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Holerites Model
 *
 * @property \App\Model\Table\FuncionariosTable&\Cake\ORM\Association\BelongsTo $Funcionarios
 *
 * @method \App\Model\Entity\Holerite get($primaryKey, $options = [])
 * @method \App\Model\Entity\Holerite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Holerite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Holerite|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Holerite saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Holerite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Holerite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Holerite findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HoleritesTable extends Table
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

        $this->setTable('holerites');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Funcionarios', [
            'foreignKey' => 'funcionario_id',
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

        $validator
            ->date('data_holerite')
            ->requirePresence('data_holerite', 'create')
            ->notEmptyDate('data_holerite');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 45)
            ->allowEmptyString('descricao');

        $validator
            ->date('data_admissao')
            ->requirePresence('data_admissao', 'create')
            ->notEmptyDate('data_admissao');

        $validator
            ->decimal('salario')
            ->requirePresence('salario', 'create')
            ->notEmptyString('salario');

        $validator
            ->decimal('adicional_noturno')
            ->allowEmptyString('adicional_noturno');

        $validator
            ->decimal('hora_extra')
            ->allowEmptyString('hora_extra');

        $validator
            ->decimal('inss')
            ->allowEmptyString('inss');

        $validator
            ->decimal('fgts')
            ->allowEmptyString('fgts');

        $validator
            ->decimal('ir')
            ->allowEmptyString('ir');

        $validator
            ->decimal('ferias')
            ->allowEmptyString('ferias');

        $validator
            ->decimal('vale_alimentacao')
            ->allowEmptyString('vale_alimentacao');

        $validator
            ->decimal('horas_trabalhadas')
            ->allowEmptyString('horas_trabalhadas');

        $validator
            ->decimal('base_fgts')
            ->requirePresence('base_fgts', 'create')
            ->notEmptyString('base_fgts');

        $validator
            ->decimal('base_inss')
            ->allowEmptyString('base_inss');

        $validator
            ->decimal('liquido')
            ->requirePresence('liquido', 'create')
            ->notEmptyString('liquido');

        $validator
            ->decimal('bruto')
            ->requirePresence('bruto', 'create')
            ->notEmptyString('bruto');

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
