<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FuncionariosPlantoes Controller
 *
 * @property \App\Model\Table\FuncionariosPlantoesTable $FuncionariosPlantoes
 *
 * @method \App\Model\Entity\FuncionariosPlanto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FuncionariosPlantoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Funcionarios', 'Plantoes'],
        ];
        $funcionariosPlantoes = $this->paginate($this->FuncionariosPlantoes);

        $this->set(compact('funcionariosPlantoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Funcionarios Planto id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $funcionariosPlanto = $this->FuncionariosPlantoes->get($id, [
            'contain' => ['Funcionarios', 'Plantoes'],
        ]);

        $this->set('funcionariosPlanto', $funcionariosPlanto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $funcionariosPlanto = $this->FuncionariosPlantoes->newEntity();
        if ($this->request->is('post')) {
            $funcionariosPlanto = $this->FuncionariosPlantoes->patchEntity($funcionariosPlanto, $this->request->getData());
            if ($this->FuncionariosPlantoes->save($funcionariosPlanto)) {
                $this->Flash->success(__('The funcionarios planto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The funcionarios planto could not be saved. Please, try again.'));
        }
        $funcionarios = $this->FuncionariosPlantoes->Funcionarios->find('list', ['limit' => 200]);
        $plantoes = $this->FuncionariosPlantoes->Plantoes->find('list', ['limit' => 200]);
        $this->set(compact('funcionariosPlanto', 'funcionarios', 'plantoes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Funcionarios Planto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $funcionariosPlanto = $this->FuncionariosPlantoes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $funcionariosPlanto = $this->FuncionariosPlantoes->patchEntity($funcionariosPlanto, $this->request->getData());
            if ($this->FuncionariosPlantoes->save($funcionariosPlanto)) {
                $this->Flash->success(__('The funcionarios planto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The funcionarios planto could not be saved. Please, try again.'));
        }
        $funcionarios = $this->FuncionariosPlantoes->Funcionarios->find('list', ['limit' => 200]);
        $plantoes = $this->FuncionariosPlantoes->Plantoes->find('list', ['limit' => 200]);
        $this->set(compact('funcionariosPlanto', 'funcionarios', 'plantoes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Funcionarios Planto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $funcionariosPlanto = $this->FuncionariosPlantoes->get($id);
        if ($this->FuncionariosPlantoes->delete($funcionariosPlanto)) {
            $this->Flash->success(__('The funcionarios planto has been deleted.'));
        } else {
            $this->Flash->error(__('The funcionarios planto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
