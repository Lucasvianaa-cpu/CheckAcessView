<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Empresa extends Entity
{

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
