<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlanosSaude Entity
 *
 * @property int $id
 * @property string $registro
 * @property string $nome
 * @property string $descricao
 * @property string|null $telefone
 * @property string|null $celular
 * @property \Cake\I18n\FrozenTime $created
 * @property int $is_active
 */
class PlanosSaude extends Entity
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
        'registro' => true,
        'nome' => true,
        'descricao' => true,
        'telefone' => true,
        'celular' => true,
        'created' => true,
        'is_trash' => true,
        'is_active' => true,
        'empresa_id' => true,
    ];
}
