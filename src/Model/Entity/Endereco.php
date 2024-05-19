<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Endereco extends Entity
{

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
