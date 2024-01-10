<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cidades Controller
 *
 * @property \App\Model\Table\CidadesTable $Cidades
 *
 * @method \App\Model\Entity\Cidade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CidadesController extends AppController
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

            if($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            }  else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $conditions = [];

        if ($this->request->getQuery('nome') != '') {
            $nome = $this->request->getQuery('nome');
            $conditions['LOWER(Cidades.nome) LIKE'] = '%' . strtolower($nome) . '%';
        }

        $this->paginate = [
            'contain' => ['Estados'],
        ];
        $cidades = $this->paginate($this->Cidades, ['conditions' => $conditions]);

        $this->set(compact('cidades'));
    }

    /**
     * View method
     *
     * @param string|null $id Cidade id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
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

        $cidade = $this->Cidades->get($id, [
            'contain' => ['Estados', 'Enderecos', 'Enderecos.Users'],
        ]);

        $this->set('cidade', $cidade);
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

            if($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            }  else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $cidade = $this->Cidades->newEntity();
        if ($this->request->is('post')) {
            $cidade = $this->Cidades->patchEntity($cidade, $this->request->getData());
            try {
                if ($this->Cidades->save($cidade)) {
                    $this->Flash->success(__('Cidade adicionada com sucesso.'));
    
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('A cidade não pôde ser adicionada. Por favor, tente novamente.'));
                }
            } catch (\PDOException $e) {
                $errorCode = $e->getCode();
    
                if ($errorCode == '23000') {
                    $this->Flash->error(__('A cidade já existe.'));
                } else {
                    $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
                }
            }
        }
        $estados = $this->Cidades->Estados->find('list', ['limit' => 200]);
        $this->set(compact('cidade', 'estados'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cidade id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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

        $cidade = $this->Cidades->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cidade = $this->Cidades->patchEntity($cidade, $this->request->getData());
            try {
                if ($this->Cidades->save($cidade)) {
                    $this->Flash->success(__('Cidade atualizada com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                     $this->Flash->error(__('A cidade não pôde ser atualizada. Por favor, tente novamente.'));
                }
            } catch(\PDOException $e){

                $errorCode = $e->getCode();
                
                     if ($errorCode == '23000') {
                         $this->Flash->error(__(' Não pode ser alterado. Verifique se não está associado a outras entidades.'));
                    } else {
                         $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
                        }
                    }       
        }
        $estados = $this->Cidades->Estados->find('list', ['limit' => 200]);
        $this->set(compact('cidade', 'estados'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cidade id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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
        $cidade = $this->Cidades->get($id);
        if ($this->Cidades->delete($cidade)) {
            $this->Flash->success(__('Cidade deletada com sucesso.'));
        } else {
            $this->Flash->error(__('A cidade não pôde ser deletada. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
