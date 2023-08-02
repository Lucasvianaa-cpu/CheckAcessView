<?php $this->layout = false; ?>
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

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Sidenav Top -->
        <nav class="navbar bg-slate-900 navbar-expand-lg flex-wrap top-0 px-0 py-0">
            <div class="container py-2">
                <nav aria-label="breadcrumb">
                    <div class="d-flex align-items-center">
                        <span class="px-3 font-weight-bold text-lg text-white me-4">CheckAcessView</span>
                    </div>
                </nav>
                <ul class="navbar-nav d-none d-lg-flex">
                    <li class="nav-item px-3 py-3 border-radius-sm  d-flex align-items-center">
                        <a href="../" class="nav-link text-white p-0">
                            Dashboard
                        </a>
                    </li>
                </ul>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav ms-md-auto  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">

                        </li>
           
                        <li class="nav-item d-flex align-items-center ps-2">
                            <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <div class="avatar avatar-sm position-relative">
                            <?= $this->Html->image('perfil.png', ['url' => ['controller' => 'img', 'action' => 'perfil.png']]); ?>
                            </div>
                        </li>
                        </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="horizontal w-100 my-0 dark">
            <div class="container pb-3 pt-3">
                <div class="p-0 d-flex">
                    <ul class="navbar-nav list-group-horizontal">
                        <li class="nav-item border-radius-sm px-3 py-3 me-2 bg-slate-800 d-flex align-items-center">
                            <a class="nav-link text-white p-0  " href="<?= $this->Url->build(['action' => 'visualizarPerfil', $current_user['id']]); ?>">
                                Meu Perfil
                            </a>
                        </li>
                        <li class="nav-item border-radius-sm px-3 py-3 me-2 bg-slate-800 d-flex align-items-center">
                            <a class="nav-link text-white p-0  " href="<?= $this->Url->build(['action' => 'editarPerfil', $current_user['id']]); ?>">
                                Editar Perfil
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Sidenav Top -->
        <div class="pt-7 pb-6 bg-cover" style="background-image: url('<?= $this->Url->image('header.png', ['controller' => 'img', 'action' => 'header.png']); ?>'); background-position: bottom;"></div>
        <div class="container">
            <div class="card card-body py-2 bg-transparent shadow-none">
                <div class="row">
                    <div class="col-auto">
                        <div
                            class="avatar avatar-2xl rounded-circle position-relative mt-n7 border border-gray-100 border-4">
                            <?= $this->Html->image('perfil.png', ['url' => ['controller' => 'img', 'action' => 'perfil.png']]); ?>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h3 class="mb-0 font-weight-bold">
                                <?= $user->nome ?>
                            </h3>
                            <p class="mb-0">
                                <?= $user->email ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Corpo-->
        <div class="container my-2 py-3">
            <div class="col-12 mb-4">
                <div class="card border shadow-xs h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 col-9">
                                <h6 class="mb-0 font-weight-semibold text-lg">Minhas Informações</h6>
                                <p class="text-sm mb-1">Um resumo de suas informações...</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pt-0 pb-1 text-sm">
                                <span class="text-secondary">CPF:</span> &nbsp; <?= $user->cpf ?> </li>
                            <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span
                                    class="text-secondary">RG:</span> &nbsp; <?= $user->rg ?></li>
                            <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span
                                    class="text-secondary">Telefone:</span> &nbsp; <?= $user->telefone ?></li>
                            <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span
                                    class="text-secondary">Nº Carteira de Trabalho:</span> &nbsp;
                                <?= $user->n_carteira_trabalho ?></li>
                            <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span
                                    class="text-secondary">E-mail Empresarial:</span> &nbsp;
                                <?= $user->email_empresarial ?></li>
                            <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span
                                    class="text-secondary">Categoria:</span> &nbsp; <?= $user->categoria ?></li>
                            <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span
                                    class="text-secondary">Cargo:</span> &nbsp; <?= $user->cargo ?></li>
                            <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span
                                    class="text-secondary">Realiza Plantão?:</span> &nbsp; <?= $user->realiza_plantao ?>
                            </li>
                            <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span
                                    class="text-secondary">Tag RFID:</span> &nbsp; <?= $user->uid_rfid ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-xs text-muted text-lg-start">
                        Copyright
                        © <script>
                            document.write(new Date().getFullYear())

                        </script>
                        Jaine Oliveira e Lucas Viana
                    </div>
                </div>
    </footer>

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
