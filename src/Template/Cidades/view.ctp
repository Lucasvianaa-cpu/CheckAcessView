<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cidade $cidade
 */
?>
<div class="container-fluid py-2 px-5">
    <div class="row">
        <div class="col-12">
            <div class="card border shadow-xs mb-4">
                <div class="card-header border-bottom pb-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="font-weight-semibold text-lg mb-0">Cidade selecionada</h6>
                            <p class="text-sm">Esta é uma cidade que foi registrada...</p>
                        </div>

                        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 text-sm-end">

                            <a class="btn btn-sm btn-dark"
                                href="<?= $this->Url->build(['action' => 'index']); ?>">Voltar</a>

                        </div>

                    </div>
                </div>

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-secondary text-xs font-weight-semibold opacity-7">Código IBGE</th>
                                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Nome</th>
                                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Estado
                                </th>
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
                                            <h6 class="mb-0 text-sm font-weight-semibold"> <?= $cidade->cod_ibge ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-sm text-dark font-weight-semibold mb-0"><?= $cidade->nome ?></p>
                                </td>
                                <td class="align-middle text-center">
                                    <p class="text-sm text-dark font-weight-semibold mb-0"><?= $cidade->estado->sigla ?>
                                    </p>
                                </td>

                                <td class="align-middle text-center">
                                    <p class="text-sm text-dark font-weight-semibold mb-0"><?= $cidade->id ?></p>
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
                                <h6 class="font-weight-semibold text-lg mb-0">Endereços Vinculados à Cidade</h6>
                                <p class="text-sm">Estes são os endereços vinculados à cidade...</p>
                            </div>


                        </div>
                    </div>

                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead class="bg-gray-100">

                                <tr>
                                    <th class="text-secondary text-xs font-weight-semibold opacity-7">Rua</th>
                                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Bairro
                                    </th>
                                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Número
                                    </th>
                                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">CEP
                                    </th>
                                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                        Residente</th>
                                    <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cidade->enderecos as $enderecos) : ?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex align-items-center">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center ms-1">
                                                <h6 class="mb-0 text-sm font-weight-semibold"> <?= $enderecos->rua ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm text-dark font-weight-semibold mb-0"><?= $enderecos->bairro ?>
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-sm text-dark font-weight-semibold mb-0"><?= $enderecos->numero ?>
                                        </p>
                                    </td>

                                    <td class="align-middle text-center">
                                        <p class="text-sm text-dark font-weight-semibold mb-0"><?= $enderecos->cep ?>
                                        </p>
                                    </td>

                                    <td class="align-middle text-center">
                                        <p class="text-sm text-dark font-weight-semibold mb-0">
                                            <?= $enderecos->user->nome ?></p>
                                    </td>

                                    <td class="align-middle text-center">
                                        <?php foreach ($cidade->enderecos as $endereco): ?>
                                        <?= $this->Form->postLink(
                          '<button type="button" class="btn btn-sm btn-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </button>',
                          ['controller'=>'Enderecos', 'action' => 'delete', $endereco->id],
                          [
                              'confirm' => __('Tem certeza que deseja deletar o endereço: {0}?', $enderecos->rua),
                              'escapeTitle' => false,
                              'escape' => false,
                              'form' => ['style' => 'display:inline'], // Para manter o botão dentro da mesma linha
                          ]
                      ) ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
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