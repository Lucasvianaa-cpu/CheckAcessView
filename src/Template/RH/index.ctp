<div class="container-fluid py-4 px-5">
  <nav aria-label="breadcrumb" style="margin-bottom: 20px; margin-top: -50px;">
    <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'dashboard', $funcionario_empresa['funcionarios'][0]['empresa_id']]); ?>">Dashboard</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Usuários Pendentes de Permissão</li>
    </ol>
  </nav>
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
          <div class="border-bottom py-3 px-3 align-items-center">
            <?php echo $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3', 'filtro']); ?>

            <div class="col-10">
              <?= $this->Form->control('nome', ['class' => 'form-control', 'label' => 'Busque pelo nome:', 'default' => $this->request->getQuery('nome'), 'placeholder' => 'Digite o nome']); ?>
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
                  <th class="text-secondary text-xs font-weight-semibold opacity-7">Nome</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Data Cadastro</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Permissão</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $user) : ?>

                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex align-items-center">
                          <?php if (!empty($user->caminho_foto)) : ?>
                            <?= $this->Html->image($user->caminho_foto, [
                              'width' => '40px',
                              'height' => 'auto',
                              'style' => 'border-radius: 20px;'
                            ]); ?>
                          <?php else : ?>
                            <?= $this->Html->image('perfil.png', [
                              'width' => '40px',
                              'height' => 'auto',
                            ]); ?>
                          <?php endif; ?>
                        </div>
                        <div class="d-flex flex-column justify-content-center ms-1">
                          <h6 class="mb-0 text-sm font-weight-semibold"> <?= $user->nome ?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $user->created->format('d/m/Y') ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $user->role->descricao ?></p>
                    </td>
                    <td class="align-middle text-center" style="display: flex; justify-content: end;">

                      <?php
                      $url = $this->Url->build(['controller' => 'Funcionarios', 'action' => 'vincularUsuario',  $user->id]);

                      ?>

                      <?= $this->Html->link(__('Vincular Funcionário'), $url, ['class' => 'btn btn-dark btn-sm']) ?>

                      <!-- <button type="button" class="btn btn-primary btn-sm" id="<?= $user->id ?>">Sim</button> -->
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