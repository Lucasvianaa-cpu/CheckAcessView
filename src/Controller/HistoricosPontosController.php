<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HistoricosPontos Controller
 *
 * @property \App\Model\Table\HistoricosPontosTable $HistoricosPontos
 *
 * @method \App\Model\Entity\HistoricosPonto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HistoricosPontosController extends AppController
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
        $historicosPontos = $this->paginate($this->HistoricosPontos);

        $this->set(compact('historicosPontos'));
    }

    /**
     * View method
     *
     * @param string|null $id Historicos Ponto id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $historicosPonto = $this->HistoricosPontos->get($id, [
            'contain' => ['Funcionarios'],
        ]);

        $this->set('historicosPonto', $historicosPonto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $historicosPonto = $this->HistoricosPontos->newEntity();
        if ($this->request->is('post')) {
            $historicosPonto = $this->HistoricosPontos->patchEntity($historicosPonto, $this->request->getData());
            if ($this->HistoricosPontos->save($historicosPonto)) {
                $this->Flash->success(__('The historicos ponto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The historicos ponto could not be saved. Please, try again.'));
        }
        $funcionarios = $this->HistoricosPontos->Funcionarios->find('list', ['limit' => 200]);
        $this->set(compact('historicosPonto', 'funcionarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Historicos Ponto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $historicosPonto = $this->HistoricosPontos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $historicosPonto = $this->HistoricosPontos->patchEntity($historicosPonto, $this->request->getData());
            if ($this->HistoricosPontos->save($historicosPonto)) {
                $this->Flash->success(__('The historicos ponto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The historicos ponto could not be saved. Please, try again.'));
        }
        $funcionarios = $this->HistoricosPontos->Funcionarios->find('list', ['limit' => 200]);
        $this->set(compact('historicosPonto', 'funcionarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Historicos Ponto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $historicosPonto = $this->HistoricosPontos->get($id);
        if ($this->HistoricosPontos->delete($historicosPonto)) {
            $this->Flash->success(__('The historicos ponto has been deleted.'));
        } else {
            $this->Flash->error(__('The historicos ponto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
