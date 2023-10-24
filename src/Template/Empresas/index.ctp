<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Empresa[]|\Cake\Collection\CollectionInterface $empresas
 */
?>

<div class="container-fluid py-4 px-5">
  <div class="row">
    <div class="col-12">
      <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
          <div class="d-sm-flex align-items-center justify-content-between">
            <div>
              <h6 class="font-weight-semibold text-lg mb-0">Empresas</h6>
              <p class="text-sm">Estas são as empresas cadastradas em seu sistema...</p>
            </div>

            <div style="text-align: right;">
              <a class="nav-link " href="<?= $this->Url->build(['controller' => 'Empresas', 'action' => 'add']) ?>" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" class="ionicon" viewBox="0 0 512 512">
                  <path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M256 176v160M336 256H176" />
                </svg>
                <span class="nav-link-text ms-1">Adicionar Empresa</span>
              </a>
            </div>
          </div>
        </div>
        <div class="card-body px-0 py-0">
          <div class="border-bottom py-3 px-3 align-items-center">
            <?php echo $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3', 'filtro']); ?>

            <div class="col-2">
              <?= $this->Form->control('ativo', ['type' => 'select', 'label' => 'Status', 'class' => 'form-control', 'default' => $this->request->getQuery('ativo'), 'empty' => [3 => 'Todos'], 'options' => [1 => 'Ativo', 2 => 'Inativo', 3 => 'Todos']]); ?>
            </div>
            <div class="col-5">
              <?= $this->Form->control('razao_social', ['class' => 'form-control', 'label' => 'Busque pela razão social:', 'default' => $this->request->getQuery('razao_social'), 'placeholder' => 'Digite a razão social']); ?>
            </div>
            <div class="col-3">
              <?= $this->Form->control('cnpj', ['class' => 'form-control', 'label' => 'Busque pelo CNPJ:', 'default' => $this->request->getQuery('cnpj'), 'placeholder' => 'Digite o CNPJ']); ?>
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
                  <th class="text-secondary text-xs font-weight-semibold opacity-7">Razão Social</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Nome Fantasia</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">CNPJ</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">IE</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">CEP</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Endereço</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Bairro</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Número</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Telefone</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Qtd. Funcionários</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Descrição</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Ativo</th>
                  <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($empresas as $empresa) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex align-items-center">
                        </div>
                        <div class="d-flex flex-column justify-content-center ms-1">
                          <h6 class="mb-0 text-sm font-weight-semibold"> <?= $empresa->razao_social ?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $empresa->nome_fantasia ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $empresa->cnpj ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $empresa->ie ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $empresa->cep ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $empresa->endereco ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $empresa->bairro ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $empresa->numero ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $empresa->telefone ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $empresa->qtd_funcionarios ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $empresa->desc_empresa ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <p class="text-sm text-dark font-weight-semibold mb-0"><?= $empresa->is_active == 1 ? 'Sim' : 'Não' ?></p>
                    </td>
                    <td class="align-middle text-center" style="display: flex; justify-content: end;">
                      <a class="btn btn-sm btn-dark mx-1" href="<?= $this->Url->build(['controller' => 'Empresas', 'action' => 'view', $empresa->id]); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                        </svg>
                      </a>
                      <a class="btn btn-sm btn-dark" href="<?= $this->Url->build(['controller' => 'Empresas', 'action' => 'edit', $empresa->id]); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                      </a>
                      <?= $this->Form->postLink(
                        '<button type="button" class="btn btn-sm btn-dark mx-1">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                  </svg>
                              </button>',
                        ['action' => 'delete', $empresa->id],
                        [
                          'confirm' => __('Tem certeza que deseja deletar a empresa: {0}?', $empresa->razao_social),
                          'escapeTitle' => false,
                          'escape' => false,
                          'form' => ['style' => 'display:inline'], // Para manter o botão dentro da mesma linha
                        ]
                      ) ?>
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