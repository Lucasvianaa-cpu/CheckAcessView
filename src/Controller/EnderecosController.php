<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Enderecos Controller
 *
 * @property \App\Model\Table\EnderecosTable $Enderecos
 *
 * @method \App\Model\Entity\Endereco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnderecosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cidades', 'Users'],
        ];
        $enderecos = $this->paginate($this->Enderecos);

        $this->set(compact('enderecos'));
    }

    /**
     * View method
     *
     * @param string|null $id Endereco id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $endereco = $this->Enderecos->get($id, [
            'contain' => ['Cidades', 'Users'],
        ]);

        $this->set('endereco', $endereco);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $endereco = $this->Enderecos->newEntity();
        if ($this->request->is('post')) {
            $endereco = $this->Enderecos->patchEntity($endereco, $this->request->getData());
            if ($this->Enderecos->save($endereco)) {
                $this->Flash->success(__('Endereço adicionado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O endereço não pôde ser adicionado. Por favor, tente novamente.'));
        }
        $cidades = $this->Enderecos->Cidades->find('list', ['limit' => 200]);
        $users = $this->Enderecos->Users->find('list', ['limit' => 200]);
        $this->set(compact('endereco', 'cidades', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Endereco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $endereco = $this->Enderecos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $endereco = $this->Enderecos->patchEntity($endereco, $this->request->getData());
            if ($this->Enderecos->save($endereco)) {
                $this->Flash->success(__('Endereço atualizado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O endereço não pôde ser atualizado. Por favor, tente novamente.'));
        }
        $cidades = $this->Enderecos->Cidades->find('list', ['limit' => 200]);
        $users = $this->Enderecos->Users->find('list', ['limit' => 200]);
        $this->set(compact('endereco', 'cidades', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Endereco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $endereco = $this->Enderecos->get($id);
        if ($this->Enderecos->delete($endereco)) {
            $this->Flash->success(__('Endereço deletado com sucesso.'));
        } else {
            $this->Flash->error(__('O endereço não pôde ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
