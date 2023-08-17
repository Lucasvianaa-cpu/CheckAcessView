<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cargos Controller
 *
 * @property \App\Model\Table\CargosTable $Cargos
 *
 * @method \App\Model\Entity\Cargo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CargosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categorias'],
        ];
        $cargos = $this->paginate($this->Cargos);

        $this->set(compact('cargos'));
    }

    /**
     * View method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cargo = $this->Cargos->get($id, [
            'contain' => ['Categorias', 'Funcionarios'],
        ]);

        $this->set('cargo', $cargo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cargo = $this->Cargos->newEntity();
        if ($this->request->is('post')) {
            $cargo = $this->Cargos->patchEntity($cargo, $this->request->getData());
            if ($this->Cargos->save($cargo)) {
                $this->Flash->success(__('O cargo foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cargo could not be saved. Please, try again.'));
        }
        $categorias = $this->Cargos->Categorias->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $this->set(compact('cargo', 'categorias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cargo = $this->Cargos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cargo = $this->Cargos->patchEntity($cargo, $this->request->getData());
            if ($this->Cargos->save($cargo)) {
                $this->Flash->success(__('The cargo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cargo could not be saved. Please, try again.'));
        }
        $categorias = $this->Cargos->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('cargo', 'categorias'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cargo = $this->Cargos->get($id);
        if ($this->Cargos->delete($cargo)) {
            $this->Flash->success(__('The cargo has been deleted.'));
        } else {
            $this->Flash->error(__('The cargo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
