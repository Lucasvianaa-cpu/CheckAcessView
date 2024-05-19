<?php
namespace App\Controller;

use App\Controller\AppController;


class CargosController extends AppController
{
    
    public function index()
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            }  else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $conditions = ['Cargos.empresa_id' => $empresa_id];

        if ($this->request->getQuery('nome') != '') {
            $nome = $this->request->getQuery('nome');
            $conditions['LOWER(Cargos.nome) LIKE'] = '%' . strtolower($nome) . '%';
        }

        $this->paginate = [
            'contain' => ['Categorias'],
        ];
        $cargos = $this->paginate($this->Cargos, ['conditions' => $conditions, 'order' => ['Cargos.nome' => 'ASC']]);

        $this->set(compact('cargos'));
    }

    
    public function view($id = null)
    {
        $this->loadModel('Users');

        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            }  else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $cargo = $this->Cargos->get($id, [
            'contain' => ['Categorias', 'Funcionarios.Empresas', 'Funcionarios.Users'],
        ]);

        $this->paginate = [
            'contain' => ['Categorias', 'Funcionarios.Empresas', 'Funcionarios.Users'],
            'limit' => 3
        ];
        $cargos = $this->paginate($this->Cargos);

        $this->set('cargo', $cargo);
    }

   
    public function add()
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            }  else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $cargo = $this->Cargos->newEntity();
        if ($this->request->is('post')) {
           
            $cargo = $this->Cargos->patchEntity($cargo, $this->request->getData());
            $cargo['empresa_id'] = $usuario_logado['funcionarios'][0]['empresa']['id'];
        
            if ($this->Cargos->save($cargo)) {
                $this->Flash->success(__('Cargo adicionado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O cargo não pôde ser adicionado. Por favor, tente novamente.'));
        }
        $categorias = $this->Cargos->Categorias->find('list', ['keyField' => 'id', 'valueField' => 'nome', 'conditions' => ['is_active' => 1, 'is_trash <>' => 1, 'Categorias.empresa_id' => $empresa_id]]);
        $this->set(compact('cargo', 'categorias'));
    }

   
    public function edit($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            }  else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $cargo = $this->Cargos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cargo = $this->Cargos->patchEntity($cargo, $this->request->getData());
            if ($this->Cargos->save($cargo)) {
                $this->Flash->success(__('Cargo atualizado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O cargo não pôde ser atualizado. Por favor, tente novamente.'));
        }
        $categorias = $this->Cargos->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('cargo', 'categorias'));
    }

   
    public function delete($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            }  else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $this->request->allowMethod(['post', 'delete']);
        $cargo = $this->Cargos->get($id);
        if ($this->Cargos->delete($cargo)) {
            $this->Flash->success(__('Cargo deletado com sucesso.'));
        } else {
            $this->Flash->error(__('O cargo não pôde ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
