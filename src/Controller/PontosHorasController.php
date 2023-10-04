<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

use DateTime;

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
    public function initialize()
    {
        parent::initialize();
    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);

        // Permitir acesso público 
        $this->Auth->allow(['addRfid']);
        $this->Auth->allow(['retornoRfid']);
    }

    public function totalFuncionarios(){

        $this->loadModel('Funcionarios');

        $conditions = [];

        if ($this->request->getQuery('nome') != '') {
            $nome = $this->request->getQuery('nome');
            $conditions['LOWER(Users.nome) LIKE'] = '%' . strtolower($nome) . '%';
        }

        if ($this->request->getQuery('data_ponto') != '') {
            $data = $this->request->getQuery('data_ponto');
            $data_formatada = DateTime::createFromFormat('d/m/Y', $data);
            if ($data_formatada) {
                $conditions['PontosHoras.data_ponto ='] = $data_formatada->format('Y-m-d');
            }
        }

        if ($this->request->getQuery('sobrenome') != '') {
            $sobrenome = $this->request->getQuery('sobrenome');
            $conditions['LOWER(Users.sobrenome) LIKE'] = '%' . strtolower($sobrenome) . '%';
        }

        $funcionario = $this->Funcionarios->find('all', ['conditions' => ['user_id' => $this->Auth->user('id')], 'limit' => 1])->first();

        $dias = range(1, 31);
        $pontos_dias = [];

        $this->paginate = [
            'conditions' => ['funcionario_id' => $funcionario->id],
            'contain' => ['Funcionarios.Users']
        ];
        $pontos = $this->paginate($this->PontosHoras, ['conditions' => $conditions]);


        foreach ($pontos as $ponto) {
            $data = $ponto->data_ponto->format('d/m/Y');

            $pontos_dias[$data][] = [
                'data' => $ponto->data_ponto->format('Y-m-d'),
                'hora' => $ponto->hora->format('H:i:s'),
                'nome' => $ponto->funcionario->user->nome,
                'sobrenome' => $ponto->funcionario->user->sobrenome,
            ];
        }

        foreach ($pontos_dias as &$pontos) { // Use &$pontos para alterar o array original
            sort($pontos);
            $contagem = count($pontos);
            if ($contagem == 2) {
                $entrada = strtotime(substr($pontos[0]['hora'], 0, 5));
                $saida = strtotime(substr($pontos[1]['hora'], 0, 5));

                $diferenca_em_segundos = $saida - $entrada;

                // Calcular horas, minutos e segundos
                $horas = floor($diferenca_em_segundos / 3600); // 3600 segundos em uma hora
                $diferenca_em_segundos %= 3600; // Remover as horas
                $minutos = floor($diferenca_em_segundos / 60); // O resto em minutos
                $segundos = $diferenca_em_segundos % 60; // O resto em segundos

                // Formate o total em horas, minutos e segundos
                $total = sprintf("%02d:%02d:%02d", $horas, $minutos, $segundos);

                // Adicione o total ao array atual em $pontos
                $pontos[] = ['total' => $total];
            } else if ($contagem == 4) {
                $entrada = strtotime(substr($pontos[0]['hora'], 0, 5));
                $saida_intervalo = strtotime(substr($pontos[1]['hora'], 0, 5));

                $retorno = strtotime(substr($pontos[2]['hora'], 0, 5));
                $saida = strtotime(substr($pontos[3]['hora'], 0, 5));

                $total_primeiro_periodo = date("H:i", $saida_intervalo - $entrada);
                $total_segundo_periodo = date("H:i", $saida - $retorno);

                $total = date("H:i", strtotime("00:00") + strtotime($total_primeiro_periodo) + strtotime($total_segundo_periodo));

                // Adicione o total ao array atual em $pontos
                $pontos[] = ['total' => $total];
            } else if ($contagem == 1 || $contagem == 3) {
                $pontos[] = ['total' => 'Registre 2 ou 4 pontos para definir o total de horas'];
            }
        }


        $this->set(compact('pontos_dias'));
    }

    public function index()
    {
        $this->loadModel('Funcionarios');

        $conditions = [];

        if ($this->request->getQuery('data_ponto') != '') {
            $data = $this->request->getQuery('data_ponto');
            $data_formatada = DateTime::createFromFormat('d/m/Y', $data);
            if ($data_formatada) {
                $conditions['PontosHoras.data_ponto ='] = $data_formatada->format('Y-m-d');
            }
        }

        $funcionario = $this->Funcionarios->find('all', ['conditions' => ['user_id' => $this->Auth->user('id')], 'limit' => 1])->first();

        $dias = range(1, 31);
        $pontos_dias = [];

        $this->paginate = [
            'conditions' => ['funcionario_id' => $funcionario->id]
        ];
        $pontos = $this->paginate($this->PontosHoras, ['conditions' => $conditions]);


        foreach ($pontos as $ponto) {
            $data = $ponto->data_ponto->format('d/m/Y');

            $pontos_dias[$data][] = [
                'data' => $ponto->data_ponto->format('Y-m-d'),
                'hora' => $ponto->hora->format('H:i:s')
            ];
        }

        foreach ($pontos_dias as &$pontos) { // Use &$pontos para alterar o array original
            sort($pontos);
            $contagem = count($pontos);
            if ($contagem == 2) {
                $entrada = strtotime(substr($pontos[0]['hora'], 0, 5));
                $saida = strtotime(substr($pontos[1]['hora'], 0, 5));

                $diferenca_em_segundos = $saida - $entrada;

                // Calcular horas, minutos e segundos
                $horas = floor($diferenca_em_segundos / 3600); // 3600 segundos em uma hora
                $diferenca_em_segundos %= 3600; // Remover as horas
                $minutos = floor($diferenca_em_segundos / 60); // O resto em minutos
                $segundos = $diferenca_em_segundos % 60; // O resto em segundos

                // Formate o total em horas, minutos e segundos
                $total = sprintf("%02d:%02d:%02d", $horas, $minutos, $segundos);

                // Adicione o total ao array atual em $pontos
                $pontos[] = ['total' => $total];
            } else if ($contagem == 4) {
                $entrada = strtotime(substr($pontos[0]['hora'], 0, 5));
                $saida_intervalo = strtotime(substr($pontos[1]['hora'], 0, 5));

                $retorno = strtotime(substr($pontos[2]['hora'], 0, 5));
                $saida = strtotime(substr($pontos[3]['hora'], 0, 5));

                $total_primeiro_periodo = date("H:i", $saida_intervalo - $entrada);
                $total_segundo_periodo = date("H:i", $saida - $retorno);

                $total = date("H:i", strtotime("00:00") + strtotime($total_primeiro_periodo) + strtotime($total_segundo_periodo));

                // Adicione o total ao array atual em $pontos
                $pontos[] = ['total' => $total];
            } else if ($contagem == 1 || $contagem == 3) {
                $pontos[] = ['total' => 'Registre 2 ou 4 pontos para definir o total de horas'];
            }
        }


        $this->set(compact('pontos_dias'));
    }

    public function geral() //alterar para buscar os pontos de todos os funcionários
    {
        $this->loadModel('Users');
        $this->loadModel('Funcionarios');

        $conditions = [];

        if ($this->request->getQuery('nome') != '') {
            $nome = $this->request->getQuery('nome');
            $conditions['LOWER(Users.nome) LIKE'] = '%' . strtolower($nome) . '%';
        }

        if ($this->request->getQuery('data_ponto') != '') {
            $data = $this->request->getQuery('data_ponto');
            $data_formatada = DateTime::createFromFormat('d/m/Y', $data);
            if ($data_formatada) {
                $conditions['PontosHoras.data_ponto ='] = $data_formatada->format('Y-m-d');
            }
        }

        if ($this->request->getQuery('sobrenome') != '') {
            $sobrenome = $this->request->getQuery('sobrenome');
            $conditions['LOWER(Users.sobrenome) LIKE'] = '%' . strtolower($sobrenome) . '%';
        }

        $this->paginate = [
            'contain' => ['Funcionarios.Users'],
        ];
        
        $pontos = $this->paginate($this->PontosHoras, ['conditions' => $conditions]);

        $this->set(compact('pontos'));
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


        $this->loadModel('Funcionarios');
        $this->loadModel('Users');
        $this->loadModel('Empresas');

        $funcionario = $this->Funcionarios->find()
            ->contain(['Users', 'Empresas'])
            ->where(['Funcionarios.user_id' => $this->Auth->user('id')])
            ->first();

        $pontosHora = $this->PontosHoras->get($id, []);

        $pontosHora = $this->PontosHoras->patchEntity($pontosHora, $this->request->getData());

        $pontosHora->funcionario_id = $funcionario->id;



        $this->set(compact('pontosHora', 'funcionario'));
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

        $this->loadModel('Funcionarios');
        $this->loadModel('Users');
        $this->loadModel('Empresas');

        $funcionario = $this->Funcionarios->find()
            ->contain(['Users', 'Empresas'])
            ->where(['Funcionarios.user_id' => $this->Auth->user('id')])
            ->first();

        $pontosHora = $this->PontosHoras->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pontosHora = $this->PontosHoras->patchEntity($pontosHora, $this->request->getData());

            $pontosHora->data_ponto  = new \DateTime(); // Supondo que você tenha uma data aqui
            $data = $pontosHora->data_ponto->format('Y-m-d');

            if ($this->PontosHoras->save($pontosHora)) {
                $this->Flash->success(__('Ponto atualizado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O ponto não pôde ser salvo. Por favor, tente novamente.'));
        }

        $this->set(compact('pontosHora', 'funcionario'));
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


    public function addRfid()
    {
        $this->loadModel('Users');
        $this->loadModel('Funcionarios');

        if ($this->request->is('post')) {
            $tag = $_POST['uid_rfid'];

            $user = $this->Users->find('all', [
                'conditions' => ['uid_rfid' => $tag],
            ])->first();


            if (!empty($user)) {

                $funcionario = $this->Funcionarios->find()
                    ->contain(['Users', 'Empresas'])
                    ->where(['Funcionarios.user_id' => $user->id])
                    ->first();

                $pontosHora = $this->PontosHoras->newEntity();

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

                    return $this->redirect(['action' => 'retornoRfid/?tag=' . $tag . '']);
                }
            } else {
                $this->Flash->error(__('Cartão não foi reconhecido. Vá até ao RH!'));
                return $this->redirect(['action' => 'addRfid']);
            }
        }
    }

    public function retornoRfid()
    {

        $this->loadModel('Users');
        $this->loadModel('Funcionarios');
        $this->loadModel('PontosHora');

        $tag = $_GET['tag'];
        if ($tag) {

            $user = $this->Users->find('all', [
                'conditions' => ['uid_rfid' => $tag],
            ])->first();

            $funcionario = $this->Funcionarios->find()
                ->contain(['Users', 'Empresas'])
                ->where(['Funcionarios.user_id' => $user->id])
                ->first();

            $pontosHora = $this->PontosHoras->find()
                ->where(['funcionario_id' => $funcionario->id])
                ->first();
        }

        $this->set(compact('pontosHora', 'funcionario'));

    }
}
