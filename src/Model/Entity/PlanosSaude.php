<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;


class PlanosSaude extends Entity
{

    protected $_accessible = [
        'registro' => true,
        'nome' => true,
        'descricao' => true,
        'telefone' => true,
        'celular' => true,
        'created' => true,
        'is_trash' => true,
        'is_active' => true,
        'empresa_id' => true,
    ];
}
