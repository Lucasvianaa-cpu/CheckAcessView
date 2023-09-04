<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Veiculos Controller
 *
 * @property \App\Model\Table\VeiculosTable $Veiculos
 *
 * @method \App\Model\Entity\Veiculo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VeiculosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $conditions = [];

        if ($this->request->getQuery('modelo') != '') {
            $modelo = $this->request->getQuery('modelo');
            $conditions['LOWER(Veiculos.modelo) LIKE'] = '%' . strtolower($modelo) . '%';
        }

        if ($this->request->getQuery('placa') != '') {
            $placa = $this->request->getQuery('placa');
            $conditions['LOWER(Veiculos.placa) LIKE'] = '%' . strtolower($placa) . '%';
        }

        $this->paginate = [
            'contain' => ['Users'],
        ];
        $veiculos = $this->paginate($this->Veiculos, ['conditions' => $conditions]);

        $this->set(compact('veiculos'));
    }

    /**
     * View method
     *
     * @param string|null $id Veiculo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $veiculo = $this->Veiculos->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('veiculo', $veiculo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $veiculo = $this->Veiculos->newEntity();
        if ($this->request->is('post')) {
            $veiculo = $this->Veiculos->patchEntity($veiculo, $this->request->getData());
            if ($this->Veiculos->save($veiculo)) {
                $this->Flash->success(__('Veículo adicionado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O veículo não pôde ser adicionado. Por favor, tente novamente.'));
        }
        $users = $this->Veiculos->Users->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $this->set(compact('veiculo', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Veiculo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $veiculo = $this->Veiculos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $veiculo = $this->Veiculos->patchEntity($veiculo, $this->request->getData());
            if ($this->Veiculos->save($veiculo)) {
                $this->Flash->success(__('Veículo atualizado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O veículo não pôde ser atualizado. Por favor, tente novamente.'));
        }
        $users = $this->Veiculos->Users->find('list', ['limit' => 200]);
        $this->set(compact('veiculo', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Veiculo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    /**Função de Deletar, mas ao invés de deletar irá inativar */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $veiculo = $this->Veiculos->get($id);

        // Define o campo "is_active" para 0 em vez de excluir
        $veiculo->is_active = 0;

        if ($this->Veiculos->save($veiculo)) {
            $this->Flash->success(__('Veículo desativado com sucesso.'));
        } else {
            $this->Flash->error(__('O veículo não pôde ser desativado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
