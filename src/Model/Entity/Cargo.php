<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Cargo extends Entity
{
    protected $_accessible = [
        'nome' => true,
        'descricao' => true,
        'categoria_id' => true,
        'empresa_id' => true,
        'categoria' => true,
        'funcionarios' => true,
    ];
}
