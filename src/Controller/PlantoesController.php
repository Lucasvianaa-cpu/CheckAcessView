<?php

namespace App\Controller;


use DateTime;

use App\Controller\AppController;


class PlantoesController extends AppController
{


    public function initialize()
    {
        parent::initialize();
    }


    public function totalPlantoes()
    {
        $this->loadModel('Funcionarios');
        $this->loadModel('Users');

        $conditions = [];
        
        if ($this->request->getQuery('nome') != '') {
            $nome = $this->request->getQuery('nome');
            $nome = $this->removerAcentos($nome);
            $conditions['LOWER(Users.nome) LIKE'] = '%' . strtolower($nome) . '%';
        }

        if ($this->request->getQuery('sobrenome') != '') {
            $sobrenome = $this->request->getQuery('sobrenome');
            $sobrenome = $this->removerAcentos($sobrenome);
            $conditions['LOWER(Users.sobrenome) LIKE'] = '%' . strtolower($sobrenome) . '%';
        }


        if ($this->request->getQuery('data') != '') {
            $data = $this->request->getQuery('data');
            $data_formatada = DateTime::createFromFormat('m/Y', $data);
            if ($data_formatada) {
                // Primeiro dia do mês
                $primeiro_dia = $data_formatada->format('Y-m-01');

                // Último dia do mês
                $ultimo_dia = $data_formatada->format('Y-m-t');

                $conditions['Plantoes.data >='] = $primeiro_dia;
                $conditions['Plantoes.data <='] = $ultimo_dia;


                $plantoes = $this->paginate($this->Plantoes, ['contain' => 'Funcionarios.Users', 'limit' => 31, 'conditions' => $conditions]);
                $this->set(compact('plantoes'));
            }
        }

        
    }



    public function index()
    {

        $this->loadModel('Funcionarios');


        $conditions = [];

        if ($this->request->getQuery('data') != '') {
            $data = $this->request->getQuery('data');
            $data_formatada = DateTime::createFromFormat('d/m/Y', $data);
            if ($data_formatada) {
                $conditions['Plantoes.data ='] = $data_formatada->format('Y-m-d');
            }
        }

        $funcionario = $this->Funcionarios->find('all', ['conditions' => ['user_id' => $this->Auth->user('id')], 'limit' => 1])->first();


        $dias = range(1, 31);
        $pontos_dias = [];

        $this->paginate = [
            'conditions' => ['funcionario_id' => $funcionario->id]
        ];

        $conditions['Plantoes.funcionario_id'] = $funcionario->id;


        $plantoes = $this->paginate($this->Plantoes, ['conditions' => $conditions]);














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


    public function add()
    {

        $this->loadModel('Funcionarios');
        $this->loadModel('Users');
        $this->loadModel('Empresas');



        $funcionario = $this->Funcionarios->find()
            ->contain(['Users', 'Empresas'])
            ->where(['Funcionarios.user_id' => $this->Auth->user('id')])
            ->first();

        // Coleta os dados do usuário logado
        $current_user = $this->Auth->user();

        // Coleta o último ponto sem a hora_termino preenchido
        $ultimo_ponto = $this->Plantoes->find('all', [
            'conditions' => ['funcionario_id' => $current_user['funcionarios'][0]['id'], 'hora_termino IS' => null],
            'order' => ['id' => 'DESC'],
            'limit' => 1
        ])->first();

        if (empty($ultimo_ponto)) {
            // Criação de um novo ponto
            $ponto = $this->Plantoes->newEntity();
            if ($this->request->is('post')) {
                $ponto = $this->Plantoes->patchEntity($ponto, $this->request->getData());
                $ponto->data = date('Y-m-d');
                $ponto->hora_inicio = date('H:i');
                $ponto->funcionario_id = $current_user['funcionarios'][0]['id'];
                if ($this->Plantoes->save($ponto)) {
                    $this->Flash->success(__('Ponto adicionado com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('O ponto não pode ser criado.'));
            }
            $this->set(compact('ponto', 'funcionario'));
        } else {
            // Altera o ultimo ponto
            $ponto = $this->Plantoes->get($ultimo_ponto->id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $ponto = $this->Plantoes->patchEntity($ponto, $this->request->getData());
                $ponto->hora_termino = date('H:i');

                // Converta as strings para objetos Time
                $hora_inicio = \Cake\I18n\Time::parse($ponto->hora_inicio);
                $hora_termino = \Cake\I18n\Time::parse($ponto->hora_termino);

                $diferenca = $hora_inicio->diff($hora_termino);

                $resultado = $diferenca->h . ':' . $diferenca->i;
                $resultado = \Cake\I18n\Time::parse($resultado);
                $resultado = $resultado->format('H:i:s');


                $ponto->hora_total = $resultado;


                if ($this->Plantoes->save($ponto)) {
                    $this->Flash->success(__('Ponto atualizado com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('O ponto não pode ser alterado.'));
            }
            $this->set(compact('ponto', 'funcionario'));
        }
    }



    public function edit($id = null)
    {
        $planto = $this->Plantoes->get($id, [
            'contain' => ['Funcionarios'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $planto = $this->Plantoes->patchEntity($planto, $this->request->getData());
            if ($this->Plantoes->save($planto)) {
                $this->Flash->success(__('Plantão atualizado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O plantão não pôde ser atualizado. Por favor, tente novamente.'));
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
            $this->Flash->success(__('Plantão deletado com sucesso.'));
        } else {
            $this->Flash->error(__('O plantão não pôde ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
