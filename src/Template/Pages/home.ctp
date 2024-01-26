<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Helper\HtmlHelper;


?>

<?php if($current_user['role_id'] == 4) : ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        CheckAcessView
    </title>

    <!-- Favicon -->
    <?= $this->Html->meta('icon') ?>

    <!-- Inclui estes aqui -->
    <?= $this->Html->css('corporate-ui-dashboard.css?v=1.0.0') ?>
    <?= $this->Html->css('corporate-ui-dashboard.css.map') ?>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,
    400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body class="g-sidenav-show  bg-gray-100">

    <div class="container-fluid py-4 px-5">
      <div class="row">
        <div class="col-md-12">
          <div class="d-md-flex align-items-center mb-3 mx-2">
            <div class="mb-md-0 mb-3">
              <h3 class="font-weight-bold mb-0">Bem-vindo(a), <?= $current_user['nome'] ?>!</h3>
              <p class="mb-0">CheckAcessView</p>
            </div>
            
          </div>
        </div>
      </div>
      <hr class="my-0 mb-2">
      
        <div class="card border shadow-xs h-1000 p-3 ">
            <p class="mb-0">Aguarde o RH definir suas permissões de acesso...</p>
            <p class="mb-0">Caro usuário... após 60 segundos de conexão, você será redirecionado para a tela de login!!</p>
        </div>
      
      
  </div>

  <?= $this->Flash->render() ?>
    <div>
        <?= $this->fetch('content') ?>
    </div>


    <footer>
        <?= $this->Html->script('popper.min.js'); ?>
        <?= $this->Html->script('bootstrap.min.js'); ?>
        <?= $this->Html->script('perfect-scrollbar.min.js'); ?>
        <?= $this->Html->script('smooth-scrollbar.min.js'); ?>
        <?= $this->Html->script('chartjs.min.js'); ?>
        <?= $this->Html->script('swiper-bundle.min.js'); ?>
        <?= $this->Html->script('buttons.js'); ?>
        <?= $this->Html->script('corporate-ui-dashboard.min.js?v=1.0.0'); ?>
    </footer>

    
</body>

</html>
<?php endif;?>

<script>
    setTimeout(function(){
        // Redireciona para a página de login
        window.location.href = '/login';
    }, 60000); 
</script> 