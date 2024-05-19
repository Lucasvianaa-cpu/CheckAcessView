<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class HistoricosPonto extends Entity
{

    protected $_accessible = [
        'created' => true,
        'funcionario_id' => true,
        'pontos_horas_id' => true,
        'funcionario' => true,
    ];
}
