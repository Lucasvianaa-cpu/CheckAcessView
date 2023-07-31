<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cargo $cargo
 */
?>

<div class="container-fluid my-2 py-3">
    <div class="col-12 mb-4">
        <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 col-9">
                        <h6 class="mb-0 font-weight-semibold text-lg">Adicionar Cargos</h6>
                        <p class="text-sm mb-1">Preencha os campos abaixo</p>
                    </div>
                    <div class="">
                        <?= $this->Form->create($cargo, ['class'=> 'row g-3']) ?>
                        <form class="row g-3">
                            <div class="col-12">
                                <?= $this->Form->control('nome', ['type' => 'text', 'label' => 'Nome', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o nome da categoria']); ?>
                            </div>
                            <div class="col-8">
                                <?= $this->Form->control('descricao', ['type' => 'text', 'label' => 'Descrição', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a descrição da categoria']); ?>
                            </div>
                            <div class="col-md-4 pb-3">
                                <?= $this->Form->control('categoria_id', ['type' => 'select','label' => 'Categoria', 'options' => $categorias, 'class' => 'form-select', 'required' => 'required', 'placeholder' => 'Selecione a categoria', 'empty' => 'Selecione'  ]); ?>           
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


