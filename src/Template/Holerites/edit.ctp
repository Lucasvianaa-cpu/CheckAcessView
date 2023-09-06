<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Holerite $holerite
 */
?>



<div class="container-fluid my-2 py-3">
    <div class="col-12 mb-4">
        <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 col-9">
                        <h6 class="mb-0 font-weight-semibold text-lg">Editar Holerite</h6>
                        <p class="text-sm mb-1">Edite os campos do holerite selecionado</p>
                    </div>
                    <div class="">
                        <?= $this->Form->create($holerite, ['class'=> 'row g-3']) ?>
                        <form class="row g-3">
                        <form class="row g-3">
                            <div class="col-md-6">
                                <?= $this->Form->control('funcionario_id', ['type' => 'select','label' => 'Funcionário', 'options' => $funcionarios_list, 'class' => 'form-select', 'required' => 'required', 'placeholder' => 'Selecione o funcionário', 'empty' => 'Selecione'  ]); ?>           
                            </div>
                            <div class="col-md-6">
                                <?= $this->Form->data_personalizada('data_holerite', 'Data do Holerite', 'date', date('d/m/Y'), 'required', $holerite->data_holerite); ?>
                            </div>
                            <div class="col-md-8">
                                <?= $this->Form->control('descricao', ['type' => 'text', 'label' => 'Mês', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o mês']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->data_personalizada('data_admissao', 'Data Admissão', 'date', date('d/m/Y'), 'required', $holerite->data_admissao); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('salario', ['type' => 'number', 'label' => 'Salário Base', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o salário']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('vale_alimentacao', ['type' => 'number', 'label' => 'Valor Vale Alimentação', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o valor do vale alimentação']); ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('hora_extra', ['type' => 'number', 'label' => 'Hora Extra', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o valor da hora extra']); ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('adicional_noturno', ['type' => 'number', 'label' => 'Adicional Noturno', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o valor de adicional noturno']); ?>
                            </div>
                            <div class="col-md-3">
                                <?= $this->Form->control('base_inss', ['type' => 'number', 'label' => 'Base INSS', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o valor da base INSS']); ?>
                            </div>
                            <div class="col-md-3">
                                <?= $this->Form->control('inss', ['type' => 'number', 'label' => 'Valor INSS', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o valor do INSS']); ?>
                            </div>
                            <div class="col-md-3">
                                <?= $this->Form->control('base_fgts', ['type' => 'number', 'label' => 'Base FGTS', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o valor da base FGTS']); ?>
                            </div>
                            <div class="col-md-3">
                                <?= $this->Form->control('fgts', ['type' => 'number', 'label' => 'Valor FGTS', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o valor do FGTS']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('ir', ['type' => 'number', 'label' => 'Valor Imposto de Renda', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o valor do IR']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('ferias', ['type' => 'number', 'label' => 'Ferias', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o valor das férias']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('horas_trabalhadas', ['type' => 'number', 'label' => 'Horas Trabalhadas', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a qtd de horas trabalhadas']); ?>
                            </div>
                            <div class="col-md-6">
                                <?= $this->Form->control('bruto', ['type' => 'number', 'label' => 'Salário Bruto', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o salário bruto']); ?>
                            </div>
                            <div class="col-md-6 pb-3">
                                <?= $this->Form->control('liquido', ['type' => 'number', 'label' => 'Salário Liquído', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o salário liquído']); ?>
                            </div>




                            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 text-sm-end">

                                <?= $this->Form->button(__('Enviar'), ['class'=> 'btn btn-sm btn-dark']) ?>
                                <a class="btn btn-sm btn-white"
                                    href="<?= $this->Url->build(['action' => 'index']); ?>">Cancelar</a>
                            </div>
                            <?= $this->Form->end() ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<footer>
        <?= $this->Html->script('jquery.js'); ?>
        <?= $this->Html->script('popper.min.js'); ?>
        <?= $this->Html->script('bootstrap.min.js'); ?>
        <?= $this->Html->script('perfect-scrollbar.min.js'); ?>
        <?= $this->Html->script('smooth-scrollbar.min.js'); ?>
        <?= $this->Html->script('chartjs.min.js'); ?>
        <?= $this->Html->script('swiper-bundle.min.js'); ?>
        <?= $this->Html->script('buttons.js'); ?>
        <?= $this->Html->script('corporate-ui-dashboard.min.js?v=1.0.0'); ?>

        <?= $this->Html->script('sweetalert2.all.min.js'); ?>
        
        <!-- Mensagens de Sucesso/Erro -->
        <?= $this->element('alertas/mensagem'); ?>

        <?php 
            $timestamp = strtotime($holerite->data_holerite);
            if ($timestamp  !== false) {
                $data_formatada = date('Y-m-d', $timestamp);
            }
        ?>

        <?php 
            $timestamp_admissao = strtotime($holerite->data_admissao);
            if ($timestamp_admissao !== false) {
                $data_formatada_admissao = date('Y-m-d', $timestamp_admissao);
            }
        ?>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var inputElement = document.getElementById("data-holerite");
                inputElement.value = "<?php echo $data_formatada ?>";

                var inputElementAdmissao = document.getElementById("data-admissao");
                inputElementAdmissao.value = "<?php echo $data_formatada_admissao ?>";
            });
        </script>

      </footer>




