<?php

namespace App\Controller;

use App\Controller\AppController;

class EstadosController extends AppController
{

    public function index()
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $conditions = [];

        if ($this->request->getQuery('sigla') != '') {
            $sigla = $this->request->getQuery('sigla');
            $conditions['LOWER(Estados.sigla) LIKE'] = '%' . strtolower($sigla) . '%';
        }

        $estados = $this->paginate($this->Estados, ['conditions' => $conditions, 'order' => ['Estados.nome' => 'ASC']]);

        $this->set(compact('estados'));
    }


    public function view($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $estado = $this->Estados->get($id, [
            'contain' => ['Cidades'],
        ]);

        $this->set('estado', $estado);
    }


    public function add()
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $estado = $this->Estados->newEntity();
        if ($this->request->is('post')) {
            $estado = $this->Estados->patchEntity($estado, $this->request->getData());
            try{
                if ($this->Estados->save($estado)) {
                    $this->Flash->success(__('Estado adicionado com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('O estado não pôde ser adicionado. Por favor, tente novamente.'));
            } catch(\PDOException $e){
                $errorCode = $e->getCode();

                if ($errorCode == '23000') {
                    $this->Flash->error(__('Erro: O estado não pode ser adicionado. Verifique se não está associado a outras entidades.'));
                } else {
                    $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
                }
            
            }
        }
        $this->set(compact('estado'));
    }


    public function edit($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $estado = $this->Estados->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estado = $this->Estados->patchEntity($estado, $this->request->getData());
        try{
            if ($this->Estados->save($estado)) {
                $this->Flash->success(__('Estado atualizado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            } else{
                $this->Flash->error(__('O estado não pôde ser atualizado. Por favor, tente novamente.'));
            }
            
        } catch (\PDOException $e) {
            $errorCode = $e->getCode();

            if ($errorCode == '23000') {
                $this->Flash->error(__('Erro: O estado não pode ser atualizado. Verifique se não está associado a outras entidades.'));
            } else {
                $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
            }
        }
        }
           
        
        $this->set(compact('estado'));
    }


    public function delete($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $this->request->allowMethod(['post', 'delete']);
        try {
            $estado = $this->Estados->get($id);
            if ($this->Estados->delete($estado)) {
                $this->Flash->success(__('Estado deletado com sucesso.'));
            } else {
                $this->Flash->error(__('O estado não pode ser deletado. Por favor, tente novamente.'));
            }
        } catch (\PDOException $e) {
            $errorCode = $e->getCode();

            if ($errorCode == '23000') {
                $this->Flash->error(__('Erro: O estado não pode ser deletado. Verifique se não está associado a outras entidades.'));
            } else {
                $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
            }
        }

        return $this->redirect(['action' => 'index']);
    }
}
