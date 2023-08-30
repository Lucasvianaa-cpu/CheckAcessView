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
      <hr class="my-0">
      <div class="row">
        
      </div>
      <div class="row my-4">
        <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
          <div class="card shadow-xs border h-100">
            <div class="card-header pb-0">
              <h6 class="font-weight-semibold text-lg mb-2">Minha Empresa</h6>
              <hr class="my-0 mb-3">
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pt-0 pb-1 text-sm">
                    <span class="text-secondary">Razão Social:</span> &nbsp; <?= $empresa->razao_social ?> </li>
                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span
                        class="text-secondary">Nome Fantasia:</span> &nbsp; <?= $empresa->nome_fantasia ?></li>
                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span
                    class="text-secondary">CNPJ:</span> &nbsp; <?= $empresa->cnpj ?>
                </li>
                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span
                    class="text-secondary">IE:</span> &nbsp;
                <?= $empresa->ie ?></li>
                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span
                    class="text-secondary">Descrição da Empresa:</span> &nbsp;
                <?= $empresa->desc_empresa ?></li>
                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span
                        class="text-secondary">Telefone:</span> &nbsp; <?= $empresa->telefone ?></li>
                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm"><span
                    class="text-secondary">Quantidade de Funcionários:</span> &nbsp; <?= $empresa->qtd_funcionarios ?>
                </li>
              </ul>
              
            </div>
          
          </div>
        </div>

        <!-- SOMENTE RH-->
      <?php if($current_user['role_id'] == 2) : ?>
        <div class="col-lg-8 col-md-6">
          <div class="card shadow-xs border">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center mb-3">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Usuários Pendentes</h6>
                  <p class="text-sm mb-sm-0 mb-2">Estes são os novos registros, defina as permissões para cada um deles</p>
                </div>
                <div class="ms-auto d-flex">
                  <a class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0" href="<?= $this->Url->build(['controller' => 'Admin/Rh', 'action' => 'index']); ?>">Definir Permissões</a>
                </div>
              </div>
              <div class="pb-3 d-sm-flex align-items-center">
              </div>
            </div>
            <div class="card-body px-0 py-0">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7">Nome</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Data Cadastro</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Permissão</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($users as $user): ?>
                      <tr>
                        <td>
                          <div class="d-flex px-2">
                            <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                              <?php if (!empty($user->caminho_foto)): ?>
                                <?= $this->Html->image($user->caminho_foto, [
                                    'width' => '40px', 
                                    'height' => 'auto', 
                                ]); ?>
                              <?php else: ?>
                                <?= $this->Html->image('perfil.png', [
                                    'width' => '40px', 
                                    'height' => 'auto', 
                                ]); ?>
                              <?php endif;?>
                            </div>
                            <div class="my-auto">
                              <h6 class="mb-0 text-sm font-weight-semibold">  <?= $user->nome ?></h6>
                            </div>
                          </div>
                        </td>
                        <td>
                        <p class="text-sm text-dark font-weight-semibold mb-0"><?= $user->created->format('d/m/Y') ?></p>
                        </td>
                        <td>
                        <p class="text-sm text-dark font-weight-semibold mb-0"><?= $user->role->descricao ?></p>
                        </td>
                        
                      </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
                <div class="text-center mx-3 d-flex flex-row align-items-center justify-content-between m-2">
                    <p class="font-weight-semibold mb-0 text-dark text-sm"><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}')]) ?></p>
                    <ul class="pagination d-flex align-items-center">
                        <span aria-hidden="true" class="border rounded-2 p-2 mx-1 bg-dark d-flex align-items-center" style="height: 30px"><?= $this->Paginator->prev('' . __('<span class="text-white" style="font-size: 20px">&laquo;</span>'), ['escape' => false, 'class' => 'prev']) ?></span>
                        <span aria-hidden="true" class="border rounded-2 p-2 bg-dark d-flex align-items-center" style="height: 30px"><?= $this->Paginator->next(__('<span class="text-white" style="font-size: 20px">&raquo;</span>') . ' ', ['escape' => false, 'class' => 'next']) ?></span>             
                    </ul>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <!-- SOMENTE ADMIN-->
    <?php if($current_user['role_id'] == 1) : ?>
        <div class="col-lg-8 col-md-6">
          <div class="card shadow-xs border">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center mb-3">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Usuários Cadastrados</h6>
                  <p class="text-sm mb-sm-0 mb-2">Estes são os usuários cadastrados</p>
                </div>
                <div class="ms-auto d-flex">
                <a class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']); ?>">Visualizar Usuários</a>
                </div>
              </div>
              <div class="pb-3 d-sm-flex align-items-center">
            </div>
            <div class="card-body px-0 py-0">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7">Nome</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">CPF</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Permissão</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Ativo?</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($users as $user): ?>
                      <tr>
                        <td>
                          <div class="d-flex px-2">
                            <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                              <?= $this->Html->image('perfil.png', [
                                    'url' => ['controller' => 'img', 'action' => 'perfil.png'],
                                    'width' => '40px', 
                                    'height' => 'auto', 
                                ]); ?>
                            </div>
                            <div class="my-auto">
                              <h6 class="mb-0 text-sm font-weight-semibold">  <?= $user->nome ?></h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-sm text-dark font-weight-semibold mb-0"><?= $user->cpf == '' ? '--' : $user->cpf ?></p>
                        </td>
                        <td>
                          <p class="text-sm text-dark font-weight-semibold mb-0"><?=$user->role->descricao ?></p>
                        </td>
                        <td>
                        <p class="text-sm text-dark font-weight-semibold mb-0"><?= $user->is_active == 1 ? 'Sim' : 'Não' ?></p>
                        </td>
                      </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
                <div class="text-center mx-3 d-flex flex-row align-items-center justify-content-between m-2">
                    <p class="font-weight-semibold mb-0 text-dark text-sm"><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}')]) ?></p>
                    <ul class="pagination d-flex align-items-center">
                        <span aria-hidden="true" class="border rounded-2 p-2 mx-1 bg-dark d-flex align-items-center" style="height: 30px"><?= $this->Paginator->prev('' . __('<span class="text-white" style="font-size: 20px">&laquo;</span>'), ['escape' => false, 'class' => 'prev']) ?></span>
                        <span aria-hidden="true" class="border rounded-2 p-2 bg-dark d-flex align-items-center" style="height: 30px"><?= $this->Paginator->next(__('<span class="text-white" style="font-size: 20px">&raquo;</span>') . ' ', ['escape' => false, 'class' => 'next']) ?></span>             
                    </ul>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php endif; ?>
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 border-top-5 mt-4">
          <div class="card border shadow-xs mb-4 border-top-5">
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
                    <p class="text-sm text-secondary mb-1">Equipamentos</p>
                    <h4 class="mb-2 font-weight-bold"><?= $quantidadeEquipamentos ?></h4>
                    <div class="d-flex align-items-center">
                      <span class="text-sm text-success font-weight-bolder">
                        <i class="fa fa-chevron-up text-xs me-1"></i>
                      </span>
                      <span class="text-sm ms-1">Equipamentos Cadastrados</span>
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
                    <p class="text-sm text-secondary mb-1">Categorias</p>
                    <h4 class="mb-2 font-weight-bold"><?= $quantidadeCategorias ?></h4>
                    <div class="d-flex align-items-center">
                      <span class="text-sm text-success font-weight-bolder">
                        <i class="fa fa-chevron-up text-xs me-1"></i>
                      </span>
                      <span class="text-sm ms-1">Categorias Cadastradas</span>
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
                  <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h12a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm4.5 7.5a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0v-2.25a.75.75 0 01.75-.75zm3.75-1.5a.75.75 0 00-1.5 0v4.5a.75.75 0 001.5 0V12zm2.25-3a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0V9.75A.75.75 0 0113.5 9zm3.75-1.5a.75.75 0 00-1.5 0v9a.75.75 0 001.5 0v-9z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Cargos</p>
                    <h4 class="mb-2 font-weight-bold"><?= $quantidadeCargos ?></h4>
                    <div class="d-flex align-items-center">
                      <span class="text-sm text-success font-weight-bolder">
                        <i class="fa fa-chevron-up text-xs me-1"></i>
                      </span>
                      <span class="text-sm ms-1">Cargos Cadastrados</span>
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
                  <path fill-rule="evenodd" d="M5.25 2.25a3 3 0 00-3 3v4.318a3 3 0 00.879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 005.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 00-2.122-.879H5.25zM6.375 7.5a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">Funcionários</p>
                    <h4 class="mb-2 font-weight-bold"><?= $quantidadeFuncionarios ?></h4>
                    <div class="d-flex align-items-center">
                      <span class="text-sm text-success font-weight-bolder">
                        <i class="fa fa-chevron-up text-xs me-1"></i>
                      </span>
                      <span class="text-sm ms-1">Funcionários da Empresa</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
                <div class="container">
    <div class="row my-3">
        <div class="col">
            <h4>Funcionários registrados por mês:</h4>
        </div>
    </div>
    <div class=" my-2">
        <div class="col-md-12 py-1">
            <div class="card">
                <div class="card-body">
                <div id="chart"></div>
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
                Jaine Oliveira e Lucas Viana.
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
    </footer>

    <script>
    // Dados do gráfico
    var funcionariosData = <?php echo json_encode(array_values($funcionarios_grafico)); ?>;
    var months = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];

    // Mapear os dados para o formato esperado pelo ApexCharts
    var chartData = months.map((month, index) => ({
      x: month,
      y: funcionariosData[index]
    }));

    // Configurações do gráfico
    var options = {
      chart: {
        type: 'line',
        height: 450
      },
      series: [{
        name: 'Funcionários',
        data: chartData
      }],
      xaxis: {
        categories: months
      }
    };

    // Inicializar o gráfico
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
  </script>

    
</body>

</html>