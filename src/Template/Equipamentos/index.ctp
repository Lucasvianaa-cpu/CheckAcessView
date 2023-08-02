<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipamento[]|\Cake\Collection\CollectionInterface $equipamentos
 */
?>

<div class="container-fluid py-4 px-5">
      <div class="row">
        <div class="col-12">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Equipamentos</h6>
                  <p class="text-sm">Estes são os equipamentos cadastrados em sua empresa...</p>
                </div>
            
                <div style="text-align: right;">
                  <a class="nav-link " href="<?= $this->Url->build(['controller' => 'Equipamentos','action' => 'add']) ?>" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" class="ionicon" viewBox="0 0 512 512">
                      <path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/>
                      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M256 176v160M336 256H176"/>
                    </svg>
                    <span class="nav-link-text ms-1">Adicionar Equipamento</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
              <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
                
                <div class="input-group ms-auto">
                  <span class="input-group-text text-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                    </svg>
                  </span>
                  <input type="text" class="form-control" placeholder="Buscar">
                </div>
              </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7">Nº Patrimônio</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Descrição</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Data de Cadastro</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Ativo</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Funcionário</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($equipamentos as $equipamento): ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex align-items-center">
                          </div>
                          <div class="d-flex flex-column justify-content-center ms-1">
                            <h6 class="mb-0 text-sm font-weight-semibold">  <?= $equipamento->num_patrimonio ?></h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-sm text-dark font-weight-semibold mb-0"><?= $equipamento->descricao ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-sm text-dark font-weight-semibold mb-0"><?= $equipamento->created ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $equipamento->is_active == 1 ? 'Sim' : 'Não' ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-sm text-dark font-weight-semibold mb-0"><?= $equipamento->funcionario->user->nome ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <a class="nav-link " href="<?= $this->Html->link(__('View'), ['action' => 'view', $equipamento->id]) ?>"> </a>
                        <a class="nav-link " href=" <?= $this->Html->link(__('Edi'), ['action' => 'edit', $equipamento->id]) ?> "> </a>
                        <a class="nav-link " href=" <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $equipamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipamento->id)]) ?>"> </a>
                      </td>
                    </tr>
                    <?php endforeach;?>
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
