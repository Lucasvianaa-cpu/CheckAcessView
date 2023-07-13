<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Funcionario Entity
 *
 * @property int $id
 * @property float $salario
 * @property int $cargo_id
 * @property int $is_active
 * @property int|null $plano_saude_id
 * @property int $empresa_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Cargo $cargo
 * @property \App\Model\Entity\PlanosSaude $planos_saude
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Equipamento[] $equipamentos
 * @property \App\Model\Entity\HistoricosPonto[] $historicos_pontos
 * @property \App\Model\Entity\Holerite[] $holerites
 * @property \App\Model\Entity\Planto[] $plantoes
 */
class Funcionario extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'salario' => true,
        'cargo_id' => true,
        'is_active' => true,
        'plano_saude_id' => true,
        'empresa_id' => true,
        'user_id' => true,
        'cargo' => true,
        'planos_saude' => true,
        'empresa' => true,
        'user' => true,
        'equipamentos' => true,
        'historicos_pontos' => true,
        'holerites' => true,
        'plantoes' => true,
    ];
}
