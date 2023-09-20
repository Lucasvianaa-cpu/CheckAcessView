<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

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


    public function relatorioFuncionarios()
    {
        $this->loadModel('HistoricosPontos');

        $conditions = ['Funcionarios.is_active' => 1];

        if ($this->request->getQuery('nome') != '') {
            $nome = $this->request->getQuery('nome');
            $conditions['LOWER(Users.nome) LIKE'] = '%' . strtolower($nome) . '%';
        }
        if ($this->request->getQuery('sobrenome') != '') {
            $sobrenome = $this->request->getQuery('sobrenome');
            $conditions['LOWER(Users.sobrenome) LIKE'] = '%' . strtolower($sobrenome) . '%';
        }
        if ($this->request->getQuery('data_ponto') != '') {
            $data_ponto = $this->request->getQuery('data_ponto');

            $data_ponto = new \DateTime(); // Supondo que você tenha uma data aqui
            $nova_data = $data_ponto->format('Y-m-d'); // Formata a data

            $conditions['PontosHoras.data_ponto'] = $nova_data;
        }

        $this->paginate = [
            'contain' => ['Funcionarios.Users'],
            'conditions' => $conditions,
        ];

        $pontos_historico = $this->paginate($this->PontosHoras);

        $this->set(compact('pontos_historico'));
    }




    public function index()
    {
        $this->loadModel('Funcionarios');

        $funcionario = $this->Funcionarios->find('all', [
            'conditions' => ['user_id' => $this->Auth->user('id')],
            'limit' => 1
        ])->first();

        $this->paginate = [
            'conditions' => ['funcionario_id' => $funcionario->id]
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
        $pontosHora = $this->PontosHoras->get($id, []);

        $this->set('pontosHora', $pontosHora);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Funcionarios');
        $this->loadModel('Users');
        $this->loadModel('Empresas');

        $funcionario = $this->Funcionarios->find()
        ->contain(['Users', 'Empresas'])
        ->where(['Funcionarios.user_id' => $this->Auth->user('id')])
        ->first();


     
        $pontosHora = $this->PontosHoras->newEntity();
        if ($this->request->is('post')) {
            $pontosHora = $this->PontosHoras->patchEntity($pontosHora, $this->request->getData());
            $pontosHora->data_ponto = date('Y-m-d');
            $pontosHora->hora = date('H:i:s');
            $pontosHora->funcionario_id = $funcionario->id;

            if ($this->PontosHoras->save($pontosHora)) {

                $id_ponto = $pontosHora->id;

                $data = [
                    'funcionario_id' => $funcionario->id,
                    'pontos_horas_id' => $id_ponto,
                ];

                $postsTable = TableRegistry::getTableLocator()->get('HistoricosPontos');
                $newPost = $postsTable->newEntity($data);
                $postsTable->save($newPost);

                $this->Flash->success(__('Ponto adicionado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O ponto não pôde ser salvo. Por favor, tente novamente.'));
        }
        

        $this->set(compact('pontosHora', 'funcionario'));
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
                $this->Flash->success(__('Ponto atualizado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O ponto não pôde ser salvo. Por favor, tente novamente.'));
        }

        $this->set(compact('pontosHora'));
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
            $this->Flash->success(__('Ponto deletado com sucesso.'));
        } else {
            $this->Flash->error(__('O ponto não pôde ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
