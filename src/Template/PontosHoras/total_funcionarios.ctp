<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PontosHora[]|\Cake\Collection\CollectionInterface $pontosHoras
 */
?>

<div class="container-fluid py-4 px-5">
    <nav aria-label="breadcrumb" style="margin-bottom: 20px; margin-top: -50px;">
        <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'dashboard', $funcionario_empresa['funcionarios'][0]['empresa_id']]); ?>">Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Relatórios</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12">
            <div class="card border shadow-xs mb-4">
                <div class="card-header border-bottom pb-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="font-weight-semibold text-lg mb-0">Relatório de Pontos Mensais</h6>
                            <p class="text-sm">Estes são os pontos registrados deste funcionário...</p>
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
                                    <th style="text-align: end;" class="text-secondary text-xs font-weight-semibold opacity-7">Cálculo de Hora</th>

                                </tr>
                            </thead>
                            <?php
                            $minutos_trabalhados = 0;
                            ?>

                            <?php if (!empty($pontos_dias)) : ?>
                                <?php foreach ($pontos_dias as $data => $pontos) : ?>
                                    <?php if (count($pontos) != 2 && count($pontos) != 4) : ?>
                                        <tr>
                                            <td><?= $data ?></td>
                                            <td>
                                                <?php if (isset($pontos[0]['nome']) && isset($pontos[0]['sobrenome'])) : ?>
                                                    <?= $pontos[0]['nome'] ?> <?= $pontos[0]['sobrenome'] ?>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: end;">
                                                <?php if (!empty($pontos)) {
                                                    $total = end($pontos);
                                                    if (isset($total['total'])) {

                                                        $total_novo = $total['total'];
                                                        list($horas, $minutos) = explode(':', $total_novo);
                                                        $horas = (int)$horas;
                                                        $minutos = (int)$minutos;
                                                        $total_minutos = $horas * 60 + $minutos; // Converter tudo para minutos
                                                        $minutos_trabalhados += $total_minutos;
                                                        echo $total_novo;
                                                    } else {
                                                        debug($total['total']);
                                                        exit;
                                                        $total['total'] = 0;
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td>
                                        Busque por um funcionário
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            <?php endif; ?>



                            </tbody>
                        </table>
                    </div>

                    <?php
                    // Extrai as horas
                    $horas = floor($minutos_trabalhados / 60);

                    // Extrai os minutos
                    $minutos = $minutos_trabalhados % 60;

                    ?>

                    <p style="text-align: end; margin-right: 10px; margin-top: 5px;">
                        Horas Mensais Trabalhadas: <strong><?= sprintf('%02d', $horas) . ':' . sprintf('%02d', $minutos) ?></strong>
                    </p>



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