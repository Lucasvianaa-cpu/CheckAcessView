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

        $conditions = [];

        if ($this->request->getQuery('nome') != '') {
            $nome = $this->request->getQuery('nome');
            $conditions['LOWER(PlanosSaudes.nome) LIKE'] = '%' . strtolower($nome) . '%';
        }

        $planosSaudes = $this->paginate($this->PlanosSaudes, ['conditions' => $conditions]);

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
                $this->Flash->success(__('Plano de saúde adicionado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O plano de saúde não pôde ser adicionado. Por favor, tente novamente.'));
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
                $this->Flash->success(__('Plano de saúde atualizado com sucesso.'));

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

        // Define o campo "is_active" para 0 em vez de excluir
        $planosSaude->is_active = 0;

        if ($this->PlanosSaudes->save($planosSaude)) {
            $this->Flash->success(__('Plano de Saúde desativado com sucesso.'));
        } else {
            $this->Flash->error(__('O Plano de Saúde não pôde ser desativado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
