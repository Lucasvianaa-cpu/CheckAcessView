<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario[]|\Cake\Collection\CollectionInterface $funcionarios
 */
?>

<div class="container-fluid py-4 px-5">
  <div class="row">
    <div class="col-12">
      <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
          <div class="d-sm-flex align-items-center justify-content-between">
            <div>
              <h6 class="font-weight-semibold text-lg mb-0">Funcionários</h6>
              <p class="text-sm">Estes são os usuários que foram vinculados...</p>
            </div>

            <div style="text-align: right;">
              <a class="nav-link " href="<?= $this->Url->build(['controller' => 'Funcionarios', 'action' => 'add']) ?>" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" class="ionicon" viewBox="0 0 512 512">
                  <path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M256 176v160M336 256H176" />
                </svg>
                <span class="nav-link-text ms-1">Vincular Usuário</span>
              </a>
            </div>


          </div>
        </div>
        <div class="card-body px-0 py-0">
          <div class="border-bottom py-3 px-3 align-items-center">

            <?php echo $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3','filtro']); ?>
              
                <div class="col-5">
                    <?= $this->Form->control('nome', ['class' => 'form-control', 'label' => 'Busque pelo nome:', 'default' => $this->request->getQuery('nome'), 'placeholder' => 'Digite o nome']); ?>
                </div>
                <div class="col-5">
                    <?= $this->Form->control('cargo', ['class' => 'form-control', 'label' => 'Busque pelo cargo:', 'default' => $this->request->getQuery('cargo'), 'placeholder' => 'Digite o cargo']); ?>
                </div>

                
                  <button type="submit" class="btn btn-sm btn-dark col-2" style="margin-top: 46px; height: 40px;">
                    <b>Buscar </b>&nbsp;<i class="fa-solid fa-magnifying-glass text-white"></i>
                  </button>
                
               
                  
               
             
            
            <?php echo $this->Form->end(); ?>
            </div>

          </div>
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead class="bg-gray-100">
                <tr>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Nome</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7">Salário</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Cargo</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Empresa</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Plano De Saúde</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Ativo</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($funcionarios as $funcionario) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex align-items-center">
                        </div>
                        <div class="d-flex flex-column justify-content-center ms-1">
                          <h6 class="mb-0 text-sm font-weight-semibold"> <?= $funcionario->user->nome ?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $funcionario->salario ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $funcionario->cargo->nome ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $funcionario->empresa->razao_social ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $funcionario->planos_saude->nome ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $funcionario->is_active == 1 ? 'Sim' : 'Não' ?></p>
                    </td>

                    
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>



          </div>

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
        </div>
      </div>
    </footer>
  </div>