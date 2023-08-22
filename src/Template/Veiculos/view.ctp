<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Veiculo $veiculo
 */
?>

<div class="container-fluid py-2 px-5">
  <div class="row">
    <div class="col-12">
      <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
          <div class="d-sm-flex align-items-center justify-content-between">
            <div>
              <h6 class="font-weight-semibold text-lg mb-0">Veículo selecionado</h6>
              <p class="text-sm">Este é o veículo que foi registrado...</p>
            </div>

            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 text-sm-end">

              <a class="btn btn-sm btn-dark" href="<?= $this->Url->build(['action' => 'index']); ?>">Voltar</a>

            </div>

          </div>
        </div>

        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead class="bg-gray-100">
              <tr>
                <th class="text-secondary text-xs font-weight-semibold opacity-7">Modelo</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Cor</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Placa</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Proprietário</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">É Ativo?</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex align-items-center">
                    </div>
                    <div class="d-flex flex-column justify-content-center ms-1">
                      <h6 class="mb-0 text-sm font-weight-semibold"> <?= $veiculo->modelo ?></h6>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  <p class="text-sm text-dark font-weight-semibold mb-0"><?= $veiculo->cor ?></p>
                </td>
                <td class="align-middle text-center">
                  <p class="text-sm text-dark font-weight-semibold mb-0"><?= $veiculo->placa ?></p>
                </td>

                <td class="align-middle text-center">
                  <p class="text-sm text-dark font-weight-semibold mb-0"><?= $veiculo->user->nome ?></p>
                </td>

                <td class="align-middle text-center">
                  <p class="text-sm text-dark font-weight-semibold mb-0"><?= $veiculo->is_active == 1 ? 'Sim' : 'Não' ?></p>
                </td>
              </tr>
            </tbody>
          </table>
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


