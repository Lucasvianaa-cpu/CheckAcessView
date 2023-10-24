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
                            <h6 class="font-weight-semibold text-lg mb-0">Relatório de Plantões por Funcionário</h6>
                            <p class="text-sm">Estes são os plantões registrados deste funcionário...</p>
                        </div>

                        <div style="text-align: right;">

                        </div>
                    </div>
                </div>
                <div class="card-body px-0 py-0">
                    <div class="border-bottom py-3 px-3 align-items-center">
                        <?php echo $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3', 'filtro']); ?>
                        <div class="col-2">
                            <?= $this->Form->control('data', ['required' => true, 'class' => 'form-control input-mes-ano', 'label' => 'Busque pelo mês e ano:', 'default' => $this->request->getQuery('data')]); ?>
                        </div>
                        <div class="col-4">
                            <?= $this->Form->control('nome', ['required' => true, 'class' => 'form-control', 'label' => 'Busque pelo nome:', 'default' => $this->request->getQuery('nome'), 'placeholder' => 'Digite o nome']); ?>
                        </div>
                        <div class="col-4">
                            <?= $this->Form->control('sobrenome', ['required' => true, 'class' => 'form-control', 'label' => 'Busque pelo sobrenome:', 'default' => $this->request->getQuery('sobrenome'), 'placeholder' => 'Digite o sobrenome']); ?>
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
                                    <th style="text-align: end;" class="text-secondary text-xs font-weight-semibold opacity-7">Cálculo de Hora</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($plantoes)) : ?>
                                    <?php $minutos_trabalhados = 0; ?>
                                    <?php foreach ($plantoes as $plantao) : ?>
                                        <tr>
                                            <td><?= $plantao->data->format('d/m/Y'); ?></td>
                                            <td><?= $plantao->funcionario->user->nome . ' ' . $plantao->funcionario->user->sobrenome ?></td>

                                            <?php
                                            list($horas, $minutos) = explode(':', $plantao->hora_total->format('H:i'));
                                            $horas = (int)$horas;
                                            $minutos = (int)$minutos;
                                            $total_minutos = $horas * 60 + $minutos;
                                            $minutos_trabalhados += $total_minutos;
                                            ?>
                                            <td style="text-align: end;"><?= $plantao->hora_total->format('H:i') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="3">Busque nos campos acima para trazer o resultado</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>



                    <?php if (!empty($plantoes)) : ?>
                        <?php
                        $horas = floor($minutos_trabalhados / 60);
                        $minutos = $minutos_trabalhados % 60;
                        ?>

                        <p style="text-align: end; margin-right: 10px; margin-top: 5px;">
                            Horas Extras Mensais: <strong><?= sprintf('%02d', $horas) . ':' . sprintf('%02d', $minutos) ?></strong>
                        </p>
                    <?php else : ?>
                        <p style="text-align: end; margin-right: 10px; margin-top: 5px;">Não possui horas</p>
                    <?php endif; ?>



                    <?php if (!empty($plantoes)) : ?>
                        <div class="text-center mx-3 d-flex flex-row align-items-center justify-content-between m-2">
                            <p class="font-weight-semibold mb-0 text-dark text-sm"><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}')]) ?></p>
                            <ul class="pagination d-flex align-items-center">
                                <span aria-hidden="true" class="border rounded-2 p-2 mx-1 bg-dark d-flex align-items-center" style="height: 30px"><?= $this->Paginator->prev('' . __('<span class="text-white" style="font-size: 20px">&laquo;</span>'), ['escape' => false, 'class' => 'prev']) ?></span>
                                <span aria-hidden="true" class="border rounded-2 p-2 bg-dark d-flex align-items-center" style="height: 30px"><?= $this->Paginator->next(__('<span class="text-white" style="font-size: 20px">&raquo;</span>') . ' ', ['escape' => false, 'class' => 'next']) ?></span>
                            </ul>
                        </div>
                    <?php endif; ?>
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