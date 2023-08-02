<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Response;

class RhController extends AppController
{

    public function index()
    {
        $this->loadModel('Users');
        $this->loadModel('Roles');
        

        $this->paginate = [
            'contain' => ['Roles'],
            'conditions' => ['Users.role_id' => 4],
            'limit'=> 3
        ];
    
        $users = $this->paginate($this->Users);


        $roles = $this->Users->Roles->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $this->set(compact('users', 'roles'));
        
    }

    public function alterarPermissao()
    {
        $this->loadModel('Users');

        $this->paginate = [
            'contain' => ['Roles'],
            'limit'=> 3
        ];
        $users = $this->paginate($this->Users);

        $roles = $this->Users->Roles->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $this->set(compact('users', 'roles'));
    }


    public function permissions($id = null) {

        $this->loadModel('Users');
        $this->loadModel('Roles');

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $user->role_id = $this->request->getData('roles_id');

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'descricao']);
        $this->set(compact('user', 'roles'));
    }


}

