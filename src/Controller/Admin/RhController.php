<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class RhController extends AppController
{

    public function index()
    {
        $this->loadModel('Users');
        $users = $this->paginate($this->Users);

        $roles = $this->Users->Roles->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $this->set(compact('users', 'roles'));
    }
}