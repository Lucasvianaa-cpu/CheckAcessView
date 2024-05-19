<?php
namespace App\Controller;

use App\Controller\AppController;


class EnderecosController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'contain' => ['Cidades', 'Users'],
        ];
        $enderecos = $this->paginate($this->Enderecos);

        $this->set(compact('enderecos'));
    }


    public function view($id = null)
    {
        $endereco = $this->Enderecos->get($id, [
            'contain' => ['Cidades', 'Users'],
        ]);

        $this->set('endereco', $endereco);
    }


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

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $endereco = $this->Enderecos->get($id);
        if ($this->Enderecos->delete($endereco)) {
            $this->Flash->success(__('Endereço deletado com sucesso.'));
        } else {
            $this->Flash->error(__('O endereço não pôde ser deletado. Por favor, tente novamente.'));
        }
    }
}
