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
        <?php if ($current_user['role_id'] != 4): ?>
          <ul class="navbar-nav d-none d-lg-flex">
            <li class="nav-item px-3 py-3 border-radius-sm  d-flex align-items-center">
                <a href="<?= str_replace('/admin', '', $this->Url->build(['controller' => 'Users', 'action' => 'dashboard', $funcionario_empresa['funcionarios'][0]['empresa_id']])); ?>" class="nav-link text-white p-0">
                  Dashboard
                </a>
              </li>
        <?php endif;?>
          <!--CONVIDADO-->
          <?php if($current_user['role_id'] == 4) : ?>
            <li class="nav-item px-3 py-3 border-radius-sm  d-flex align-items-center">
              <a href="<?= str_replace('/admin', '', $this->Url->build('/', ['controller' => 'Pages', 'action' => 'display', 'home'])); ?>" class="nav-link text-white p-0">
                Dashboard
              </a>
            </li>
          <?php endif;?>

        </ul>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav ms-md-auto  justify-content-end">
            
            <li class="nav-item d-flex align-items-center ps-2">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <div class="avatar avatar-sm position-relative">
                <?= $this->Html->image($user->caminho_foto, ['style' => 'border-radius: 15px;']); ?>
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
            <div class="avatar avatar-2xl rounded-circle position-relative mt-n7 border border-gray-100 border-4">
            <?= $this->Html->image($user->caminho_foto, ['style' => 'min-height: 155px;']); ?>
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
    <div class="container my-2 py-3">
        <div class="col-12 mb-4">
          <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 col-9">
                  <h6 class="mb-0 font-weight-semibold text-lg">Editar Perfil</h6>
                  <p class="text-sm mb-1">Insira seus dados para alteração</p>
                </div>
                <div class="">
                  <?= $this->Form->create($user, ['class'=> 'row g-3', 'type' => 'file']) ?>
                    <div class="col-8">
                      <?= $this->Form->control('nome', ['type' => 'text', 'label' => 'Nome', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite seu nome']); ?>
                    </div>
                    <div class="col-lg-4">
                      <?= $this->Form->control('caminho_foto', ['type' => 'file', 'class' => 'form-control']) ?>
                    </div>
                    <div class="col-md-6">
                      <?= $this->Form->control('cpf', ['type' => 'text', 'label' => 'CPF', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite seu cpf']); ?>
                    </div>
                    <div class="col-md-6">
                      <?= $this->Form->control('rg', ['type' => 'text', 'label' => 'RG', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite seu rg']); ?>
                    </div>
                    <div class="col-12">
                      <?= $this->Form->control('email', ['type' => 'email','label' => 'E-mail Pessoal', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite seu e-mail' ]); ?>  
                    </div>
                    <div class="col-12">
                      <?= $this->Form->control('email_empresarial', ['type' => 'email','label' => 'E-mail Empresarial', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite seu e-mail empresarial' ]); ?>  
                    </div>

                    <div class="col-md-4">
                      <?= $this->Form->control('cep', ['type' => 'text','label' => 'CEP', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite seu cep', 'default' => $endereco_perfil ? $endereco_perfil->cep : '']); ?>  
                    </div>
                    <div class="col-md-6">
                      <?= $this->Form->control('cidade_id', ['type' => 'select','label' => 'Cidade', 'options' => $cidades, 'class' => 'form-select', 'required' => 'required', 'placeholder' => 'Digite a cidade', 'empty' => 'Selecione', 'default' => $endereco_perfil ? $endereco_perfil->cidade->id : '' ]); ?>  
                    </div>
                    <div class="col-md-2">
                    <?= $this->Form->control('estado_id', ['type' => 'select','label' => 'Estado', 'empty' => 'Selecione', 'options' => $estados, 'class' => 'form-select', 'required' => 'required', 'placeholder' => 'Digite o Estado', 'default' => $endereco_perfil ? $endereco_perfil->cidade->estado->id : '']); ?>  
                    </div>
      
                    <div class="col-md-6">
                      <?= $this->Form->control('rua', ['type' => 'text','label' => 'Endereço', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o endereço','default'=> $endereco_perfil ? $endereco_perfil->rua : '' ]); ?>  
                    </div>
                    <div class="col-md-4">
                      <?= $this->Form->control('bairro', ['type' => 'text','label' => 'Bairro', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o bairro', 'default'=> $endereco_perfil ? $endereco_perfil->bairro : '' ]); ?>  
                    </div>
                    <div class="col-md-2">
                      <?= $this->Form->control('numero', ['type' => 'text','label' => 'Número', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o número', 'default'=> $endereco_perfil ? $endereco_perfil->numero : '']); ?>  
                    </div>

                    <div class="col-md-6">
                      <?= $this->Form->control('telefone', ['type' => 'text','label' => 'Telefone', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o telefone' ]); ?>  
                    </div>
                    <div class="col-md-6">
                      <label for="inputDataNascimento" class="form-label">Data de Nascimento</label>
                      <input type="date" class="form-control" id="inputDataNascimento" placeholder="DD/MM/YYYY">
                    </div>
                    <div class="col-md-2">
                      <?= $this->Form->control('tipo_sanguineo', ['type' => 'text','label' => 'Tipo Sanguíneo', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ex: O+' ]); ?>  
                    </div>

                    <div class="col-md-10">
                      <?= $this->Form->control('exp_profissional', ['type' => 'text','label' => 'Experiência profissional', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Faça um resumo de suas experiências profissionais...' ]); ?>                        
                    </div>

                    <div class="col-md-12">
                      <?= $this->Form->control('n_carteira_trabalho', ['type' => 'text','label' => 'Nº Carteira de Trabalho', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o número da carteira de trabalho' ]); ?>
                    </div>

                    <div class="col-md-4">
                      <?= $this->Form->control('agencia', ['type' => 'text','label' => 'Agência', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o número da agência bancária' ]); ?> 
                    </div>

                    <div class="col-md-4">
                      <?= $this->Form->control('conta', ['type' => 'text','label' => 'Conta', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o número da conta bancária' ]); ?>  
                    </div>

                    <div class="col-md-4">
                      <?= $this->Form->control('codigo_banco', ['type' => 'text','label' => 'Código Banco', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o código do banco' ]); ?> 
                    </div>

                    <div class="col-md-4">
                      <?= $this->Form->control('pix', ['type' => 'text','label' => 'PIX', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a sua chave PIX' ]); ?> 
                    </div>

                    <div class="col-md-6">
                      <?= $this->Form->control('uid_rfid', ['type' => 'text','label' => 'Tag RFID', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a tag RFID' ]); ?>   
                    </div>

                    <div class="col-2 checkbox-input">
                                <label for="" class="form-label"></label>
                                <div class="form-check mt-2">
                                    <?= $this->Form->control('realiza_plantao', ['type' => 'checkbox', 'label' => 'Ativo', 'class' => 'form-check-input']); ?>
                                </div>
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