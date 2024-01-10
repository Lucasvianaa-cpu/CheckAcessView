<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\FrozenTime;
use Cake\I18n\Time;

/**
 * Equipamentos Controller
 *
 * @property \App\Model\Table\EquipamentosTable $Equipamentos
 *
 * @method \App\Model\Entity\Equipamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EquipamentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->loadModel('Users');
        $this->loadModel('Funcionarios');

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

        $conditions = ['Equipamentos.is_trash' => 0];

        if ($this->request->getQuery('num_patrimonio') != '') {
            $num_patrimonio = $this->request->getQuery('num_patrimonio');
            $conditions['LOWER(Equipamentos.num_patrimonio) LIKE'] = '%' . strtolower($num_patrimonio) . '%';
        }

        if ($this->request->getQuery('descricao') != '') {
            $descricao = $this->request->getQuery('descricao');
            $conditions['LOWER(Equipamentos.descricao) LIKE'] = '%' . strtolower($descricao) . '%';
        }
        if ($this->request->getQuery('ativo') != '') {
            $ativo = $this->request->getQuery('ativo');

            if ($ativo == 1) {
                $conditions['Equipamentos.is_active'] = 1;
            } else if ($ativo == 2) {
                $conditions['Equipamentos.is_active'] = 0;
            } else if ($ativo == 3) {
            }
        }

        $this->paginate = [
            'contain' => ['Funcionarios.Users'],
        ];
        $equipamentos = $this->paginate($this->Equipamentos, ['conditions' => $conditions, 'order' => ['Equipamentos.descricao' => 'ASC']]);

        $this->set(compact('equipamentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Equipamento id.
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

        $equipamento = $this->Equipamentos->get($id, [
            'contain' => ['Funcionarios.Users'],
        ]);

        $this->set('equipamento', $equipamento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Users');
        $this->loadModel('Funcionarios');

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

        $equipamento = $this->Equipamentos->newEntity();

        if ($this->request->is('post')) {
            $equipamento = $this->Equipamentos->patchEntity($equipamento, $this->request->getData());

            try {
                if ($this->Equipamentos->save($equipamento)) {
                    $this->Flash->success(__('Equipamento adicionado com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('O equipamento não pôde ser adicionado. Por favor, tente novamente.'));
            } catch (\PDOException $e) {

                $errorCode = $e->getCode();

                if ($errorCode == '23000') {
                    $this->Flash->error(__('Equipamento não pode ser adicionado. Verifique se não está associado a outras entidades.'));
                } else {
                    $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
                }
            }
        }

        // Cria uma nova consulta para buscar os funcionários e incluir os usuários associados
        $func = $this->Funcionarios->find('all', [
            'limit' => 200,
            'conditions' => ['Funcionarios.is_active' => 1, 'Funcionarios.is_trash <>' => 1],
            'contain' => ['Users'] // Aqui você especifica as associações que deseja buscar
        ]);

        // No seu controller, onde você busca os funcionários ajustados
        $funcionarios = [];
        foreach ($func as $funcionario) {
            $funcionarios[$funcionario->id] = $funcionario->user->nome;
        }

        $this->set(compact('equipamento', 'funcionarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipamento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $this->loadModel('Users');
        $this->loadModel('Funcionarios');

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

        $equipamento = $this->Equipamentos->get($id, [
            'contain' => ['Funcionarios.Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipamento = $this->Equipamentos->patchEntity($equipamento, $this->request->getData());

            try {
                if ($this->Equipamentos->save($equipamento)) {
                    $this->Flash->success(__('Equipamento atualizado com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('O equipamento não pôde ser atualizado. Por favor, tente novamente.'));
            } catch (\PDOException $e) {
                $errorCode = $e->getCode();

                if ($errorCode == '23000') {
                    $this->Flash->error(__('O Equipamento não pode ser editado. Verifique se não está associado a outras entidades.'));
                } else {
                    $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
                }
            }
        }
        $func = $this->Funcionarios->find('all', [
            'limit' => 200,
            'contain' => ['Users'] // Aqui você especifica as associações que deseja buscar
        ]);

        // No seu controller, onde você busca os funcionários ajustados
        $funcionarios = [];
        foreach ($func as $funcionario) {
            $funcionarios[$funcionario->id] = $funcionario->user->nome;
        }

        $this->set(compact('equipamento', 'funcionarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

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
        $equipamento = $this->Equipamentos->get($id);

        // Define o campo "is_active" para 0 em vez de excluir
        $equipamento->is_active = 0;

        if ($this->Equipamentos->save($equipamento)) {
            $this->Flash->success(__('Equipamento desativado com sucesso.'));
        } else {
            $this->Flash->error(__('O equipamento não pôde ser desativado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
