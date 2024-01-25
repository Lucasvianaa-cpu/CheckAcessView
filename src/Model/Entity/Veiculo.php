<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Veiculo Entity
 *
 * @property int $id
 * @property string $placa
 * @property string $modelo
 * @property string $cor
 * @property string|null $veiculoscol
 * @property string $created
 * @property int $is_active
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Veiculo extends Entity
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
        'placa' => true,
        'modelo' => true,
        'cor' => true,
        'created' => true,
        'is_active' => true,
        'is_trash' => true,
        'user_id' => true,
        'user' => true,
        'empresa_id' => true,
    ];
}
