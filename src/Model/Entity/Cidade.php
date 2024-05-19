<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;


class Cidade extends Entity
{
    protected $_accessible = [
        'nome' => true,
        'cod_ibge' => true,
        'estado_id' => true,
        'estado' => true,
        'enderecos' => true,
    ];
}
