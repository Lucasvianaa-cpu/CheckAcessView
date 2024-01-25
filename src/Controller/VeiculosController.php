<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Veiculos Controller
 *
 * @property \App\Model\Table\VeiculosTable $Veiculos
 *
 * @method \App\Model\Entity\Veiculo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VeiculosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
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

        $conditions = ['Veiculos.is_trash' => 0,'Veiculos.empresa_id' => $empresa_id];

        if ($this->request->getQuery('modelo') != '') {
            $modelo = $this->request->getQuery('modelo');
            $conditions['LOWER(Veiculos.modelo) LIKE'] = '%' . strtolower($modelo) . '%';
        }

        if ($this->request->getQuery('placa') != '') {
            $placa = $this->request->getQuery('placa');
            $conditions['LOWER(Veiculos.placa) LIKE'] = '%' . strtolower($placa) . '%';
        }

        if ($this->request->getQuery('ativo') != '') {
            $ativo = $this->request->getQuery('ativo');

            if ($ativo == 1) {
                $conditions['Veiculos.is_active'] = 1;
            } else if ($ativo == 2) {
                $conditions['Veiculos.is_active'] = 0;
            } else if ($ativo == 3) {
            }
        }

        $this->paginate = [
            'contain' => ['Users'],
        ];
        $veiculos = $this->paginate($this->Veiculos, ['conditions' => $conditions, 'order' => ['Veiculos.modelo' => 'ASC']]);

        $this->set(compact('veiculos'));
    }

    /**
     * View method
     *
     * @param string|null $id Veiculo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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

        $veiculo = $this->Veiculos->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('veiculo', $veiculo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
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

        $veiculo = $this->Veiculos->newEntity();
        if ($this->request->is('post')) {
            $veiculo['empresa_id'] = $usuario_logado['funcionarios'][0]['empresa']['id'];

            $veiculo = $this->Veiculos->patchEntity($veiculo, $this->request->getData());

            try {
                if ($this->Veiculos->save($veiculo)) {
                    $this->Flash->success(__('Veículo adicionado com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('O veículo não pôde ser adicionado. Por favor, tente novamente.'));
            } catch (\PDOException $e) {
                $errorCode = $e->getCode();

                if ($errorCode == '23000') {
                    $this->Flash->error(__('Veículo não pode ser adicionado. Verifique se não está associado a outras entidades.'));
                } else {
                    $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
                }
            }
        }


        $users = $this->Veiculos->Users->find('list', ['keyField' => 'id', 'valueField' => 'nome', 'conditions' => ['is_active' => 1, 'is_trash <>' => 1]]);
        $this->set(compact('veiculo', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Veiculo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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

        $veiculo = $this->Veiculos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $veiculo = $this->Veiculos->patchEntity($veiculo, $this->request->getData());
            try{
                 if ($this->Veiculos->save($veiculo)) {
                    $this->Flash->success(__('Veículo atualizado com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                    $this->Flash->error(__('O veículo não pôde ser atualizado. Por favor, tente novamente.'));
                }catch(\PDOException $e){
                    $errorCode = $e->getCode();

                    if ($errorCode == '23000') {
                        $this->Flash->error(__('Veículo não pode ser atualizado. Verifique se não está associado a outras entidades.'));
                    } else {
                        $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
                    }
                }
        
                }
            
           
        $users = $this->Veiculos->Users->find('list', ['limit' => 200]);
        $this->set(compact('veiculo', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Veiculo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    /**Função de Deletar, mas ao invés de deletar irá inativar */
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
        $veiculo = $this->Veiculos->get($id);

        // Define o campo "is_active" para 0 em vez de excluir
        $veiculo->is_active = 0;

        if ($this->Veiculos->save($veiculo)) {
            $this->Flash->success(__('Veículo desativado com sucesso.'));
        } else {
            $this->Flash->error(__('O veículo não pôde ser desativado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
