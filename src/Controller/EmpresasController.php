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
        $empresas = $this->paginate($this->Empresas);

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
        $empresa = $this->Empresas->get($id, [
            'contain' => ['Funcionarios'],
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
        $empresa = $this->Empresas->newEntity();
        if ($this->request->is('post')) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());
            if ($this->Empresas->save($empresa)) {
                $this->Flash->success(__('The empresa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
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
        $empresa = $this->Empresas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());
            if ($this->Empresas->save($empresa)) {
                $this->Flash->success(__('The empresa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
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
        $this->request->allowMethod(['post', 'delete']);
        $empresa = $this->Empresas->get($id);
        if ($this->Empresas->delete($empresa)) {
            $this->Flash->success(__('The empresa has been deleted.'));
        } else {
            $this->Flash->error(__('The empresa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


        public function editarEmpresa ($id = null) 
        {
            $empresa = $this->Empresas->get($id, [
                'contain' => [],
            ]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());
                if ($this->Empresas->save($empresa)) {
                    $this->Flash->success(__('The empresa has been saved.'));
    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
            }

            $this->set(compact('empresa'));

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
            
        }

        public function visualizarEmpresa ($id = null){
            $empresa = $this->Empresas->get($id, [
                'contain' => [],
            ]);
            $this->set(compact('empresa'));
        }
}