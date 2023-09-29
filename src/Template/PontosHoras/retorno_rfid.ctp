<?php $this->layout = false; ?>


<style>
  /* If you like this, please check my blog at codedgar.com.ve */
  @import url('https://fonts.googleapis.com/css?family=Work+Sans');

  body {
    font-family: 'Work Sans', sans-serif;
    background: #f9fafb;
    background: -webkit-linear-gradient(to right, #adb5bd, #adb5bd);
    background: linear-gradient(to right, #f9fafb, #adb5bd);
  }

  .cardRFID {
    background: #16181a;
    border-radius: 14px;
    max-width: 300px;
    display: block;
    margin: auto;
    padding: 60px;
    padding-left: 20px;
    padding-right: 20px;
    box-shadow: 2px 10px 40px black;
    z-index: 99;
  }

  .card {
    background: #f9fafb;
    border-radius: 14px;
    max-width: 300px;
    display: block;
    margin: auto;
    padding: 60px;
    padding-left: 20px;
    padding-right: 20px;
    box-shadow: 2px 10px 40px black;
    z-index: 99;
  }

  .logo-card {
    max-width: 50px;
    margin-bottom: 15px;
    margin-top: -19px;
  }

  .col {
    width: 50%;
    float: left;
  }
</style>

<div class="container">
  <div class="cardRFID">
    <img src="../img/logo/1.png" class="logo-card">
    <span class="mb-3 font-weight-bold text-lg" style="color: white;">Tag RFID: 0009909291</span>
    <div>
      <span class="mb-3 font-weight-bold text-lg" style="color: white;">Nome: Lucas Viana</span>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
              <div class="card d-flex d-flex flex-column justify-content-center " style="padding-left: 60px; padding-right: 60px;">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-black text-dark">Ponto registrado</h3>
                  <p class="mb-0">Aguarde alguns segundos para voltar a página anterior...</p>
                </div>
                <div class="card-body">

                </div>


                <footer>
                  <?= $this->Html->script('jquery.js'); ?>
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

                </body>


                </html>