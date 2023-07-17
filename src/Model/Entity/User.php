<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity
{
    protected $_accessible = [
        'is_active' => true,
        'created' => true,
        'nome' => true,
        'password' => true,
        'sobrenome' => true,
        'cpf' => true,
        'rg' => true,
        'email' => true,
        'telefone' => true,
        'salario' => true,
        'data_nascimento' => true,
        'tipo_sanguineo' => true,
        'exp_profissional' => true,
        'agencia' => true,
        'conta' => true,
        'codigo_banco' => true,
        'pix' => true,
        'role_id' => true,
        'uid_rfid' => true,
        'email_empresarial' => true,
        'n_carteira_trabalho' => true,
        'realiza_plantao' => true,
        'role' => true,
        'veiculos' => true,
    ];

    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0 ) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
