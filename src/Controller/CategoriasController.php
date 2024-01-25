<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categorias Controller
 *
 * @property \App\Model\Table\CategoriasTable $Categorias
 *
 * @method \App\Model\Entity\Categoria[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriasController extends AppController
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

        $conditions = ['Categorias.is_trash' => 0,'Categorias.empresa_id' => $empresa_id];

        if ($this->request->getQuery('nome') != '') {
            $nome = $this->request->getQuery('nome');
            $conditions['LOWER(Categorias.nome) LIKE'] = '%' . strtolower($nome) . '%';
        }

        if ($this->request->getQuery('ativo') !== '') {
            $ativo = $this->request->getQuery('ativo');
        
            if ($ativo == 1) {
                $conditions['Categorias.is_active'] = 1;
            } else if ($ativo == 2) {
                $conditions['Categorias.is_trash'] = 1;
            }
        }
        

        $categorias = $this->paginate($this->Categorias, ['conditions' => $conditions, 'order' => ['Categorias.nome' => 'ASC']]);

        $this->set(compact('categorias'));
    }

    /**
     * View method
     *
     * @param string|null $id Categoria id.
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

        $categoria = $this->Categorias->get($id, [
            'contain' => ['Cargos'],
        ]);

        $this->set('categoria', $categoria);
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

        $categoria = $this->Categorias->newEntity();
        if ($this->request->is('post')) {
            $categoria['empresa_id'] = $usuario_logado['funcionarios'][0]['empresa']['id'];
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->getData());
            
            try{
                if ($this->Categorias->save($categoria)) {
                    $this->Flash->success(__('Categoria adicionada com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('A categoria não pôde ser adicionada. Por favor, tente novamente.'));
            }catch(\PDOException $e){
                $errorCode = $e->getCode();

            if ($errorCode == '23000') {
                $this->Flash->error(__('A categoria  não pode ser adicionada. Verifique se não está associado a outras entidades.'));
            } else {
                $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
            }
        }

            
        }
        $this->set(compact('categoria'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Categoria id.
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

        $categoria = $this->Categorias->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->getData());

            if ($categoria->is_active == 1) {
                $categoria->is_trash = 0;
            }
            
            try{
                if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('Categoria atualizada com sucesso.'));

                return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('A categoria não pôde ser atualizada. Por favor, tente novamente.'));
            } catch(\PDOException $e){
                $errorCode = $e->getCode();

                if ($errorCode == '23000') {
                    $this->Flash->error(__('A categoria não pode ser alterada. Verifique se não está associado a outras entidades.'));
                } else {
                    $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
                }
            
            }
            
            
        }
        $this->set(compact('categoria'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Categoria id.
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

            if($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            }  else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $this->request->allowMethod(['post', 'delete']);
        $categoria = $this->Categorias->get($id);

        // Define o campo "is_active" para 0 em vez de excluir
        $categoria->is_trash = 1;

        if ($this->Categorias->save($categoria)) {
            $this->Flash->success(__('Categoria desativada com sucesso.'));
        } else {
            $this->Flash->error(__('A categoria não pôde ser desativada. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
