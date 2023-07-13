<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FuncionariosPlanto Entity
 *
 * @property int $id
 * @property int $funcionario_id
 * @property int $plantao_id
 *
 * @property \App\Model\Entity\Funcionario $funcionario
 * @property \App\Model\Entity\Planto $planto
 */
class FuncionariosPlanto extends Entity
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
        'funcionario_id' => true,
        'plantao_id' => true,
        'funcionario' => true,
        'planto' => true,
    ];
}
