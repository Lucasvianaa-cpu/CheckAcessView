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
              <?php if (!empty($empresa->caminho_foto)): ?>
              <?= $this->Html->image($empresa->caminho_foto, [
                                    'width' => '50px', 
                                    'height' => 'auto', 
                                    'style' => 'border-radius: 25px;'
                                ]); ?>
            
              <?php else: ?>
                <?= $this->Html->image('perfil.png', [
                                        'width' => '40px', 
                                        'height' => 'auto', 
                                    ]); ?>
             <?php endif;?>
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
                <a class="nav-link text-white p-0  " href="<?= str_replace('/admin', '',  $this->Url->build(['controller'=>'Empresas','action' => 'visualizarEmpresa', $funcionario_empresa['funcionarios'][0]['empresa_id']])); ?>">
                  Minha Empresa
                </a>
              </li>
                <li class="nav-item border-radius-sm px-3 py-3 me-2 bg-slate-800 d-flex align-items-center">
                  <a class="nav-link text-white p-0  " href="<?= str_replace('/admin', '',  $this->Url->build(['controller'=>'Empresas','action' => 'editarEmpresa', $funcionario_empresa['funcionarios'][0]['empresa_id']])); ?>">
                      Editar Dados Empresa
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
            <div class="avatar avatar-2xl rounded-circle position-relative mt-n7 border border-gray-100 border-4">
            <?php if (!empty($empresa->caminho_foto)): ?>
              <?= $this->Html->image($empresa->caminho_foto, ['style' => 'min-height: 155px; max-height: 155px;']); ?>
            
            <?php else: ?>
              <?= $this->Html->image('perfil.png', ['style' => 'min-height: 155px; max-height: 155px;']); ?>
            <?php endif;?>
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

    <div class="container my-2 py-3">
        <div class="col-12 mb-4">
          <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 col-9">
                  <h6 class="mb-0 font-weight-semibold text-lg">Editar Empresa</h6>
                  <p class="text-sm mb-1">Insira os dados para alteração</p>
                </div>
                <div class="">
                  <?= $this->Form->create($empresa, ['class'=> 'row g-3', 'type' => 'file']) ?>
                    <div class="col-8">
                      <?= $this->Form->control('razao_social', ['type' => 'text', 'label' => 'Razão Social', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a Razão Social']); ?>
                    </div>
                    <div class="col-lg-4">
                      <?= $this->Form->control('caminho_foto', ['type' => 'file', 'class' => 'form-control']) ?>
                    </div>
                    <div class="col-md-12">
                      <?= $this->Form->control('nome_fantasia', ['type' => 'text', 'label' => 'Nome Fantasia', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o Nome Fantasia']); ?>
                    </div>
                    <div class="col-md-6">
                      <?= $this->Form->control('cnpj', ['type' => 'text', 'label' => 'CNPJ', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o CNPJ']); ?>
                    </div>
                    <div class="col-6">
                      <?= $this->Form->control('ie', ['type' => 'text','label' => 'IE', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a Inscrição Estadual' ]); ?>  
                    </div>

                    <div class="col-md-3">
                      <?= $this->Form->control('cep', ['type' => 'text','label' => 'CEP', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite seu cep' ]); ?>  
                    </div>
                    <div class="col-md-9">
                      <?= $this->Form->control('endereco', ['type' => 'text','label' => 'Rua', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a rua' ]); ?>
                    </div>
      
                    <div class="col-md-4">
                      <?= $this->Form->control('bairro', ['type' => 'text','label' => 'Bairro', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o bairro' ]); ?>
                    </div>
                    <div class="col-md-2">
                      <?= $this->Form->control('numero', ['type' => 'text','label' => 'Número', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o número' ]); ?>  
                    </div>

                    <div class="col-md-6">
                      <?= $this->Form->control('telefone', ['type' => 'text','label' => 'Telefone', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o telefone' ]); ?>  
                    </div>

                    <div class="col-md-4 mb-2">
                      <?= $this->Form->control('qtd_funcionarios', ['type' => 'text','label' => 'Qtd. Funcionários', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a Quantidade' ]); ?>  
                    </div>

                    <div class="col-md-8">
                      <?= $this->Form->control('desc_empresa', ['type' => 'text','label' => 'Descrição', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Me conte mais sobre essa empresa...' ]); ?>                        
                    </div>

                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 text-sm-end">
                      
                      <?= $this->Form->button(__('Enviar'), ['class'=> 'btn btn-sm btn-dark']) ?>
                      <a class="btn btn-sm btn-white" href="<?= $this->Url->build(['action' => 'index']); ?>">Cancelar</a>
                    </div>
                  <?= $this->Form->end() ?>
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
    