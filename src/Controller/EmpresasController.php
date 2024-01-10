<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Empresas Controller
 *
 * @property \App\Model\Table\EmpresasTable $Empresas
 *
 * @method \App\Model\Entity\Empresa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmpresasController extends AppController
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
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
        }

        $conditions = ['Empresas.is_trash' => 0];

        if ($this->request->getQuery('razao_social') != '') {
            $razao_social = $this->request->getQuery('razao_social');
            $conditions['LOWER(Empresas.razao_social) LIKE'] = '%' . strtolower($razao_social) . '%';
        }

        if ($this->request->getQuery('cnpj') != '') {
            $cnpj = $this->request->getQuery('cnpj');
            $conditions['LOWER(Empresas.cnpj) LIKE'] = '%' . strtolower($cnpj) . '%';
        }

        if ($this->request->getQuery('ativo') != '') {
            $ativo = $this->request->getQuery('ativo');

            if ($ativo == 1) {
                $conditions['Empresas.is_active'] = 1;
            } else if ($ativo == 2) {
                $conditions['Empresas.is_active'] = 0;
            } else if ($ativo == 3) {
            }
        }

        $empresas = $this->paginate($this->Empresas, ['conditions' => $conditions]);

        $this->set(compact('empresas'));
    }

    /**
     * View method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
        }

        $empresa = $this->Empresas->get($id, [
            'contain' => ['Funcionarios.Users', 'Funcionarios.Cargos'],
        ]);

        $this->set('empresa', $empresa);
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
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
        }

        $empresa = $this->Empresas->newEntity();
        if ($this->request->is('post')) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());

            try {
                if ($this->Empresas->save($empresa)) {
                    $this->Flash->success(__('Empresa adicionada com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('A empresa não pôde ser adicionada. Por favor, tente novamente.'));
            } catch (\PDOException $e) {
                $errorCode = $e->getCode();

                if ($errorCode == '23000') {
                    $this->Flash->error(__('A empresa não pode ser adicionada. Verifique se não está associado a outras entidades.'));
                } else {
                    $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
                }
            }
        }


        $this->set(compact('empresa'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
        }

        $empresa = $this->Empresas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());
            try {
                if ($this->Empresas->save($empresa)) {
                    $this->Flash->success(__('Empresa atualizada com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('A empresa não pode ser atualizada. Por favor, tente novamente.'));
            } catch (\PDOException $e) {
                $errorCode = $e->getCode();

                if ($errorCode == '23000') {
                    $this->Flash->error(__('A empresa não pode ser atualizada. Verifique se não está associado a outras entidades.'));
                } else {
                    $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
                }
            }
        }


        $this->set(compact('empresa'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function delete($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
        }

        $this->request->allowMethod(['post', 'delete']);
        $empresa = $this->Empresas->get($id);

        // Define o campo "is_active" para 0 em vez de excluir
        $empresa->is_active = 0;

        if ($this->Empresas->save($empresa)) {
            $this->Flash->success(__('Empresa desativada com sucesso.'));
        } else {
            $this->Flash->error(__('A empresa não pôde ser desativado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function editarEmpresa($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
        }

        $empresa = $this->Empresas->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());

            if (!empty($this->request->getData()['caminho_foto']['name'])) {
                $file = $this->request->getData()['caminho_foto'];
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($ext, $arr_ext)) {
                    $numeros = rand();
                    $filename = $empresa->razao_social . '-' . $numeros . '-perfil' . '.' . $ext;
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/fotos/' . $filename);
                    $empresa->caminho_foto = 'fotos/' . $filename;
                } else {
                    $this->Flash->error(__('Only image files (JPG, JPEG, GIF, PNG) are allowed.'));
                }
            }

            if ($this->Empresas->save($empresa)) {
                $this->Flash->success(__('Empresa atualizada com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A empresa não pôde ser atualizada. Por favor, tente novamente.'));
        }

        $this->set(compact('empresa'));
    }

    public function visualizarEmpresa($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
        }

        $empresa = $this->Empresas->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('empresa'));
    }
}
