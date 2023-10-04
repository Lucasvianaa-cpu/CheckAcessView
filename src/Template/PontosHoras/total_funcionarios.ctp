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
                            <p class="text-sm">Estes são os pontos registrados...</p>
                        </div>

                        <div style="text-align: right;">

                        </div>
                    </div>
                </div>
                <div class="card-body px-0 py-0">
                    <div class="border-bottom py-3 px-3 align-items-center">
                        <?php echo $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3', 'filtro']); ?>
                        <div class="col-2">
                            <?= $this->Form->control('data_ponto', ['class' => 'form-control input-mes-ano', 'label' => 'Busque pelo mês e ano:', 'default' => $this->request->getQuery('data_ponto')]); ?>
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
                                    <th class="text-secondary text-xs font-weight-semibold opacity-7">Funcionário</th>
                                    <th class="text-secondary text-xs font-weight-semibold opacity-7">Cálculo de Hora</th>
                                    <th class="text-secondary text-xs font-weight-semibold opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pontos_dias as $data => $pontos) : ?>

                                    <tr>
                                        <td><?= $data ?></td>
                                        <td><?= $pontos[0]['nome'] ?> <?= $pontos[0]['sobrenome'] ?></td>
                                        <td>
                                            <?php $total = end($pontos); ?>
                                            <?= $total['total'] ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>

                        </table>
                    </div>

                    <p>TOTAL DE HORAS TRABALHAS NO MES: (TOTAL)</p>

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