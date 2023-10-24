<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>




<div class="container-fluid py-2 px-5">
  <div class="row">
    <div class="col-12">
      <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
          <div class="d-sm-flex align-items-center justify-content-between">
            <div>
              <h6 class="font-weight-semibold text-lg mb-0">Usuário selecionado</h6>
              <p class="text-sm">Este é um usuário que foi registrado...</p>
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
                <th class="text-secondary text-xs font-weight-semibold opacity-7">ID</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Nome</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">CPF</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Email</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">RFID</th>
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
                      <h6 class="mb-0 text-sm font-weight-semibold"> <?= $user->id ?></h6>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  <p class="text-sm text-dark font-weight-semibold mb-0"><?= $user->nome ?></p>
                </td>

                <td class="align-middle text-center">
                  <p class="text-sm text-dark font-weight-semibold mb-0"><?= $user->cpf ?></p>
                </td>
                <td class="align-middle text-center">
                  <p class="text-sm text-dark font-weight-semibold mb-0"><?= $user->email ?></p>
                </td>
                <td class="align-middle text-center">
                  <p class="text-sm text-dark font-weight-semibold mb-0"><?= $user->uid_rfid ?></p>
                </td>
    
                <td class="align-middle text-center">
                  <p class="text-sm text-dark font-weight-semibold mb-0"><?= $user->is_active == 1 ? 'Sim' : 'Não'  ?></p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="container-fluid py-2 px-5">
    <div class="row">
      <div class="col-12">
        <div class="card border shadow-xs mb-4">
          <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center justify-content-between">
              <div>
                <h6 class="font-weight-semibold text-lg mb-0">Veículos Vinculados ao Usário</h6>
                <p class="text-sm">Estes são os veículos vinculados ao usuário...</p>
              </div>


            </div>
          </div>

          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead class="bg-gray-100">

                <tr>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7">Placa</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Modelo</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Cor</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($user->veiculos as $veiculos) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex align-items-center">
                        </div>
                        <div class="d-flex flex-column justify-content-center ms-1">
                          <h6 class="mb-0 text-sm font-weight-semibold"> <?= $veiculos->placa ?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $veiculos->modelo  ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $veiculos->cor  ?></p>
                    </td>
                    
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>



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
