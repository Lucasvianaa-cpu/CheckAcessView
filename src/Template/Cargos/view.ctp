<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cargo $cargo
 */
?>
<div class="container-fluid py-2 px-5">
  <div class="row">
    <div class="col-12">
      <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
          <div class="d-sm-flex align-items-center justify-content-between">
            <div>
              <h6 class="font-weight-semibold text-lg mb-0">Cargo selecionado</h6>
              <p class="text-sm">Este é um cargo que foi registrado...</p>
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
                <th class="text-secondary text-xs font-weight-semibold opacity-7">Nome</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Descrição</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Categoria</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">ID</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex align-items-center">
                    </div>
                    <div class="d-flex flex-column justify-content-center ms-1">
                      <h6 class="mb-0 text-sm font-weight-semibold"> <?= $cargo->nome ?></h6>
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
                  <p class="text-sm text-dark font-weight-semibold mb-0"><?= $cargo->id ?></p>
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
                <h6 class="font-weight-semibold text-lg mb-0">Funcionários Vinculados ao Cargo</h6>
                <p class="text-sm">Estes são os funcionários vinculados ao cargo...</p>
              </div>


            </div>
          </div>

          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead class="bg-gray-100">

                <tr>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7">Nome</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Salario</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Empresa</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">É Ativo?</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cargo->funcionarios as $funcionarios) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex align-items-center">
                        </div>
                        <div class="d-flex flex-column justify-content-center ms-1">
                          <h6 class="mb-0 text-sm font-weight-semibold"> <?= $funcionarios->user->nome ?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $funcionarios->user->salario  ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $funcionarios->empresa->razao_social ?></p>
                    </td>

                    <td class="align-middle text-center">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $funcionarios->is_active == 1 ? 'Sim' : 'Não' ?></p>
                    </td>
                  </tr>
                <?php endforeach; ?>
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