<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Planto Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $data
 * @property \Cake\I18n\FrozenTime $hora_total
 * @property \Cake\I18n\FrozenTime $hora_inicio
 * @property \Cake\I18n\FrozenTime $hora_termino
 * @property int $funcionario_id
 *
 * @property \App\Model\Entity\Funcionario[] $funcionarios
 */
class Planto extends Entity
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
        'data' => true,
        'hora_total' => true,
        'hora_inicio' => true,
        'hora_termino' => true,
        'funcionario_id' => true,
        'funcionarios' => true,
    ];
}
