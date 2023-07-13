<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PontosHoras Controller
 *
 * @property \App\Model\Table\PontosHorasTable $PontosHoras
 *
 * @method \App\Model\Entity\PontosHora[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PontosHorasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['HistoricosPontos'],
        ];
        $pontosHoras = $this->paginate($this->PontosHoras);

        $this->set(compact('pontosHoras'));
    }

    /**
     * View method
     *
     * @param string|null $id Pontos Hora id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pontosHora = $this->PontosHoras->get($id, [
            'contain' => ['HistoricosPontos'],
        ]);

        $this->set('pontosHora', $pontosHora);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pontosHora = $this->PontosHoras->newEntity();
        if ($this->request->is('post')) {
            $pontosHora = $this->PontosHoras->patchEntity($pontosHora, $this->request->getData());
            if ($this->PontosHoras->save($pontosHora)) {
                $this->Flash->success(__('The pontos hora has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pontos hora could not be saved. Please, try again.'));
        }
        $historicosPontos = $this->PontosHoras->HistoricosPontos->find('list', ['limit' => 200]);
        $this->set(compact('pontosHora', 'historicosPontos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pontos Hora id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pontosHora = $this->PontosHoras->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pontosHora = $this->PontosHoras->patchEntity($pontosHora, $this->request->getData());
            if ($this->PontosHoras->save($pontosHora)) {
                $this->Flash->success(__('The pontos hora has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pontos hora could not be saved. Please, try again.'));
        }
        $historicosPontos = $this->PontosHoras->HistoricosPontos->find('list', ['limit' => 200]);
        $this->set(compact('pontosHora', 'historicosPontos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pontos Hora id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pontosHora = $this->PontosHoras->get($id);
        if ($this->PontosHoras->delete($pontosHora)) {
            $this->Flash->success(__('The pontos hora has been deleted.'));
        } else {
            $this->Flash->error(__('The pontos hora could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
