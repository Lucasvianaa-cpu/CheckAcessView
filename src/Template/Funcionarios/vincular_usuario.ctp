<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario $funcionario
 */
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<div class="container-fluid my-2 py-3">
    <div class="col-12 mb-4">
        <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 col-9">
                        <h6 class="mb-0 font-weight-semibold text-lg">Vincular Usuário</h6>
                        <p class="text-sm mb-1">Preencha os campos abaixo</p>
                    </div>
                    <div class="">
                        <?= $this->Form->create($funcionario, ['class' => 'row g-3']) ?>

                        <form class="row g-3">
                            <div class="col-md-5 pb-3">

                                <?= $this->Form->control('user_id', ['type' => 'text', 'label' => 'Usuário', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a razão social', 'readonly' => true, 'default' => $user->nome]); ?>
                            </div>
                            <div class="col-4">
                                <?= $this->Form->control('salario', [
                                    'type' => 'text', 'label' => 'Salário', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o salário', 'value' => isset($user->salario) ? number_format($user->salario, 2, ',', '.') : null,
                                ]); ?>
                            </div>
                            <div class="col-3">
                                <?= $this->Form->data_personalizada('admissao', 'Data de Admissão', 'date', date('d/m/Y'), 'required', $funcionario->admissao); ?>
                            </div>
                            <div class="col-6">
                                <?= $this->Form->control('cargo_id', ['type' => 'select', 'label' => 'Cargo', 'options' => $cargos, 'class' => 'form-select', 'required' => 'required', 'placeholder' => 'Selecione o cargo', 'empty' => 'Selecione']); ?>
                            </div>
                            <div class="col-6">
                                <?= $this->Form->control('plano_saude_id', ['type' => 'select', 'label' => 'Plano de Saúde', 'options' => $planosSaudes, 'class' => 'form-select', 'required' => 'required', 'placeholder' => 'Selecione o plano', 'empty' => 'Selecione']); ?>
                            </div>
                            <div class="col-5">
                                <?= $this->Form->control('empresa_id', ['type' => 'select', 'label' => 'Empresa', 'options' => $empresas, 'class' => 'form-select', 'required' => 'required', 'placeholder' => 'Selecione a empresa', 'empty' => 'Selecione']); ?>
                            </div>
                            <div class="col-5">
                                <?= $this->Form->control('permissao', ['type' => 'select', 'label' => 'Permissão', 'options' => $roles, 'class' => 'form-select', 'required' => 'required', 'placeholder' => 'Selecione a permissão', 'empty' => 'Selecione']); ?>
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

