<?php

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;


Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true,
    ]));

    $routes->prefix('login', function ($routes) {
        $routes->applyMiddleware('csrf');
    });

    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/rh/alterar-permissao', ['controller' => 'Rh', 'action' => 'alterarPermissao']);
    $routes->connect('/rh/pendentes', ['controller' => 'Rh', 'action' => 'index']);
    Router::connect('/pontos-horas/add-rfid', ['controller' => 'PontosHoras', 'action' => 'addRfid']);
    
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

   
    $routes->fallbacks(DashedRoute::class);
});



