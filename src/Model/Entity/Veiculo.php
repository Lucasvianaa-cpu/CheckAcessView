<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Veiculo extends Entity
{

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
