<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PontosHora Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $data_ponto
 * @property \Cake\I18n\FrozenTime $hora
 * @property int $historico_ponto_id
 *
 * @property \App\Model\Entity\HistoricosPonto $historicos_ponto
 */
class PontosHora extends Entity
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
        'data_ponto' => true,
        'hora' => true,
        'historico_ponto_id' => true,
        'historicos_ponto' => true,
    ];
}
