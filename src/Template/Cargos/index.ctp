<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cargo[]|\Cake\Collection\CollectionInterface $cargos
 */
?>

<div class="container-fluid py-4 px-5">
      <div class="row">
        <div class="col-12">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Cargos</h6>
                  <p class="text-sm">Estes são os cargos registrados em sua empresa...</p>
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
                      <th class="text-secondary text-xs font-weight-semibold opacity-7">Nome</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Descrição</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Categoria</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($cargos as $cargo): ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex align-items-center">
                          </div>
                          <div class="d-flex flex-column justify-content-center ms-1">
                            <h6 class="mb-0 text-sm font-weight-semibold">  <?= $cargo->nome ?></h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-sm text-dark font-weight-semibold mb-0"><?= $cargo->descricao ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-sm text-dark font-weight-semibold mb-0"><?= $cargo->categoria->nome ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <a class="nav-link " href="<?= $this->Html->link(__('View'), ['action' => 'view', $cargo->id]) ?>"> </a>
                        <a class="nav-link " href=" <?= $this->Html->link(__('Edi'), ['action' => 'edit', $cargo->id]) ?> "> </a>
                        <a class="nav-link " href=" <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cargo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cargo->id)]) ?>"> </a>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>

                 <!-- Botão de adicionar-->
                <div> 
                    <a class="nav-link " href="<?= $this->Url->build(['controller' => 'Cargos', 'action' => 'add']); ?> "?>
                    <span class="nav-link-text ms-1">Adicionar Cargo</span> 
                </div>
              </div>
            
              <div class="border-top py-3 px-3 d-flex align-items-center">
                <p class="font-weight-semibold mb-0 text-dark text-sm"><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}')]) ?></p>
                <div class="ms-auto"> 
                  <button class="btn btn-sm btn-white mb-0"><?= $this->Paginator->first(' ' . __('Primeira')) ?></button>
                  <button class="btn btn-sm btn-white mb-0"><?= $this->Paginator->prev(' ' . __('Anterior')) ?></button>
                  <button class="btn btn-sm btn-white mb-0"><?= $this->Paginator->next(__('Próxima') . ' ') ?></button>
                  <button class="btn btn-sm btn-white mb-0"><?= $this->Paginator->last(' ' . __('Última')) ?></button>
                </div>
                
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
          </div>
        </div>
      </footer>
    </div>

