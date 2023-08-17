<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Funcionarios Controller
 *
 * @property \App\Model\Table\FuncionariosTable $Funcionarios
 *
 * @method \App\Model\Entity\Funcionario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FuncionariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $this->loadModel('PlanosSaudes');

        $this->paginate = [
            'contain' => ['Cargos', 'Empresas', 'Users', 'PlanosSaudes'],
        ];
        $funcionarios = $this->paginate($this->Funcionarios);

        $this->set(compact('funcionarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Funcionario id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $funcionario = $this->Funcionarios->get($id, [
            'contain' => ['Cargos', 'PlanosSaudes', 'Empresas', 'Users', 'Plantoes', 'Equipamentos', 'HistoricosPontos', 'Holerites'],
        ]);

        $this->set('funcionario', $funcionario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $funcionario = $this->Funcionarios->newEntity();
        if ($this->request->is('post')) {
            $funcionario = $this->Funcionarios->patchEntity($funcionario, $this->request->getData());
            if ($this->Funcionarios->save($funcionario)) {
                $this->Flash->success(__('Funcionário salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O funcionário não pôde ser salvo. Por favor, tente novamente.'));
        }
        $cargos = $this->Funcionarios->Cargos->find('list', ['limit' => 200]);
        $planosSaudes = $this->Funcionarios->PlanosSaudes->find('list', ['limit' => 200]);
        $empresas = $this->Funcionarios->Empresas->find('list', ['limit' => 200]);
        $users = $this->Funcionarios->Users->find('list', ['limit' => 200]);
        $plantoes = $this->Funcionarios->Plantoes->find('list', ['limit' => 200]);
        $this->set(compact('funcionario', 'cargos', 'planosSaudes', 'empresas', 'users', 'plantoes'));
    }

    public function vincularUsuario($id = null)
    {
        $this->loadModel('Users');

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $funcionario = $this->Funcionarios->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Passo 1: Associar o usuário ao funcionário
            $funcionario = $this->Funcionarios->patchEntity($funcionario, $data);
            $funcionario->user = $user;  // Associa o objeto de usuário

            if ($this->Funcionarios->save($funcionario)) {
                $this->Flash->success(__('Funcionário vinculado.'));
                return $this->redirect(['controller' => 'Admin/Rh', 'action' => 'index']);
            }
            $this->Flash->error(__('O funcionário não pôde ser vinculado. Por favor, tente novamente.'));
        }

        $cargos = $this->Funcionarios->Cargos->find('list', ['limit' => 200]);
        $planosSaudes = $this->Funcionarios->PlanosSaudes->find('list', ['limit' => 200]);
        $empresas = $this->Funcionarios->Empresas->find('list', ['limit' => 200]);
        $plantoes = $this->Funcionarios->Plantoes->find('list', ['limit' => 200]);

        $this->set(compact('funcionario', 'cargos', 'planosSaudes', 'empresas', 'plantoes', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Funcionario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $funcionario = $this->Funcionarios->get($id, [
            'contain' => ['Plantoes'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $funcionario = $this->Funcionarios->patchEntity($funcionario, $this->request->getData());
            if ($this->Funcionarios->save($funcionario)) {
                $this->Flash->success(__('Funcionário atualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O funcionário não pôde ser atualizado. Por favor, tente novamente.'));
        }
        $cargos = $this->Funcionarios->Cargos->find('list', ['limit' => 200]);
        $planosSaudes = $this->Funcionarios->PlanosSaudes->find('list', ['limit' => 200]);
        $empresas = $this->Funcionarios->Empresas->find('list', ['limit' => 200]);
        $users = $this->Funcionarios->Users->find('list', ['limit' => 200]);
        $plantoes = $this->Funcionarios->Plantoes->find('list', ['limit' => 200]);
        $this->set(compact('funcionario', 'cargos', 'planosSaudes', 'empresas', 'users', 'plantoes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Funcionario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $funcionario = $this->Funcionarios->get($id);
        if ($this->Funcionarios->delete($funcionario)) {
            $this->Flash->success(__('Funcionário deletado.'));
        } else {
            $this->Flash->error(__('O funcionário não pôde ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
