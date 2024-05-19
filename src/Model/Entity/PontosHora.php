<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class PontosHora extends Entity
{

    protected $_accessible = [
        'data_ponto' => true,
        'hora' => true,
    ];
}
