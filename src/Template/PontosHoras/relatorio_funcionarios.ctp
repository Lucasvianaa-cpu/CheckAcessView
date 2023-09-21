<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PontosHora[]|\Cake\Collection\CollectionInterface $pontosHoras
 */
?>

<div class="container-fluid py-4 px-5">
      <div class="row">
        <div class="col-12">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Pontos de Horas</h6>
                  <p class="text-sm">Estes são os pontos dos funcionários registrados...</p>
                </div>
            
                <div style="text-align: right;">
                
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
            <div class="border-bottom py-3 px-3 align-items-center">
              <?php echo $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3','filtro']); ?>
                  <div class="col-2">
                      <?= $this->Form->control('data_ponto', ['class' => 'form-control', 'label' => 'Busque pela data:', 'default' => $this->request->getQuery('data_ponto'), 'placeholder' => 'Digite a data']); ?>
                  </div>
                  <div class="col-4">
                      <?= $this->Form->control('nome', ['class' => 'form-control', 'label' => 'Busque pelo nome:', 'default' => $this->request->getQuery('nome'), 'placeholder' => 'Digite o nome']); ?>
                  </div>
                  <div class="col-4">
                      <?= $this->Form->control('sobrenome', ['class' => 'form-control', 'label' => 'Busque pelo sobrenome:', 'default' => $this->request->getQuery('sobrenome'), 'placeholder' => 'Digite o sobrenome']); ?>
                  </div>

                  <button type="submit" class="btn btn-sm btn-dark col-2" style="margin-top: 46px; height: 40px;">
                    <b>Buscar </b>&nbsp;<i class="fa-solid fa-magnifying-glass text-white"></i>
                  </button>
                  
              <?php echo $this->Form->end(); ?>
            </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7">Data</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7">Hora</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7">Funcionário</th>      
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($pontos_historico as $ponto): ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center ms-1">
                            <h6 class="mb-0 text-sm font-weight-semibold">  <?= $ponto->data_ponto ? $ponto->data_ponto->format('d/m/Y') : '' ?></h6>
                          </div>
                      </td>
                      <td>
                          <div class="d-flex flex-column justify-content-center ms-1">
                            <h6 class="mb-0 text-sm font-weight-semibold">  <?= $ponto->hora ? $ponto->hora->format('H:i:s') : '' ?></h6>
                          </div>
                      </td>

                      <td>
                          <div class="d-flex flex-column justify-content-center ms-1">
                            <h6 class="mb-0 text-sm font-weight-semibold"><?= $ponto->funcionario->user->nome ?> <?= $ponto->funcionario->user->sobrenome ?></h6>
                          </div>
                      </td>


                      <td class="align-middle text-center">
                        <a class="btn btn-sm btn-dark" href="<?= $this->Url->build(['controller' => 'PontosHoras', 'action' => 'view', $ponto->id]); ?>">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                              </svg>
                            </a>
                            <?php if($current_user['role_id'] == 2) : ?>
                            <a class="btn btn-sm btn-dark" href="<?= $this->Url->build(['controller' => 'PontosHoras', 'action' => 'edit', $ponto->id]); ?>">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                              </svg>
                            </a>
                            <?php endif;?>

                            <?php if($current_user['role_id'] == 2) : ?>
                                <?= $this->Form->postLink(
                                    '<button type="button" class="btn btn-sm btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </button>',
                                    ['action' => 'delete', $ponto->id],
                                    [
                                        'confirm' => __('Tem certeza que deseja deletar o ponto de hora: {0}?', $ponto->data),
                                        'escapeTitle' => false,
                                        'escape' => false,
                                        'form' => ['style' => 'display:inline'], // Para manter o botão dentro da mesma linha
                                    ]
                                ) ?>
                            <?php endif;?>
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

