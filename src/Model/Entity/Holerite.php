<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Holerite Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $data_holerite
 * @property string|null $descricao
 * @property \Cake\I18n\FrozenDate $data_admissao
 * @property float $salario
 * @property float|null $adicional_noturno
 * @property float|null $hora_extra
 * @property float|null $inss
 * @property float|null $fgts
 * @property float|null $ir
 * @property float|null $ferias
 * @property float|null $vale_alimentacao
 * @property float|null $horas_trabalhadas
 * @property float $base_fgts
 * @property float|null $base_inss
 * @property float $liquido
 * @property float $bruto
 * @property int $funcionario_id
 * @property string $created
 *
 * @property \App\Model\Entity\Funcionario $funcionario
 */
class Holerite extends Entity
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
        'data_holerite' => true,
        'descricao' => true,
        'data_admissao' => true,
        'salario' => true,
        'adicional_noturno' => true,
        'hora_extra' => true,
        'inss' => true,
        'fgts' => true,
        'ir' => true,
        'ferias' => true,
        'vale_alimentacao' => true,
        'horas_trabalhadas' => true,
        'base_fgts' => true,
        'base_inss' => true,
        'liquido' => true,
        'bruto' => true,
        'funcionario_id' => true,
        'created' => true,
        'funcionario' => true,
    ];
}
