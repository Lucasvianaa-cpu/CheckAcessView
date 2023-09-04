<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empresa Entity
 *
 * @property int $id
 * @property string $razao_social
 * @property string $nome_fantasia
 * @property string $cnpj
 * @property string $ie
 * @property string $cep
 * @property string $endereco
 * @property string $bairro
 * @property string $numero
 * @property string $telefone
 * @property int $qtd_funcionarios
 * @property string|null $desc_empresa
 * @property \Cake\I18n\FrozenTime $created
 * @property int $is_active
 *
 * @property \App\Model\Entity\Funcionario[] $funcionarios
 */
class Empresa extends Entity
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
        'razao_social' => true,
        'nome_fantasia' => true,
        'cnpj' => true,
        'ie' => true,
        'cep' => true,
        'endereco' => true,
        'bairro' => true,
        'numero' => true,
        'telefone' => true,
        'qtd_funcionarios' => true,
        'desc_empresa' => true,
        'caminho_foto' => true,
        'created' => true,
        'is_active' => true,
        'is_trash' => true,
        'funcionarios' => true,
    ];
}
