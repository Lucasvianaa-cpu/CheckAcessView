<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Role extends Entity
{

    protected $_accessible = [
        'is_active' => true,
        'created' => true,
        'descricao' => true,
        'users' => true,
    ];
}
