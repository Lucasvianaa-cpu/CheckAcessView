<div class="container-fluid py-4 px-5">
      <div class="row">
        <div class="col-12">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Usuários Pendentes de Permissão</h6>
                  <p class="text-sm">Olá, estes são os novos registros de logins, dê as permissões para cada um deles:</p>
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
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Data Cadastro</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Permissão</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Confirma?</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex align-items-center">
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm rounded-circle me-2" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center ms-1">
                            <h6 class="mb-0 text-sm font-weight-semibold"><?= $user->nome ?></h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-sm text-dark font-weight-semibold mb-0"><?= $user->created->format('d/m/Y') ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-sm text-dark font-weight-semibold mb-0"><?= $user->role->descricao ?></p>
                      </td>
                      <td class="align-middle text-center">

                        <?= $this->Html->link(__('Editar'),['action' => 'permissions', $user->id], ['class' => 'btn btn-primary btn-sm']) ?>

                          <!-- <button type="button" class="btn btn-primary btn-sm" id="<?= $user->id ?>">Sim</button> -->
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>

              <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<' . __('Primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->next(__('Próxima') . ' >') ?>
            <?= $this->Paginator->last(__('Última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}')]) ?></p>
    </div>
              <div class="border-top py-3 px-3 d-flex align-items-center">
                <p class="font-weight-semibold mb-0 text-dark text-sm">Página 1 de 10</p>
                <div class="ms-auto">
                  <button class="btn btn-sm btn-white mb-0">Anterior</button>
                  <button class="btn btn-sm btn-white mb-0">Próximo</button>
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
