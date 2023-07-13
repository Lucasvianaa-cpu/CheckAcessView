<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Endereco Entity
 *
 * @property int $id
 * @property string $rua
 * @property string $bairro
 * @property string $numero
 * @property string $cep
 * @property int $cidade_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Cidade $cidade
 * @property \App\Model\Entity\User $user
 */
class Endereco extends Entity
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
        'rua' => true,
        'bairro' => true,
        'numero' => true,
        'cep' => true,
        'cidade_id' => true,
        'user_id' => true,
        'cidade' => true,
        'user' => true,
    ];
}
