<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Holerites Controller
 *
 * @property \App\Model\Table\HoleritesTable $Holerites
 *
 * @method \App\Model\Entity\Holerite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HoleritesController extends AppController
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

        if ($usuario_logado->role_id != 2) {
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
            $conditions['LOWER(Users.nome) LIKE'] = '%' . strtolower($nome) . '%';
        }

        if ($this->request->getQuery('mes') != '') {
            $mes = $this->request->getQuery('mes');
            $conditions['LOWER(Holerites.mes) LIKE'] = '%' . strtolower($mes) . '%';
        }

        $this->paginate = [
            'contain' => ['Funcionarios.Users'],
        ];
        
        $holerites = $this->paginate($this->Holerites, ['conditions' => $conditions]);

        $this->set(compact('holerites'));
    }

    public function meuHolerite()
    {

        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 2 && $usuario_logado->role_id != 3) {
            $this->Flash->error(__('Você não possui holerites!'));

            if($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            }  else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        // Acessa o ID do usuário atual
        $currentUserId = $this->Auth->user('id');
        $conditions = [];

        if ($this->request->getQuery('mes') != '') {
            $mes = $this->request->getQuery('mes');
            $conditions['LOWER(Holerites.mes) LIKE'] = '%' . strtolower($mes) . '%';
        }
        

        $this->paginate = [
            'contain' => [
                'Funcionarios.Users' => function ($query) use ($currentUserId) {
                    return $query->where(['Users.id' => $currentUserId]);
                }
            ]
        ];

        $holerites = $this->paginate($this->Holerites,['conditions' => $conditions]);

        $this->set(compact('holerites'));
    }

    /**
     * View method
     *
     * @param string|null $id Holerite id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $this->loadModel('Users');

        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 2 && $usuario_logado->role_id != 3) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            }  else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $usuario_logado = $this->Auth->user();


        $holerite = $this->Holerites->get($id, [
            'contain' => ['Funcionarios.Users', 'Funcionarios.Cargos', 'Funcionarios.Empresas'],
        ]);

        if ($usuario_logado->role_id != 2) {
            if ($usuario_logado['funcionarios'][0]['id'] != $holerite->funcionario->id) {
                $this->Flash->error(__('Usuário não confere ao logado'));
                return $this->redirect(['controller' => 'Holerites', 'action' => 'meuHolerite']);

            }
        }

        $this->set('holerite', $holerite);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Funcionarios');
        $this->loadModel('Users');

        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 2) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            }  else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $holerite = $this->Holerites->newEntity();
        if ($this->request->is('post')) {
            $holerite = $this->Holerites->patchEntity($holerite, $this->request->getData());
            if ($this->Holerites->save($holerite)) {
                $this->Flash->success(__('Holerite adicionado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }

            debug($holerite); exit;
            $this->Flash->error(__('O holerite não pôde ser adicionado. Por favor, tente novamente.'));
        }
        $funcionarios = $this->Funcionarios->find('all', [
            'limit' => 200,
            'contain' => ['Users']
        ]);


        $funcionarios_list = [];
        foreach ($funcionarios as $funcionario)
        {
            if($funcionario->user->role_id != 1 && $funcionario->user->role_id  != 4) {
                $funcionarios_list[$funcionario->id] = $funcionario->user->nome;
            }
        }
        

        $this->set(compact('holerite', 'funcionarios_list'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Holerite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Funcionarios');
        $this->loadModel('Users');

        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 2) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            }  else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $holerite = $this->Holerites->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $holerite = $this->Holerites->patchEntity($holerite, $this->request->getData());
            if ($this->Holerites->save($holerite)) {
                $this->Flash->success(__('Holerite atualizado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O holerite não pôde ser atualizado. Por favor, tente novamente.'));
        }
        $funcionarios = $this->Holerites->Funcionarios->find('all', [
            'limit' => 200,
            'contain' => ['Users']
        ]);
        
        $funcionarios_list = [];
        foreach ($funcionarios as $funcionario)
        {
            $funcionarios_list[$funcionario->id] = $funcionario->user->nome;
        }
        $this->set(compact('holerite', 'funcionarios_list'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Holerite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 2) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            }  else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $this->request->allowMethod(['post', 'delete']);
        $holerite = $this->Holerites->get($id);
        if ($this->Holerites->delete($holerite)) {
            $this->Flash->success(__('Holerite deletado com sucesso.'));
        } else {
            $this->Flash->error(__('O holerite não pôde ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
