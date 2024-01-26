<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cidade $cidade
 */
?>

<div class="container-fluid my-2 py-3">
    <nav aria-label="breadcrumb" style="margin-bottom: 20px; margin-top: -50px;">
        <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="<?= $this->Url->build(['controller' => 'Cidades', 'action' => 'index']); ?>">Visualizar Cidades</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Cadastrar Cidade</li>
        </ol>
    </nav>
    <div class="col-12 mb-4">
        <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 col-9">
                        <h6 class="mb-0 font-weight-semibold text-lg">Adicionar Cidade</h6>
                        <p class="text-sm mb-1">Preencha os campos abaixo</p>
                    </div>
                    <div class="">
                        <?= $this->Form->create($cidade, ['class' => 'row g-3']) ?>
                        <form class="row g-3">
                            <div class="col-8">
                                <?= $this->Form->control('nome', ['type' => 'text', 'label' => 'Nome da Cidade', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o número de registro']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('estado_id', ['type' => 'select', 'label' => 'Estado', 'options' => $estados, 'class' => 'form-select', 'required' => 'required', 'placeholder' => 'Selecione o estado', 'empty' => 'Selecione']); ?>
                            </div>
                            <div class="col-md-12 pb-3">
                                <?= $this->Form->control('cod_ibge', ['type' => 'text', 'label' => 'Código IBGE', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o código do IBGE']); ?>
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