<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Holerites Controller
 *
 * @property \App\Model\Table\HoleritesTable $Holerites
 *
 * @method \App\Model\Entity\Holerite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HoleritesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Funcionarios'],
        ];
        $holerites = $this->paginate($this->Holerites);

        $this->set(compact('holerites'));
    }

    /**
     * View method
     *
     * @param string|null $id Holerite id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $holerite = $this->Holerites->get($id, [
            'contain' => ['Funcionarios'],
        ]);

        $this->set('holerite', $holerite);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $holerite = $this->Holerites->newEntity();
        if ($this->request->is('post')) {
            $holerite = $this->Holerites->patchEntity($holerite, $this->request->getData());
            if ($this->Holerites->save($holerite)) {
                $this->Flash->success(__('Holetite adicionado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O holerite não pôde ser adicionado. Por favor, tente novamente.'));
        }
        $funcionarios = $this->Holerites->Funcionarios->find('list', ['limit' => 200]);
        $this->set(compact('holerite', 'funcionarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Holerite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $holerite = $this->Holerites->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $holerite = $this->Holerites->patchEntity($holerite, $this->request->getData());
            if ($this->Holerites->save($holerite)) {
                $this->Flash->success(__('Holerite atualizado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O holerite não pôde ser atualizado. Por favor, tente novamente.'));
        }
        $funcionarios = $this->Holerites->Funcionarios->find('list', ['limit' => 200]);
        $this->set(compact('holerite', 'funcionarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Holerite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $holerite = $this->Holerites->get($id);
        if ($this->Holerites->delete($holerite)) {
            $this->Flash->success(__('Holerite deletado com sucesso.'));
        } else {
            $this->Flash->error(__('O holerite não pôde ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
