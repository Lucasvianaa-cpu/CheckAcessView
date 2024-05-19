<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Funcionario extends Entity
{

    protected $_accessible = [
        'salario' => true,
        'cargo_id' => true,
        'admissao'=> true,
        'is_active' => true,
        'is_trash' => true,
        'plano_saude_id' => true,
        'empresa_id' => true,
        'user_id' => true,
        'cargo' => true,
        'planos_saude' => true,
        'empresa' => true,
        'user' => true,
        'equipamentos' => true,
        'historicos_pontos' => true,
        'holerites' => true,
        'plantoes' => true,
    ];
}
