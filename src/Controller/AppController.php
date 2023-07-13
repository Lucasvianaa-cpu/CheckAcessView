<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{

    
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

    //! Usuário faz login é capturado os dados do usuário e atribuito a váriavel $current_user
    public function beforeFilter(Event $event)
    {
        $current_user = $this->Auth->user();
        $this->set('current_user', $current_user);
    }
}
