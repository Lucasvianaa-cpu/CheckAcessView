<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Equipamento Entity
 *
 * @property int $id
 * @property string $num_patrimonio
 * @property string $descricao
 * @property int $is_active
 * @property \Cake\I18n\FrozenDate $created
 * @property int $funcionario_id
 *
 * @property \App\Model\Entity\Funcionario $funcionario
 */
class Equipamento extends Entity
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
        'num_patrimonio' => true,
        'descricao' => true,
        'is_active' => true,
        'created' => true,
        'is_trash' => true,
        'funcionario_id' => true,
        'funcionario' => true,
    ];
}
