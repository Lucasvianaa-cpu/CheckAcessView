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

    public function login () {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                //Se for ROLE 4 fazer isso:
                 return $this->redirect(['controller' => 'Pages' ,'action' => 'display', 'home']);
                //se não... fazer isso mas com \users
                //return $this->redirect(['controller' => 'UsersController' ,'action' => 'index']);
            }
        }
    }

    public function editarPerfil ($id = null) {
        $this->loadModel('Estados');
        $this->loadModel('Cidades');
        $this->loadModel('Enderecos');

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

        $this->set(compact('user', 'roles', 'estados', 'cidades', 'endereco_perfil'));
        
    }

    public function visualizarPerfil ($id = null){
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('user'));
    }
 
    public function sair () {
        return $this->redirect($this->Auth->logout());
    }
}
