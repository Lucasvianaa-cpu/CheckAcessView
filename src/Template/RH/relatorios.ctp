<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    CheckAcessView
  </title>

  <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.28.3/dist/apexcharts.min.js"></script>


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
    <nav aria-label="breadcrumb" style="margin-bottom: 20px; margin-top: -50px;">
      <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'dashboard', $funcionario_empresa['funcionarios'][0]['empresa_id']]); ?>">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Meus Relatórios</li>
      </ol>
    </nav>
    <div class="row">
      <div class="col-md-12">
        <div class="d-md-flex align-items-center mb-3 mx-2">
          <div class="mb-md-0 mb-3">
            <h3 class="font-weight-bold mb-0">Acesse aqui todos seus relatórios, <?= $current_user['nome'] ?>!</h3>
            <p class="mb-0">Relatórios</p>
          </div>

        </div>
      </div>
    </div>
    <hr class="my-0">
    <div class="row">

    </div>


    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 border-top-5 mt-4">
        <div class="card border shadow-xs mb-4">
          <div class="card-body text-start p-3 w-100">
            <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
              <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
                <path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="w-100">
                  <p class="text-sm text-secondary mb-1">Total De Horas Mensais</p>
                  <h4 class="mb-2 font-weight-bold mt-4"><a href="<?= $this->Url->build(['controller' => 'PontosHoras', 'action' => 'totalFuncionarios']) ?>" class="btn btn-dark btn-sm">Horas Mensais</a></h4>
                  <div class="d-flex align-items-center">
                    <span class="text-sm text-success font-weight-bolder">
                      <i class="fa fa-chevron-up text-xs me-1"></i>
                    </span>
                    <span class="text-sm ms-1">Funcionarios</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 border-top-5 mt-4">
        <div class="card border shadow-xs mb-4">
          <div class="card-body text-start p-3 w-100">
            <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
              <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd" d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                <path d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z" />
              </svg>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="w-100">
                  <p class="text-sm text-secondary mb-1">Plantões de Funcionários</p>
                  <h4 class="mb-2 font-weight-bold mt-4"><a href="<?= $this->Url->build(['controller' => 'Plantoes', 'action' => 'totalPlantoes']) ?>" class="btn btn-dark btn-sm">Horas Extras</a></h4>
                  <div class="d-flex align-items-center">
                    <span class="text-sm text-success font-weight-bolder">
                      <i class="fa fa-chevron-up text-xs me-1"></i>
                    </span>
                    <span class="text-sm ms-1">Funcionários</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
  <footer class="footer pt-3">
    <div class="container-fluid d-flex justify-content-center">
      <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4 text-center">
          <div class="copyright text-xs text-muted text-lg-start">
            Desenvolvido por Jaine Oliveira e Lucas Viana - Copyright © <script>
              document.write(new Date().getFullYear())
            </script>
          </div>
        </div>
      </div>
    </div>
  </footer>
  </div>
  </main>

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

    <?= $this->Html->script('sweetalert2.all.min.js'); ?>

    <!-- Mensagens de Sucesso/Erro -->
    <?= $this->element('alertas/mensagem'); ?>
  </footer>