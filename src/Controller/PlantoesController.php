<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Plantoes Controller
 *
 * @property \App\Model\Table\PlantoesTable $Plantoes
 *
 * @method \App\Model\Entity\Planto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlantoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $plantoes = $this->paginate($this->Plantoes);

        $this->set(compact('plantoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Planto id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $planto = $this->Plantoes->get($id, [
            'contain' => ['Funcionarios'],
        ]);

        $this->set('planto', $planto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $planto = $this->Plantoes->newEntity();
        if ($this->request->is('post')) {
            $planto = $this->Plantoes->patchEntity($planto, $this->request->getData());
            if ($this->Plantoes->save($planto)) {
                $this->Flash->success(__('The planto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The planto could not be saved. Please, try again.'));
        }
        $funcionarios = $this->Plantoes->Funcionarios->find('list', ['limit' => 200]);
        $this->set(compact('planto', 'funcionarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Planto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $planto = $this->Plantoes->get($id, [
            'contain' => ['Funcionarios'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $planto = $this->Plantoes->patchEntity($planto, $this->request->getData());
            if ($this->Plantoes->save($planto)) {
                $this->Flash->success(__('The planto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The planto could not be saved. Please, try again.'));
        }
        $funcionarios = $this->Plantoes->Funcionarios->find('list', ['limit' => 200]);
        $this->set(compact('planto', 'funcionarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Planto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $planto = $this->Plantoes->get($id);
        if ($this->Plantoes->delete($planto)) {
            $this->Flash->success(__('The planto has been deleted.'));
        } else {
            $this->Flash->error(__('The planto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
