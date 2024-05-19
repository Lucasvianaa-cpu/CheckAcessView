<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Categoria extends Entity
{

    protected $_accessible = [
        'nome' => true,
        'descricao' => true,
        'is_active' => true,
        'is_trash' => true,
        'cargos' => true,
        'empresa_id' => true,
    ];
}
