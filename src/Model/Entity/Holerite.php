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
 * @property \Cake\I18n\FrozenTime $created
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
        'ano' => true,
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
        'inss_checkbox'=> true,
        'dsr_checkbox'=> true,
        'adc_sobre_checkbox'=> true,
        'hr50_checkbox'=> true,
        'hr80_checkbox'=> true,
        'hr100_checkbox'=> true,
        'ferias_checkbox'=> true,
        'vale_alimentacao'=> true,
        'adiantamento'=> true,
        'salario_codigo'=> true,
        'inss_codigo'=> true,
        'dsr_codigo'=> true,
        'adc_sobre_codigo'=> true,
        'hr50_codigo'=> true,
        'hr80_codigo'=> true,
        'hr100_codigo'=> true,
        'ferias_codigo'=> true,
        'vale_alimentacao_codigo'=> true,
        'adiantamento_codigo'=> true,
        'salario_descricao'=> true,
        'inss_descricao'=> true,
        'dsr_descricao'=> true,
        'adc_sobre_descricao'=> true,
        'hr50_descricao'=> true,
        'hr80_descricao'=> true,
        'hr100_descricao'=> true,
        'ferias_descricao'=> true,
        'vale_alimentacao_descricao'=> true,
        'adiantamento_descricao'=> true,
        'salario_referencia'=> true,
        'inss_referencia'=> true,
        'dsr_referencia'=> true,
        'adc_sobre_referencia'=> true,
        'hr50_referencia'=> true,
        'hr80_referencia'=> true,
        'hr100_referencia'=> true,
        'ferias_referencia'=> true,
        'vale_alimentacao_referencia'=> true,
        'adiantamento_referencia'=> true,
        'salario_vencimento'=> true,
        'inss_vencimento'=> true,
        'dsr_vencimento'=> true,
        'adc_sobre_vencimento'=> true,
        'hr50_vencimento'=> true,
        'hr80_vencimento'=> true,
        'hr100_vencimento'=> true,
        'ferias_vencimento'=> true,
        'vale_alimentacao_vencimento'=> true,
        'adiantamento_vencimento'=> true,
        'salario_desconto'=> true,
        'inss_desconto'=> true,
        'dsr_desconto'=> true,
        'adc_sobre_desconto'=> true,
        'hr50_desconto'=> true,
        'hr80_desconto'=> true,
        'hr100_desconto'=> true,
        'ferias_desconto'=> true,
        'vale_alimentacao_desconto'=> true,
        'adiantamento_desconto'=> true,
        'funcionario_id' => true,
        'created' => true,
        'funcionario' => true,
    ];
}
