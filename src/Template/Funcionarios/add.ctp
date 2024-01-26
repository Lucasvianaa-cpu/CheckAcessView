<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario $funcionario
 */
?>


<div class="container-fluid my-2 py-3">
    <nav aria-label="breadcrumb" style="margin-bottom: 20px; margin-top: -50px;">
        <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'dashboard', $funcionario_empresa['funcionarios'][0]['empresa_id']]); ?>">Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Editar Funcionário</li>
        </ol>
    </nav>
    <div class="col-12 mb-4">
        <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 col-9">
                        <h6 class="mb-0 font-weight-semibold text-lg">Editar Funcionário</h6>
                        <p class="text-sm mb-1">Edite os campos do funcionário selecionado</p>
                    </div>
                    <div class="">
                        <?= $this->Form->create($funcionario, ['class' => 'row g-3']) ?>
                        <form class="row g-3">
                            <div class="col-3">
                                <?php echo $this->Form->control('salario', ['type' => 'text', 'label' => 'Salário', 'class' => 'form-control', 'required' => 'required', 'value' => 'R$ ' . number_format($funcionario->salario, 2, ',', '.'),]); ?>
                            </div>
                            <div class="col-3">
                                <?= $this->Form->data_personalizada('admissao', 'Data de Admissão', 'date', date('d/m/Y'), 'required', $funcionario->admissao); ?>
                            </div>
                            <div class="col-md-3 pb-3">
                                <?php echo $this->Form->control('cargo_id', ['type' => 'select', 'label' => 'Cargo', 'options' => $cargos, 'class' => 'form-select', 'required']); ?>
                            </div>
                            <div class="col-md-3 pb-3">
                                <?php echo $this->Form->control('empresa_id', ['type' => 'select', 'label' => 'Empresa', 'options' => $empresas, 'class' => 'form-select', 'required']); ?>
                            </div>
                            <div class="col-md-3 pb-3">
                                <?php echo $this->Form->control('plano_saude_id', ['type' => 'select', 'label' => 'Plano de Saúde', 'options' => $planosSaudes, 'class' => 'form-select', 'required']); ?>
                            </div>

                            <div class="col-md-4 pb-3">
                                <?php echo $this->Form->control('user_id', ['type' => 'select', 'label' => 'Usuário', 'options' => $users, 'class' => 'form-select', 'required']); ?>
                            </div>

                            <div class="col-2 checkbox-input">
                                <label for="" class="form-label"></label>
                                <div class="form-check mt-2">
                                    <?= $this->Form->control('is_active', ['type' => 'checkbox', 'label' => 'Ativo', 'class' => 'form-check-input']); ?>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 text-sm-end">

                                <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-sm btn-dark']) ?>
                                <a class="btn btn-sm btn-white" href="<?= $this->Url->build(['action' => 'index']); ?>">Cancelar</a>
                            </div>
                            <?= $this->Form->end() ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<footer>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <?php
    $timestamp_admissao = strtotime($funcionario->admissao);
    if ($timestamp_admissao !== false) {
        $data_formatada_admissao = date('Y-m-d', $timestamp_admissao);
    }
    ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var inputElementAdmissao = document.getElementById("admissao");
            inputElementAdmissao.value = "<?php echo $data_formatada_admissao ?>";
        });
    </script>

    <script>
        $(document).ready(function() {
            // Função para formatar o valor como "R$ 0,00"
            function formatarSalario(salario) {
                return 'R$ ' + parseFloat(salario).toFixed(2).replace('.', ',');
            }

            // Exemplo de uso:
            var salario = 1234.56; // Substitua pelo valor do seu campo de salário
            var salarioFormatado = formatarSalario(salario);
            console.log(salarioFormatado); // Saída: R$ 1.234,56
        });
    </script>


</footer>