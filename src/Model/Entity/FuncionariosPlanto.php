<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class FuncionariosPlanto extends Entity
{

    protected $_accessible = [
        'funcionario_id' => true,
        'plantao_id' => true,
        'funcionario' => true,
        'planto' => true,
    ];
}
