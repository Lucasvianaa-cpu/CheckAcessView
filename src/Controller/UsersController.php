<?php
namespace App\Controller;

use App\Controller\AppController;

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

    public function initialize()
    {
        parent::initialize();

        //! Ação de registro permitida sem autenticação
        $this->Auth->allow(['adicionar']);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate($this->Users);

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
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
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
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
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
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login ($id = 1) {

            //verificar como trazer id da empresa de forma dinamica
            $this->loadModel('Empresas');

            $empresa = $this->Empresas->get($id, [
                'contain' => [],
            ]);
            
            if ($this->request->is('post')) {
                $user = $this->Auth->identify();
    
                if ($user) {
                    $this->Auth->setUser($user);
                 //debug($user);exit;
                    //Se for ROLE 4 fazer isso:
                    if($user['role_id'] == 4){
                        return $this->redirect(['controller' => 'Pages' ,'action' => 'display', 'home']);
                    }
                        
                    else{
                        //buscar código da empresa
                        return $this->redirect(['controller' => 'Users' ,'action' => 'dashboard', $id]);
                    }        
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
        
            if ($this->Enderecos->save($endereco)) {
                $this->Flash->success(__('Foi salvo o seu Endereço'));
            }

            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect($this->referer());

            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
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
        
        $this->paginate = [
            'contain' => ['Roles'],
            'limit'=> 3
        ];
        
        $users = $this->paginate($this->Users);
        $roles = $this->Users->Roles->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $this->set(compact('users','roles', 'empresa', 'quantidadeEquipamentos', 'quantidadeCategorias', 'quantidadeCargos', 'quantidadeFuncionarios'));
    }
 
    public function sair () {
        return $this->redirect($this->Auth->logout());
    }
}
