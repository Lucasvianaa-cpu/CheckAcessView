<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PlanosSaudes Controller
 *
 * @property \App\Model\Table\PlanosSaudesTable $PlanosSaudes
 *
 * @method \App\Model\Entity\PlanosSaude[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlanosSaudesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $planosSaudes = $this->paginate($this->PlanosSaudes);

        $this->set(compact('planosSaudes'));
    }

    /**
     * View method
     *
     * @param string|null $id Planos Saude id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $planosSaude = $this->PlanosSaudes->get($id, [
            'contain' => [],
        ]);

        $this->set('planosSaude', $planosSaude);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $planosSaude = $this->PlanosSaudes->newEntity();
        if ($this->request->is('post')) {
            $planosSaude = $this->PlanosSaudes->patchEntity($planosSaude, $this->request->getData());
            if ($this->PlanosSaudes->save($planosSaude)) {
                $this->Flash->success(__('Plano de saúde salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O plano de saúde não pôde ser salvo. Por favor, tente novamente.'));
        }
        $this->set(compact('planosSaude'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Planos Saude id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $planosSaude = $this->PlanosSaudes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $planosSaude = $this->PlanosSaudes->patchEntity($planosSaude, $this->request->getData());
            if ($this->PlanosSaudes->save($planosSaude)) {
                $this->Flash->success(__('Plano de saúde atualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O plano de saúde não pôde ser atualizado. Por favor, tente novamente.'));
        }
        $this->set(compact('planosSaude'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Planos Saude id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $planosSaude = $this->PlanosSaudes->get($id);
        if ($this->PlanosSaudes->delete($planosSaude)) {
            $this->Flash->success(__('Plano de saúde deletado.'));
        } else {
            $this->Flash->error(__('O plano de saúde não pôde ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
