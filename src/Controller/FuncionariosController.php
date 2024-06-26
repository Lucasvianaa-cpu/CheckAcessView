<?php

namespace App\Controller;

use App\Controller\AppController;

class FuncionariosController extends AppController
{

    public function index()
    {
        $this->loadModel('Users');

        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1 && $usuario_logado->role_id != 2) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $conditions = ['Funcionarios.is_trash' => 0, 'Funcionarios.empresa_id' => $empresa_id];

        if ($this->request->getQuery('nome') != '') {
            $nome = $this->request->getQuery('nome');
            $conditions['LOWER(Users.nome) LIKE'] = '%' . strtolower($nome) . '%';
        }

        if ($this->request->getQuery('cargo') != '') {
            $cargo = $this->request->getQuery('cargo');
            $conditions['LOWER(Cargos.nome) LIKE'] = '%' . strtolower($cargo) . '%';
        }

        if ($this->request->getQuery('ativo') != '') {
            $ativo = $this->request->getQuery('ativo');

            if ($ativo == 1) {
                $conditions['Funcionarios.is_active'] = 1;
            } else if ($ativo == 2) {
                $conditions['Funcionarios.is_active'] = 0;
            } else if ($ativo == 3) {
            }
        }

        $this->loadModel('PlanosSaudes');

        $this->paginate = [
            'contain' => ['Cargos', 'Empresas', 'Users', 'PlanosSaudes'],
        ];
        $funcionarios = $this->paginate($this->Funcionarios, ['conditions' => $conditions, 'order' => ['Users.nome' => 'ASC']]);
        

        $this->set(compact('funcionarios'));
    }

    public function view($id = null)
    {
        $this->loadModel('Funcionarios');
        $this->loadModel('Equipamentos');
        $this->loadModel('PlanosSaudes');

        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1 && $usuario_logado->role_id != 2) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $funcionario = $this->Funcionarios->get($id, [
            'contain' => ['Cargos', 'PlanosSaudes', 'Empresas', 'Users', 'Plantoes', 'Equipamentos', 'HistoricosPontos', 'Holerites', 'Equipamentos.Funcionarios'],
        ]);

        $this->paginate = [
            'contain' => ['Cargos', 'PlanosSaudes', 'Empresas', 'Users', 'Plantoes', 'Equipamentos', 'HistoricosPontos', 'Holerites', 'Equipamentos.Funcionarios'],
            'limit' => 5
        ];
        $funcionarios = $this->paginate($this->Funcionarios);


        $this->set('funcionario', $funcionario);
    }

    public function add()
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];
    
        if ($usuario_logado->role_id != 1 && $usuario_logado->role_id != 2) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));
    
            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }
    
        $funcionario = $this->Funcionarios->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
    
            // Certifique-se de que o campo salario está presente nos dados do formulário
            if (isset($data['salario'])) {
                // Remover caracteres não numéricos, exceto vírgula
                $data['salario'] = preg_replace('/[^0-9,]/', '', $data['salario']);
            
                // Substituir vírgula por ponto, se necessário
                $data['salario'] = str_replace(',', '.', $data['salario']);
            }
    
            $funcionario = $this->Funcionarios->patchEntity($funcionario, $data);
            
            try{
                if ($this->Funcionarios->save($funcionario)) {
                    $this->Flash->success(__('Funcionário adicionado com sucesso.'));
        
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('O funcionário não pôde ser adicionado. Por favor, tente novamente.'));
            } catch(\PDOException $e) {
                $errorCode = $e->getCode();

                if ($errorCode == '23000') {
                    $this->Flash->error(('Este usuário já está registrado como funcionário.'));
                } else {
                    $this->Flash->error(('Erro desconhecido: ') . $e->getMessage());
                }
            }
            
        }
        
        $cargos = $this->Funcionarios->Cargos->find('list', ['limit' => 200]);
        $planosSaudes = $this->Funcionarios->PlanosSaudes->find('list', ['limit' => 200, 'conditions' => ['is_active' => 1, 'is_trash <>' => 1]]);
        $empresas = $this->Funcionarios->Empresas->find('list', ['limit' => 200, 'conditions' => ['is_active' => 1, 'is_trash <>' => 1]]);
        $users = $this->Funcionarios->Users->find('list', ['limit' => 200, 'conditions' => ['is_active' => 1, 'is_trash <>' => 1]]);
        $plantoes = $this->Funcionarios->Plantoes->find('list', ['limit' => 200]);
        $this->set(compact('funcionario', 'cargos', 'planosSaudes', 'empresas', 'users', 'plantoes'));
    }
    


    public function vincularUsuario($id = null)
    {
        $this->loadModel('Users');
        $this->loadModel('Roles');
        $this->loadModel('Funcionarios');

        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1 && $usuario_logado->role_id != 2) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $user = $this->Users->get($id, [
            'contain' => ['Roles'],
        ]);

        $funcionario_role = $this->Users->get($id, [
            'contain' => ['Roles'],
        ]);

        // Inicializa a variável $funcionario
        $funcionario = $this->Funcionarios->newEntity();
        $data = $this->request->getData();

        if ($this->request->is('post')) {
            $permissao = $_POST['permissao'];
            $data2 = [
                'role_id' => $permissao
            ];

            $funcionario_role = $this->Users->patchEntity($funcionario_role, $data2);
            $this->Users->save($funcionario_role);

            // Associar o usuário ao funcionário
            $funcionario = $this->Funcionarios->patchEntity($funcionario, $data);
            $funcionario->user = $user; 

            if ($this->Funcionarios->save($funcionario)) {
                $this->Flash->success(__('Funcionário vinculado com sucesso.'));
                return $this->redirect(['controller' => 'Rh', 'action' => 'index']);
            } else {
                $this->Flash->error(__('O funcionário não pôde ser vinculado. Por favor, tente novamente.'));
            }
        }

        $cargos = $this->Funcionarios->Cargos->find('list', ['limit' => 200, 'conditions' => ['Cargos.empresa_id' => $empresa_id]]);
        
        $roles = $this->Roles->find('list');
        $planosSaudes = $this->Funcionarios->PlanosSaudes->find('list', ['limit' => 200, 'conditions' => ['PlanosSaudes.empresa_id' => $empresa_id]]);
        $is_trash = 0;
        $empresas = $this->Funcionarios->Empresas->find('list', [
            'limit' => 200,
            'conditions' => ['is_trash' => $is_trash],
        ]);

        $this->set(compact('funcionario', 'cargos', 'planosSaudes', 'empresas', 'user', 'roles'));
    }


   
    public function edit($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1 && $usuario_logado->role_id != 2) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $funcionario = $this->Funcionarios->get($id, [
            'contain' => ['Plantoes'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
    
            // Certifique-se de que o campo salario está presente nos dados do formulário
            if (isset($data['salario'])) {
                // Remover caracteres não numéricos, exceto vírgula
                $data['salario'] = preg_replace('/[^0-9,]/', '', $data['salario']);
            
                // Substituir vírgula por ponto, se necessário
                $data['salario'] = str_replace(',', '.', $data['salario']);
            }
    
            $funcionario = $this->Funcionarios->patchEntity($funcionario, $data);

           

            if ($this->Funcionarios->save($funcionario)) {
                $this->Flash->success(__('Funcionário atualizado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O funcionário não pôde ser atualizado. Por favor, tente novamente.'));
        }
        $cargos = $this->Funcionarios->Cargos->find('list', ['limit' => 200]);
        $planosSaudes = $this->Funcionarios->PlanosSaudes->find('list', ['limit' => 200]);
        $is_trash = 0;
        $empresas = $this->Funcionarios->Empresas->find('list', [
            'limit' => 200,
            'conditions' => ['is_trash' => $is_trash],
        ]);
        $users = $this->Funcionarios->Users->find('list', ['limit' => 200]);
        
        $this->set(compact('funcionario', 'cargos', 'planosSaudes', 'empresas', 'users'));
    }

    public function delete($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1 && $usuario_logado->role_id != 2) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $this->request->allowMethod(['post', 'delete']);
        $funcionario = $this->Funcionarios->get($id);

        // Define o campo "is_active" para 0 em vez de excluir
        $funcionario->is_active = 0;

        if ($this->Funcionarios->save($funcionario)) {
            $this->Flash->success(__('Funcionário desativado com sucesso.'));
        } else {
            $this->Flash->error(__('O Funcionário não pôde ser desativado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getSalario()
    {
        $this->autoRender = false;
        $funcionarioId = $this->request->getQuery('funcionario_id');
        $salario = $this->Funcionarios->getSalarioPorId($funcionarioId);

        $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode(['salario' => $salario]));
    }
}
