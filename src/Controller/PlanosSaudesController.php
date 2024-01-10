<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * PlanosSaudes Controller
 *
 * @property \App\Model\Table\PlanosSaudesTable $PlanosSaudes
 *
 * @method \App\Model\Entity\PlanosSaude[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlanosSaudesController extends AppController
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

        $conditions = ['PlanosSaudes.is_trash' => 0];

        if ($this->request->getQuery('nome') != '') {
            $nome = $this->request->getQuery('nome');
            $conditions['LOWER(PlanosSaudes.nome) LIKE'] = '%' . strtolower($nome) . '%';
        }

        if ($this->request->getQuery('ativo') != '') {
            $ativo = $this->request->getQuery('ativo');

            if ($ativo == 1) {
                $conditions['PlanosSaudes.is_active'] = 1;
            } else if ($ativo == 2) {
                $conditions['PlanosSaudes.is_active'] = 0;
            } else if ($ativo == 3) {
            }
        }
        $planosSaudes = $this->paginate($this->PlanosSaudes, ['conditions' => $conditions]);

        $this->set(compact('planosSaudes'));
    }

    /**
     * View method
     *
     * @param string|null $id Planos Saude id.
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

        $planosSaude = $this->PlanosSaudes->get($id, [
            'contain' => [],
        ]);

        $this->set('planosSaude', $planosSaude);
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

        $planosSaude = $this->PlanosSaudes->newEntity();
        if ($this->request->is('post')) {
            $planosSaude = $this->PlanosSaudes->patchEntity($planosSaude, $this->request->getData());

            try {
                if ($this->PlanosSaudes->save($planosSaude)) {
                    $this->Flash->success(__('Plano de saúde adicionado com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('O plano de saúde não pôde ser adicionado. Por favor, tente novamente.'));
            } catch (\PDOException $e) {
                $errorCode = $e->getCode();

                if ($errorCode == '23000') {
                    $this->Flash->error(__('Plano não pode ser adicionado. Verifique se não está associado a outras entidades.'));
                } else {
                    $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
                }
            }
        }

        $this->set(compact('planosSaude'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Planos Saude id.
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

        $planosSaude = $this->PlanosSaudes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $planosSaude = $this->PlanosSaudes->patchEntity($planosSaude, $this->request->getData());

            try {
                if ($this->PlanosSaudes->save($planosSaude)) {
                    $this->Flash->success(__('Plano de saúde atualizado com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('O plano de saúde não pôde ser atualizado. Por favor, tente novamente.'));
            } catch (\PDOException $e) {
                $errorCode = $e->getCode();

                if ($errorCode == '23000') {
                    $this->Flash->error(__('Plano não pode ser alterado. Verifique se não está associado a outras entidades.'));
                } else {
                    $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
                }
            }
        }

        $this->set(compact('planosSaude'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Planos Saude id.
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
        $planosSaude = $this->PlanosSaudes->get($id);

        // Define o campo "is_active" para 0 em vez de excluir
        $planosSaude->is_active = 0;

        if ($this->PlanosSaudes->save($planosSaude)) {
            $this->Flash->success(__('Plano de Saúde desativado com sucesso.'));
        } else {
            $this->Flash->error(__('O Plano de Saúde não pôde ser desativado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
