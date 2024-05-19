<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Equipamento extends Entity
{

    protected $_accessible = [
        'num_patrimonio' => true,
        'descricao' => true,
        'is_active' => true,
        'created' => true,
        'is_trash' => true,
        'funcionario_id' => true,
        'funcionario' => true,
        'empresa_id' => true,
    ];
}
