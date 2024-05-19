<?php

namespace App\Controller;

use DateTime;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    use MailerAwareTrait;

    public function initialize()
    {
        parent::initialize();

        //! Ação de registro permitida sem autenticação
        $this->Auth->allow(['adicionar']);
        $this->Auth->allow(['esqueciSenha']);
        $this->Auth->allow(['RedefinirSenha']);
        $this->loadComponent('ListaFuncionarios');

        $this->current_user = $this->Auth->user();
    }

    public function index()
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];


        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $conditions = ['Users.is_trash' => 0];

        if ($this->request->getQuery('nome') != '') {
            $nome = $this->request->getQuery('nome');
            $conditions['LOWER(Users.nome) LIKE'] = '%' . strtolower($nome) . '%';
        }

        if ($this->request->getQuery('cpf') != '') {
            $cpf = $this->request->getQuery('cpf');
            $conditions['LOWER(Users.cpf) LIKE'] = '%' . strtolower($cpf) . '%';
        }

        if ($this->request->getQuery('ativo') != '') {
            $ativo = $this->request->getQuery('ativo');

            if ($ativo == 1) {
                $conditions['Users.is_active'] = 1;
            } else if ($ativo == 2) {
                $conditions['Users.is_active'] = 0;
            } else if ($ativo == 3) {
            }
        }
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate($this->Users, ['conditions' => $conditions]);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Veiculos'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function adicionar()
    {

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 4;
            try {
                if ($this->Users->save($user)) {
                    $this->getMailer('User')->send('welcome', [$user]);
                    $this->Flash->success(__('Usuário adicionado com sucesso.'));

                    $user = $this->Auth->identify();
                    if ($user) {
                        $user = $this->Users->get($user['id'], [
                            'contain' => ['Funcionarios.Empresas']
                        ]);
                        $this->Auth->setUser($user);
                        return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
                    }
                }
                $this->Flash->error(__('O usuário não pôde ser adicionado. Por favor, tente novamente.'));
            } catch (\PDOException $e) {
                $errorCode = $e->getCode();

                if ($errorCode == '23000') {
                    $this->Flash->error(__('Usuário não pode ser adicionado. Verifique se não está associado a outras entidades.'));
                } else {
                    $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
                }
            }
        }

        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            try {
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Usuário atualizado com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('O usuário não pôde ser atualizado. Por favor, tente novamente.'));
            } catch (\PDOException $e) {
                $errorCode = $e->getCode();

                if ($errorCode == '23000') {
                    $this->Flash->error(__('Usuário não pode ser atualizado. Verifique se não está associado a outras entidades.'));
                } else {
                    $this->Flash->error(__('Erro desconhecido: ') . $e->getMessage());
                }
            }
        }

        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */


    public function delete($id = null)
    {
        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        if ($usuario_logado->role_id != 1) {
            $this->Flash->error(__('Você não tem permissão a essa página!'));

            if ($usuario_logado->role_id != 4) {
                return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

        // Define o campo "is_active" para 0 em vez de excluir
        $user->is_active = 0;

        if ($this->Users->save($user)) {
            $this->Flash->success(__('Usuário desativado com sucesso.'));
        } else {
            $this->Flash->error(__('O usuário não pôde ser desativado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->loadModel('Empresas');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                // Carregar o usuário junto com os funcionários e empresas associados
                $user = $this->Users->get($user['id'], [
                    'contain' => ['Funcionarios.Empresas']
                ]);
                $this->Auth->setUser($user);

                // Se for ROLE 4, redirecionar para a página inicial
                if ($user['role_id'] == 4) {
                    return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
                } else {
                    // Verificar se há funcionários associados
                    if (!empty($user['funcionarios'])) {
                        // Recuperar a empresa associada ao primeiro funcionário do usuário autenticado
                        $empresa_id = $user['funcionarios'][0]['empresa']['id'];
                        // Redirecionar para a dashboard passando o ID da empresa buscada
                        return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
                    } else {
                        // Caso não haja funcionários associados, redirecionar para uma página de erro ou página inicial
                        return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'no_funcionarios']);
                    }

                    //if ($user['role_id'] == 1)
                    // Entrar em dashboard (mas sem vinculo com funcionario ou se necessario ate sem empresa... n sei)
                }
            } else {
                $this->Flash->error(__('E-mail ou senha incorretas! Por favor, tente novamente.'));
            }
        }
    }

    public function editarPerfil($id = null)
    {
        $this->loadModel('Estados');
        $this->loadModel('Cidades');
        $this->loadModel('Enderecos');
        $this->loadModel('Categorias');
        $this->loadModel('Cargos');
        $this->loadModel('Veiculos');

        $usuario_logado = $this->Auth->user();

        $user = $this->Users->get($id, [
            'contain' => ['Enderecos.Cidades.Estados'],
        ]);

        if ($usuario_logado->id != $user->id) {
            $this->Flash->error(__('Usuário não confere ao logado'));
            return $this->redirect(['action' => 'editarPerfil', $usuario_logado->id]);
        }
        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $endereco = $user->enderecos ? $user->enderecos[0] : $this->Enderecos->newEntity();

                $endereco->rua = $this->request->getData('enderecos.0.rua');
                $endereco->numero = $this->request->getData('enderecos.0.numero');
                $endereco->bairro = $this->request->getData('enderecos.0.bairro');
                $endereco->cep = $this->request->getData('enderecos.0.cep');
                $endereco->user_id = $this->Auth->user('id');
                $endereco->cidade_id = $this->request->getData('enderecos.0.cidade_id');

                $this->Enderecos->save($endereco);
                $foto = $user->caminho_foto;


                $user = $this->Users->patchEntity($user, $this->request->getData());

                if (!empty($this->request->getData()['caminho_foto']['name'])) {
                    $file = $this->request->getData()['caminho_foto'];
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $arr_ext = array('jpg', 'jpeg', 'gif', 'png');

                    // Substituir caracteres inválidos no nome do arquivo
                    $nomeDoArquivo = preg_replace("/[^a-zA-Z0-9._-]/", "_", $user->caminho_foto);

                    if (in_array($ext, $arr_ext)) {
                        $numeros = rand();
                        $filename = $nomeDoArquivo . '-' . $numeros . '.' . $ext;
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/fotos/' . $filename);
                        $user->caminho_foto = 'fotos/' . $filename;
                    } else {
                        $this->Flash->error(__('Só é permitido documentos do tipo (JPG, JPEG, GIF, PNG).'));
                    }
                }

                if (empty($this->request->getData()['caminho_foto']['name'])) {
                    $user->caminho_foto = $foto;
                }

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Perfil atualizado com sucesso.'));

                    return $this->redirect($this->referer());
                }
                $this->Flash->error(__('O perfil não pôde ser atualizado. Por favor, tente novamente.'));
            }
        } catch (\Exception $e) {
            $this->Flash->error(__('Ocorreu um erro: Já existe CPF ou RFID idêntico. '));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $estados = $this->Estados->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $cidades = $this->Cidades->find('list', ['keyField' => 'id', 'valueField' => 'nome', 'order' => ['Cidades.nome' => 'ASC']]);
        $categorias = $this->Categorias->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $cargos = $this->Cargos->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $veiculos = $this->Veiculos->find('list', ['keyField' => 'id', 'valueField' => 'nome']);

        $this->set(compact('user', 'roles', 'estados', 'cidades', 'categorias', 'cargos', 'veiculos'));
    }

    public function getEstado()
    {
        $this->loadModel('Cidades');
        $this->autoRender = false;
        $cidadeID = $this->request->getQuery('cidadeid');

        $estado = $this->Cidades->find('all', [
            'conditions' => ['Cidades.id' => $cidadeID],
            'contain' => ['Estados'],
            'limit' => 1
        ])->first();

        $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode(['estado' => $estado->estado->nome]));
    }

    public function visualizarPerfil($id = null)
    {
        $this->loadModel('Cargos');

        $user = $this->Users->get($id, [
            'contain' => ['Funcionarios.Cargos.Categorias']
        ]);

        if ($user->role_id !== 4) {
            $cargo = $user->funcionarios[0]->cargo;
            $categoria = $cargo->categoria;

            $cargos = $this->Cargos->find('list', ['keyField' => 'id', 'valueField' => 'nome']);

            $this->set(compact('user', 'cargo', 'cargos', 'categoria'));
        } else {
            $this->set(compact('user'));
        }
    }


    public function esqueciSenha()
    {
        $this->loadModel('Users');
        $user = $this->Users->newEntity();
        if (!empty($this->request->getData())) {

            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($user = $this->Users->findByEmail($this->request->getData(['email']))->toArray()) {
                    $this->getMailer('User')->send('recovery', [$user]);
                    $this->Flash->success(__('Enviamos um e-mail de recuperação. Acesse sua caixa de mensagens e clique no link de recuperação.'));
                } else {
                    $this->Flash->error(__('Este e-mail não possui cadastro.'));
                }
            }
        }
        $this->set(compact('user'));
    }




    public function dashboard($id = null)
    {

        $this->loadModel('Empresas');
        $this->loadModel('Equipamentos');
        $this->loadModel('Categorias');
        $this->loadModel('Cargos');
        $this->loadModel('Funcionarios');
        $this->loadModel('Users');
        $this->loadModel('Roles');
        $this->loadModel('PontosHoras');

        $usuario_logado = $this->Auth->user();
        $empresa_id = $usuario_logado['funcionarios'][0]['empresa']['id'];

        $url_empresa_id = $this->request->getParam('pass')[0];

        if ($empresa_id != $url_empresa_id) {
            $this->Flash->error(__('Você não está vinculado a essa empresa!'));
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard', $empresa_id]);
        }

        $empresa = $this->Empresas->get($id, [
            'contain' => [],
        ]);

        $quantidadeEquipamentos = $this->Equipamentos->find()->where(['empresa_id' => $empresa_id])->count();
        $quantidadeCategorias = $this->Categorias->find()->where(['empresa_id' => $empresa_id])->count();
        $quantidadeCargos = $this->Cargos->find()->where(['empresa_id' => $empresa_id])->count();
        $quantidadeFuncionarios = $this->Funcionarios->find()->where(['empresa_id' => $empresa_id])->count();

        $funcionarios_grafico = $this->ListaFuncionarios->ListaFuncionariosGrafico($id);

        $current_user = $this->Users->get($this->current_user['id'], [
            'contain' => ['Roles'] // Inclua a tabela "Roles" como uma tabela associada
        ]);

        $descricaoRole = $current_user->role->descricao;
        // debug( $descricaoRole ); exit;

        if ($this->current_user['role_id'] == 2) {
            $this->paginate = [
                'contain' => ['Roles'],
                'conditions' => ['Users.role_id' => 4],
                'limit' => 3
            ];
        } else {
            $this->paginate = [
                'contain' => ['Roles'],
                'limit' => 3
            ];
        }

        //teste
        if ($this->current_user['role_id'] == 3) {
            $conditions = [];

            if ($this->request->getQuery('data_ponto') != '') {
                $data = $this->request->getQuery('data_ponto');
                $data_formatada = DateTime::createFromFormat('d/m/Y', $data);

                if ($data_formatada) {
                    $data_formatada_clone = clone $data_formatada;

                    $d1 = $data_formatada_clone->modify('-1 day')->format('Y-m-d');
                    $d2 = $data_formatada_clone->modify('-1 day')->format('Y-m-d');
                    $d3 = $data_formatada_clone->modify('-1 day')->format('Y-m-d');
                    $d4 = $data_formatada_clone->modify('-1 day')->format('Y-m-d');
                    $data_formatada = $data_formatada->format('Y-m-d');

                    $conditions['data_ponto IN'] = [$d4, $d3, $d2, $d1, $data_formatada];
                }
            }




            $funcionario = $this->Funcionarios->find('all', ['conditions' => ['user_id' => $this->Auth->user('id')], 'limit' => 1])->first();

            if ($funcionario) {
                $conditions['funcionario_id'] = $funcionario->id;
            }

            $pontos = $this->PontosHoras->find('all', ['conditions' => $conditions]);


            foreach ($pontos as $ponto) {
                $data = $ponto->data_ponto->format('d/m/Y');

                $pontos_dias[$data][] = [
                    'data' => $ponto->data_ponto->format('Y-m-d'),
                    'hora' => $ponto->hora->format('H:i:s')
                ];
            }

            if (!empty($pontos_dias)) {
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
                        $total = sprintf("%02d:%02d", $horas, $minutos);

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
            } else {
                $pontos_dias = '';
            }




            $this->set(compact('pontos', 'pontos_dias'));
        }
        $users = $this->paginate($this->Users);
        $roles = $this->Users->Roles->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $this->set(compact('users', 'roles', 'empresa', 'funcionarios_grafico', 'quantidadeEquipamentos', 'quantidadeCategorias', 'quantidadeCargos', 'quantidadeFuncionarios', 'descricaoRole'));
    }

    public function sair()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function redefinirSenha()
    {
        $q_hash = $this->request->getQuery('h');
        $q_email = $this->request->getQuery('email');

        $user = $this->Users->newEntity();
        if ($this->request->is(['post', 'put'])) {
            $user = $this->Users->get($this->request->data['id']);
            $user = $this->Users->patchEntity($user, $this->request->data);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Senha alterada com sucesso!'));
                return $this->redirect(['action' => 'login']);
            }

            $this->Flash->error(__('Não foi possivel alterar sua senha, tente novamente!'));
        } else {
            if ($user = $this->Users->findByEmail($q_email)->toArray()) {
                $hash = substr($user[0]['password'], 0, 25);
                if ($hash == $q_hash) {
                    $msg = 'Alterar senha do email: ' . $q_email;
                    $this->Flash->set($msg);
                } else {
                    $msg = 'Você não tem permissão para alterar essa senha!';
                    $this->Flash->set($msg);
                    $this->redirect(array('action' => 'rememberPassword'));
                }
            }
        }
        $this->set('id', $user[0]['id']);
        $this->set(compact('user'));
    }
}
