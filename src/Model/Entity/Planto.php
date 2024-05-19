<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Planto extends Entity
{

    protected $_accessible = [
        'data' => true,
        'hora_total' => true,
        'hora_inicio' => true,
        'hora_termino' => true,
        'funcionario_id' => true,
        'funcionarios' => true,
    ];
}
