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
              <h6 class="font-weight-semibold text-lg mb-0">Ponto de Hora</h6>
              <p class="text-sm">Estes são os pontos registrados...</p>
            </div>

            <div style="text-align: right;">
              <a class="nav-link " href="<?= $this->Url->build(['controller' => 'PontosHoras', 'action' => 'add']) ?>" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" class="ionicon" viewBox="0 0 512 512">
                  <path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M256 176v160M336 256H176" />
                </svg>
                <span class="nav-link-text ms-1">Registrar Ponto</span>
              </a>
            </div>
          </div>
        </div>
        <div class="card-body px-0 py-0">
          <div class="border-bottom py-3 px-3 align-items-center">
            <?php echo $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3', 'filtro']); ?>
            <div class="col-10">
              <?= $this->Form->control('data_ponto', ['class' => 'form-control input-data', 'label' => 'Busque pela data:', 'default' => $this->request->getQuery('data_ponto'), 'placeholder' => 'Digite a data']); ?>
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
                  <th class="text-secondary text-xs font-weight-semibold opacity-7">Entrada</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7">Saída p/ Intervalo</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7">Retorno</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7">Saída</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7">Horas Trabalhadas</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pontos_dias as $data => $pontos) : ?>
                  <?php $valor_contagem = count($pontos); // Calcular o valor de contagem antes do loop interno 
                  ?>

                  <tr>
                    <td><?= $data ?></td>
                    <?php foreach ($pontos as $ponto) : ?>
                      <?php if (isset($ponto['hora'])) : ?>
                        <td>
                          <?= $ponto['hora'] ?>
                        </td>
                      <?php endif; ?>
                    <?php endforeach; ?>

                    <?php if ($valor_contagem == 2) : ?>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td colspan="2">
                        <?php $total = end($pontos); ?>
                        <?= $total['total'] ?>
                      </td>
                    <?php endif; ?>

                    <?php if ($valor_contagem == 3) : ?>
                      <td></td>
                      <td></td>
                      <td colspan="2">
                        <?php $total = end($pontos); ?>
                        <?= $total['total'] ?>
                      </td>
                    <?php endif; ?>

                    <?php if ($valor_contagem == 5) : ?>
                      <td colspan="5">
                        <?php $total = end($pontos); ?>
                        <?= $total['total'] ?>
                      </td>
                    <?php endif; ?>

                    <?php if ($valor_contagem == 4) : ?>
                      <td colspan="3">
                        <?php $total = end($pontos); ?>
                        <?= $total['total'] ?>
                      </td>
                    <?php endif; ?>
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