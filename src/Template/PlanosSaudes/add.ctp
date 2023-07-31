<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlanosSaude $planosSaude
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Planos Saudes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="planosSaudes form large-9 medium-8 columns content">
    <?= $this->Form->create($planosSaude) ?>
    <fieldset>
        <legend><?= __('Add Planos Saude') ?></legend>
        <?php
            echo $this->Form->control('registro');
            echo $this->Form->control('nome');
            echo $this->Form->control('descricao');
            echo $this->Form->control('telefone');
            echo $this->Form->control('celular');
            echo $this->Form->control('is_active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->

<div class="container-fluid my-2 py-3">
    <div class="col-12 mb-4">
        <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 col-9">
                        <h6 class="mb-0 font-weight-semibold text-lg">Adicionar Plano de Saúde</h6>
                        <p class="text-sm mb-1">Preencha os campos abaixo</p>
                    </div>
                    <div class="">
                        <?= $this->Form->create($planosSaude, ['class'=> 'row g-3']) ?>
                        <form class="row g-3">
                            <div class="col-4">
                                <?= $this->Form->control('registro', ['type' => 'text', 'label' => 'Registro', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o número do registro']); ?>
                            </div>
                            <div class="col-md-8">
                                <?= $this->Form->control('nome', ['type' => 'text', 'label' => 'Nome', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o nome do plano de saúde']); ?>
                            </div>
                            <div class="col-md-12">
                                <?= $this->Form->control('descricao', ['type' => 'text', 'label' => 'Descrição', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a descrição do plano']); ?>
                            </div>
                            <div class="col-md-5">
                                <?= $this->Form->control('telefone', ['type' => 'text', 'label' => 'Telefone', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o telefone']); ?>
                            </div>
                            <div class="col-md-5">
                                <?= $this->Form->control('celular', ['type' => 'text', 'label' => 'Celular', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o celular']); ?>
                            </div>

                            <div class="col-2">
                                <label for="" class="form-label"></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Ativo
                                    </label>
                                </div>
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
