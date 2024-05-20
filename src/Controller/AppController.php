<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\Query;

class AppController extends Controller
{

    // Chama os Helpers Criados
    public $helpers = [
        'Form' => [
            'className' => 'Form2'
        ]
    ];
    
    public function initialize()
    {
        parent::initialize();
        

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        //! Sistema de Login
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
                    'userModel' => 'Users'
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ],
            'storage' => 'Session',
            'authorize' => 'Controller'
        ]);
        
    }
    
    public function isAuthorized($user)
    {
        return true;
    }

    public function removerAcentos($str) {
        $acentos = array('á', 'à', 'â', 'ã', 'é', 'è', 'ê', 'í', 'ì', 'î', 'ó', 'ò', 'ô', 'õ', 'ú', 'ù', 'û', 'ç', 'Á', 'À', 'Â', 'Ã', 'É', 'È', 'Ê', 'Í', 'Ì', 'Î', 'Ó', 'Ò', 'Ô', 'Õ', 'Ú', 'Ù', 'Û', 'Ç');
        $semAcentos = array('a', 'a', 'a', 'a', 'e', 'e', 'e', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'c', 'A', 'A', 'A', 'A', 'E', 'E', 'E', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'C');
        $str = str_replace($acentos, $semAcentos, $str);
        return $str;
    }

    //! Usuário faz login é capturado os dados do usuário e atribuito a váriavel $current_user
    public function beforeFilter(Event $event)
    {
        $this->loadModel('Users');
        
        $current_user = $this->Auth->user();
        $this->set('current_user', $current_user);

        $funcionario_empresa = $this->Auth->user();


        if ($funcionario_empresa) {
            $this->loadModel('Users');

            // Cria uma nova query contendo os dados do usuário e a tabela funcionarios
            $query = $this->Users->find('all')
                ->where(['Users.id' => $funcionario_empresa['id']])
                ->contain(['Funcionarios']);

            // Executa a consulta e obtém os dados do usuário e a tabela funcionarios
            $userWithFuncionarios = $query->first();

            // Define o resultado na view para acessá-lo na view
            $this->set('funcionario_empresa', $userWithFuncionarios);
        } else {
            // Se não houver usuário autenticado, define o valor como null na view
            $this->set('funcionario_empresa', null);
        }
       
    }
}
