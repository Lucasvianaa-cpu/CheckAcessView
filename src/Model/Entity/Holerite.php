<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Holerite Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $data_holerite
 * @property string $descricao
 * @property string $mes
 * @property \Cake\I18n\FrozenDate $data_admissao
 * @property float $salario_base
 * @property float|null $inss
 * @property float|null $fgts
 * @property float|null $ir
 * @property float $base_fgts
 * @property float|null $base_inss
 * @property float $liquido
 * @property float $total_vencimentos
 * @property float $total_descontos

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
        'mes' => true,
        'data_admissao' => true,
        'salario_base' => true,
        'inss' => true,
        'fgts' => true,
        'ir' => true,
        'base_fgts' => true,
        'base_inss' => true,
        'liquido' => true,
        'total_descontos' => true,
        'total_vencimentos' => true,
        'salario_checkbox'=> true,
        'dsr_checkbox'=> true,
        'adc_sobre_checkbox'=> true,
        'hr50_checkbox'=> true,
        'hr80_checkbox'=> true,
        'hr100_checkbox'=> true,
        'ferias'=> true,
        'vale_alimentacao'=> true,
        'adiantamento'=> true,
        'funcionario_id' => true,
        'created' => true,
        'funcionario' => true,
    ];
}
