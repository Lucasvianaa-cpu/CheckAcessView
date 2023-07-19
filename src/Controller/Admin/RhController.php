<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class RhController extends AppController
{

    public function index()
    {
        $this->loadModel('Users');
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }
}