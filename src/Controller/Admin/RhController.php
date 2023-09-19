<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Response;

class RhController extends AppController
{

    public function index()
    {
        $conditions = [];

        $this->loadModel('Users');
        $this->loadModel('Roles');

        if ($this->request->getQuery('nome') != '') {
            $nome = $this->request->getQuery('nome');
            $conditions['LOWER(Users.nome) LIKE'] = '%' . strtolower($nome) . '%';
        }

        // Condição para filtrar usuários com role_id = 4
        $conditions['Users.role_id'] = 4;

        $this->paginate = [
            'contain' => ['Roles', 'Funcionarios'],
            'limit' => 3
        ];

        // Passar as condições diretamente no método paginate
        $users = $this->paginate($this->Users, ['conditions' => $conditions]);

        $roles = $this->Users->Roles->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $this->set(compact('users', 'roles'));
    }
    public function alterarPermissao()
    {

        $this->loadModel('Users');
        $conditions = [];

        if ($this->request->getQuery('nome') != '') {
            $nome = $this->request->getQuery('nome');
            $conditions['LOWER(Users.nome) LIKE'] = '%' . strtolower($nome) . '%';
        }



        $this->paginate = [
            'contain' => ['Roles'],
            'limit' => 3
        ];
        $users = $this->paginate($this->Users, ['conditions' => $conditions]);

        $roles = $this->Users->Roles->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $this->set(compact('users', 'roles'));
    }


    public function relatorios()
    {

       
    }


    public function permissions($id = null)
    {

        $this->loadModel('Users');
        $this->loadModel('Roles');

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $user->role_id = $this->request->getData('roles_id');

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Permissão definida com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A permissão não pôde ser definida. Por favor, tente novamente.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'descricao']);
        $this->set(compact('user', 'roles'));
    }
}
