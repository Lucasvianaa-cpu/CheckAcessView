<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Funcionarios Model
 *
 * @property \App\Model\Table\CargosTable&\Cake\ORM\Association\BelongsTo $Cargos
 * @property \App\Model\Table\PlanosSaudesTable&\Cake\ORM\Association\BelongsTo $PlanosSaudes
 * @property \App\Model\Table\EmpresasTable&\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\EquipamentosTable&\Cake\ORM\Association\HasMany $Equipamentos
 * @property \App\Model\Table\HistoricosPontosTable&\Cake\ORM\Association\HasMany $HistoricosPontos
 * @property \App\Model\Table\HoleritesTable&\Cake\ORM\Association\HasMany $Holerites
 * @property \App\Model\Table\PlantoesTable&\Cake\ORM\Association\HasMany $Plantoes
 * @property \App\Model\Table\PlantoesTable&\Cake\ORM\Association\BelongsToMany $Plantoes
 *
 * @method \App\Model\Entity\Funcionario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Funcionario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Funcionario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Funcionario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Funcionario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Funcionario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Funcionario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Funcionario findOrCreate($search, callable $callback = null, $options = [])
 */
class FuncionariosTable extends Table
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

        $this->setTable('funcionarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cargos', [
            'foreignKey' => 'cargo_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PlanosSaudes', [
            'foreignKey' => 'plano_saude_id',
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Equipamentos', [
            'foreignKey' => 'funcionario_id',
        ]);
        $this->hasMany('HistoricosPontos', [
            'foreignKey' => 'funcionario_id',
        ]);
        $this->hasMany('Holerites', [
            'foreignKey' => 'funcionario_id',
        ]);
        $this->hasMany('Plantoes', [
            'foreignKey' => 'funcionario_id',
        ]);
        $this->belongsToMany('Plantoes', [
            'foreignKey' => 'funcionario_id',
            'targetForeignKey' => 'plantao_id',
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
            ->decimal('salario')
            ->requirePresence('salario', 'create')
            ->notEmptyString('salario');
            
        //$validator
        //    ->notEmptyString('is_active');

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
        $rules->add($rules->existsIn(['cargo_id'], 'Cargos'));
        $rules->add($rules->existsIn(['plano_saude_id'], 'PlanosSaudes'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function getSalarioPorId($funcionarioId)
    {
        $query = $this->find()
            ->select(['salario'])
            ->where(['id' => $funcionarioId])
            ->first();

        return $query ? $query->salario : null;
    }
}
