<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PontosHoras Model
 *
 * @property \App\Model\Table\HistoricosPontosTable&\Cake\ORM\Association\BelongsTo $HistoricosPontos
 *
 * @method \App\Model\Entity\PontosHora get($primaryKey, $options = [])
 * @method \App\Model\Entity\PontosHora newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PontosHora[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PontosHora|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PontosHora saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PontosHora patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PontosHora[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PontosHora findOrCreate($search, callable $callback = null, $options = [])
 */
class PontosHorasTable extends Table
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
            ->date('data_ponto')
            ->requirePresence('data_ponto', 'create')
            ->notEmptyDate('data_ponto');

        $validator
            ->time('hora')
            ->requirePresence('hora', 'create')
            ->notEmptyTime('hora');

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
        $rules->add($rules->existsIn(['historico_ponto_id'], 'HistoricosPontos'));

        return $rules;
    }
}
