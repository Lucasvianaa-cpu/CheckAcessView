<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Helper\HtmlHelper;

$this->layout = false;
?>

<?php if($current_user['role_id'] == 4) : ?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        CheckAcessView
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="home">

<header class="row">
    <div class="header-image"><?= $this->Html->image('logo/3.png') ?></div>
    <div class="header-title">
        <h1>Aguarde o RH definir suas permissões...</h1>
    </div>
     
</header>
    <div>
        <a class="btn btn-sm btn-dark" href="<?= $this->Url->build(['controller' => 'Users','action' => 'sair']) ?>">Sair</a>
    </div>
    
</body>
</html>
<?php endif;?>
