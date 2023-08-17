<?php $this->layout = false; ?>

<!DOCTYPE html>
<html lang="pt-br">

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


<body>

  <body class="bg-gray-100">
    <div class="container position-sticky z-index-sticky top-0">
      <div class="row">
        <div class="col-12">
          <!-- End Navbar -->
        </div>
      </div>
    </div>
    <main class="main-content  mt-0">
      <section>
        <div class="page-header min-vh-100">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
                <div class="card d-flex d-flex flex-column justify-content-center " style="padding-left: 60px; padding-right: 60px;">

                  <img src="../img/logo/3.png" class="d-flex  justify-content" alt="...">


                  <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-black text-dark">Redefinição de Senha</h3>
                    <p class="mb-0">Digite seu e-mail para ser enviado um link de redefinição de senha.</p>
                  </div>
                  <div class="card-body">

                    <?= $this->Form->create('', ['class' => '']) ?>

                    <div class="mb-3">
                      <?= $this->Form->control('email', ['label' => 'E-mail', 'type' => 'email', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite seu E-mail']); ?>
                    </div>

                    <div class="text-center">
                      <?= $this->Form->button(__('Enviar E-mail'), ['class' => 'btn btn-dark w-100 mt-4 mb-3']) ?>
                    </div>

                    <?= $this->Form->end(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
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
    </footer>

  </body>

</html>