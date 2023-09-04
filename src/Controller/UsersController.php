<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    use MailerAwareTrait;

    public function initialize()
    {
        parent::initialize();

        //! Ação de registro permitida sem autenticação
        $this->Auth->allow(['adicionar']);
        $this->Auth->allow(['esqueciSenha']);
        $this->Auth->allow(['RedefinirSenha']);
        $this->loadComponent('ListaFuncionarios');

        $this->current_user = $this->Auth->user();

    }

    public function index()
    {

        $conditions = ['Users.is_trash' => 0];

        if ($this->request->getQuery('nome') != '') {
            $nome = $this->request->getQuery('nome');
            $conditions['LOWER(Users.nome) LIKE'] = '%' . strtolower($nome) . '%';
        } 

        if ($this->request->getQuery('cpf') != '') {
            $cpf = $this->request->getQuery('cpf');
            $conditions['LOWER(Users.cpf) LIKE'] = '%' . strtolower($cpf) . '%';
        }

        if ($this->request->getQuery('ativo') != '') {
            $ativo = $this->request->getQuery('ativo');

            if ($ativo == 1) {
                $conditions['Users.is_active'] = 1;
            } else if ($ativo == 2) {
                $conditions['Users.is_active'] = 0;
            } else if ($ativo == 3) {
                
            }
        }
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate($this->Users,['conditions' => $conditions]);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Veiculos'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function adicionar()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 4;
            if ($this->Users->save($user)) {
                $this->getMailer('User')->send('welcome', [$user]);
                $this->Flash->success(__('Usuário adicionado com sucesso.'));

                $user = $this->Auth->identify();
                if($user){
                    $user = $this->Users->get($user['id'], [
                        'contain' => ['Funcionarios.Empresas']
                    ]);
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
                }
            }
            $this->Flash->error(__('O usuário não pôde ser adicionado. Por favor, tente novamente.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário atualizado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O usuário não pôde ser atualizado. Por favor, tente novamente.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

        // Define o campo "is_active" para 0 em vez de excluir
        $user->is_active = 0;

        if ($this->Users->save($user)) {
            $this->Flash->success(__('Usuário desativado com sucesso.'));
        } else {
            $this->Flash->error(__('O usuário não pôde ser desativado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        $this->loadModel('Empresas');
    
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            
            if ($user) {
                // Carregar o usuário junto com os funcionários e empresas associados
                $user = $this->Users->get($user['id'], [
                    'contain' => ['Funcionarios.Empresas']
                ]);
                $this->Auth->setUser($user);
                
                // Se for ROLE 4, redirecionar para a página inicial
                if ($user['role_id'] == 4) {
                    return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
                } else {
                    // Verificar se há funcionários associados
                    if (!empty($user['funcionarios'])) {
                        // Recuperar a empresa associada ao primeiro funcionário do usuário autenticado
                        $empresa_id = $user['funcionarios'][0]['empresa']['id'];
                        // Redirecionar para a dashboard passando o ID da empresa buscada
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
                    } else {
                        // Caso não haja funcionários associados, redirecionar para uma página de erro ou página inicial
                        return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'no_funcionarios']);
                    }
                }
            } else {
                $this->Flash->error(__('E-mail ou senha incorretas! Por favor, tente novamente.'));
            }
           
        }
    }

    public function editarPerfil ($id = null) {
        $this->loadModel('Estados');
        $this->loadModel('Cidades');
        $this->loadModel('Enderecos');
        $this->loadModel('Categorias');
        $this->loadModel('Cargos');
        $this->loadModel('Veiculos');

        $user = $this->Users->get($id, [
            'contain' => ['Enderecos'],
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $endereco = $user->enderecos ? $user->enderecos[0] : $this->Enderecos->newEntity();
        
            $endereco->rua = $this->request->getData('rua');
            $endereco->numero = $this->request->getData('numero');
            $endereco->bairro = $this->request->getData('bairro');
            $endereco->cep = $this->request->getData('cep');
            $endereco->user_id = $this->Auth->user('id');
            $endereco->cidade_id = $this->request->getData('cidade_id');
        
            
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if (!empty($this->request->getData()['caminho_foto']['name'])) {
                $file = $this->request->getData()['caminho_foto'];
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($ext, $arr_ext)) {
                    $numeros = rand();
                    $filename = $user->nome . '-' . $user->sobrenome . '-' . $numeros . '-perfil' . '.' . $ext;
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/fotos/' . $filename);
                    $user->caminho_foto = 'fotos/' . $filename;
                } else {
                    $this->Flash->error(__('Only image files (JPG, JPEG, GIF, PNG) are allowed.'));
                }
            }
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Perfil atualizado com sucesso.'));

                return $this->redirect($this->referer());

            }
            $this->Flash->error(__('O perfil não pôde ser atualizado. Por favor, tente novamente.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $estados = $this->Estados->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $cidades = $this->Cidades->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $endereco_perfil = $this->Enderecos->find('all', ['contain' => ['Cidades.Estados'], 'order' => ['Enderecos.id' => 'DESC'], 'limit' => 1])->where(['Enderecos.user_id' => $this->Auth->User('id')])->first();
        $categorias = $this->Categorias->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $cargos = $this->Cargos->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $veiculos = $this->Veiculos->find('list', ['keyField' => 'id', 'valueField' => 'nome']);

        $this->set(compact('user', 'roles', 'estados', 'cidades', 'endereco_perfil', 'categorias', 'cargos', 'veiculos'));
        
    }

    public function visualizarPerfil ($id = null){

        $this->loadModel('Cargos');
        
        $user = $this->Users->get($id, [
            'contain' => ['Funcionarios.Cargos.Categorias']
        ]);

        $cargo = $user->funcionarios[0]->cargo;
        $categoria = $cargo->categoria;

        $cargos = $this->Cargos->find('list', ['keyField' => 'id', 'valueField' => 'nome']);

        $this->set(compact('user', 'cargo', 'cargos', 'categoria'));
    }

    //--Alterar

    public function esqueciSenha()
    {
        $this->loadModel('Users');
        $user = $this->Users->newEntity();
        if (!empty($this->request->data)) {

            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($user = $this->Users->findByEmail($this->request->data['email'])->toArray()) {
                    $this->getMailer('User')->send('recovery', [$user]);
                    $this->Flash->success(__('Enviamos um e-mail de recuperação. Acesse sua caixa de mensagens e clique no link de recuperação.'));
                } else {
                    $this->Flash->error(__('Este e-mail não possui cadastro.'));
                }
            }
        }
        $this->set(compact('user'));
    }
    

    

    public function dashboard ($id = null){
        
        $this->loadModel('Empresas');
        $this->loadModel('Equipamentos');
        $this->loadModel('Categorias');
        $this->loadModel('Cargos');
        $this->loadModel('Funcionarios');

        $empresa = $this->Empresas->get($id, [
            'contain' => [],
        ]);

        $quantidadeEquipamentos = $this->Equipamentos->find()->count();
        $quantidadeCategorias= $this->Categorias->find()->count();
        $quantidadeCargos = $this->Cargos->find()->count();
        $quantidadeFuncionarios = $this->Funcionarios->find()->count();

        $funcionarios_grafico = $this->ListaFuncionarios->ListaFuncionariosGrafico($id);

        
        if($this->current_user['role_id'] == 2){
            $this->paginate = [
                'contain' => ['Roles'],
                'conditions' => ['Users.role_id' => 4],
                'limit'=> 3
            ];
        } else {
            $this->paginate = [
                'contain' => ['Roles'],
                'limit'=> 3
            ];
        }
        
        
        $users = $this->paginate($this->Users);
        $roles = $this->Users->Roles->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $this->set(compact('users','roles', 'empresa', 'funcionarios_grafico', 'quantidadeEquipamentos', 'quantidadeCategorias', 'quantidadeCargos', 'quantidadeFuncionarios'));
    }
 
    public function sair () {
        return $this->redirect($this->Auth->logout());
    }

    public function redefinirSenha()
    {
        $q_hash = $this->request->query('h');
        $q_email = $this->request->query('email');

        $user = $this->Users->newEntity();
        if ($this->request->is(['post', 'put'])) {
            $user = $this->Users->get($this->request->data['id']);
            $user = $this->Users->patchEntity($user, $this->request->data);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Senha alterada com sucesso!'));
                return $this->redirect(['action' => 'login']);
            }
            
            $this->Flash->error(__('Não foi possivel alterar sua senha, tente novamente!'));
        } else {
            if ($user = $this->Users->findByEmail($q_email)->toArray()) {
                $hash = substr($user[0]['password'], 0, 25);
                if ($hash == $q_hash) {
                    $msg = 'Alterar senha do email: ' . $q_email;
                    $this->Flash->set($msg);
                } else {
                    $msg = 'Você não tem permissão para alterar essa senha!';
                    $this->Flash->set($msg);
                    $this->redirect(array('action' => 'rememberPassword'));
                }
            }
        }
        $this->set('id', $user[0]['id']);
        $this->set(compact('user'));
    }
}
