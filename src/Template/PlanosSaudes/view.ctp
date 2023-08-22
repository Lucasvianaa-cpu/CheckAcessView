<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlanosSaude $planosSaude
 */
?>

<div class="container-fluid py-2 px-5">
  <div class="row">
    <div class="col-12">
      <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
          <div class="d-sm-flex align-items-center justify-content-between">
            <div>
              <h6 class="font-weight-semibold text-lg mb-0">Plano de Saúde selecionado</h6>
              <p class="text-sm">Este é o plano que foi registrado...</p>
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
                <th class="text-secondary text-xs font-weight-semibold opacity-7">Nº Registro</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Nome</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">ID</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">É ativo?</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex align-items-center">
                    </div>
                    <div class="d-flex flex-column justify-content-center ms-1">
                      <h6 class="mb-0 text-sm font-weight-semibold"> <?= $planosSaude->registro ?></h6>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  <p class="text-sm text-dark font-weight-semibold mb-0"><?= $planosSaude->nome ?></p>
                </td>
                <td class="align-middle text-center">
                  <p class="text-sm text-dark font-weight-semibold mb-0"><?= $planosSaude->id ?></p>
                </td>

                <td class="align-middle text-center">
                  <p class="text-sm text-dark font-weight-semibold mb-0"><?= $planosSaude->is_active == 1 ? 'Sim' : 'Não' ?></p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  

