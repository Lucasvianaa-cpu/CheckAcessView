<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipamento $equipamento
 */
?>
<div class="container-fluid my-2 py-3">
    <div class="col-12 mb-4">
        <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 col-9">
                        <h6 class="mb-0 font-weight-semibold text-lg">Editar Equipamento</h6>
                        <p class="text-sm mb-1">Edite os campos do equipamento selecionado</p>
                    </div>
                    <div class="">
                        <?= $this->Form->create($equipamento, ['class'=> 'row g-3']) ?>
                        <form class="row g-3">
                            <div class="col-4">
                                <?php echo $this->Form->control('num_patrimonio',['type' => 'text', 'label' => 'Nº Patrimônio', 'class' => 'form-control', 'required' => 'required']);?>
                            </div>
                            <div class="col-8">
                                <?php echo $this->Form->control('descricao',['type' => 'text', 'label' => 'Descrição', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                        
                            <div class="col-md-5 pb-3">
                                <?php echo $this->Form->control('funcionario_id',['type' => 'select','label' => 'Responsável', 'options' => $funcionarios, 'class' => 'form-select', 'required']);?>
                            </div>
                            <div class="col-2 checkbox-input">
                                <label for="" class="form-label"></label>
                                <div class="form-check mt-2">
                                    <?= $this->Form->control('is_active', ['type' => 'checkbox', 'label' => 'Ativo', 'class' => 'form-check-input']); ?>
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

