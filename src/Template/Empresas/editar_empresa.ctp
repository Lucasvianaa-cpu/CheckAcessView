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
                <a class="nav-link text-white p-0  " href="<?= $this->Url->build(['action' => 'visualizarEmpresa', $current_user['id']]); ?>">
                  Minha Empresa
                </a>
              </li>
                <li class="nav-item border-radius-sm px-3 py-3 me-2 bg-slate-800 d-flex align-items-center">
                  <a class="nav-link text-white p-0  " href="<?= $this->Url->build(['action' => 'editarEmpresa', $current_user['id']]); ?>">
                      Editar Dados Empresa
                  </a>
                </li>
            </ul>
        </div>
      </div>
    </nav>
    <!-- End Sidenav Top -->
    <div class="pt-7 pb-6 bg-cover" style="background-image: url('<?= $this->Url->image('header-orange-purple.jpg', ['controller' => 'img', 'action' => 'header-orange-purple.jpg']); ?>'); background-position: bottom;"></div>
    <div class="container">
      <div class="card card-body py-2 bg-transparent shadow-none">
        <div class="row">
          <div class="col-auto">
            <div class="avatar avatar-2xl rounded-circle position-relative mt-n7 border border-gray-100 border-4">
              <?= $this->Html->image('perfil.png', ['url' => ['controller' => 'img', 'action' => 'perfil.png']]); ?>
            </div>
          </div>
          <div class="col-auto my-auto">
          <div class="h-100">
            <h3 class="mb-0 font-weight-bold">
                <?= $empresa->razao_social ?>
            </h3>
            <p class="mb-0">
                <?= $empresa->cnpj ?>
            </p>
          </div>
          </div>
        </div>
      </div>
    </div>
    