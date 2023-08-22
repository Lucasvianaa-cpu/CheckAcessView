<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cidade $cidade
 */
?>


<div class="container-fluid my-2 py-3">
    <div class="col-12 mb-4">
        <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 col-9">
                        <h6 class="mb-0 font-weight-semibold text-lg">Editar Cidade</h6>
                        <p class="text-sm mb-1">Edite os campos da cidade selecionada</p>
                    </div>
                    <div class="">
                        <?= $this->Form->create($cidade, ['class'=> 'row g-3']) ?>
                        <form class="row g-3">
                            <div class="col-12">
                                <?php echo $this->Form->control('nome',['type' => 'text', 'label' => 'Nome', 'class' => 'form-control', 'required' => 'required']);?>
                            </div>
                            <div class="col-8">
                                <?php echo $this->Form->control('cod_ibge',['type' => 'text', 'label' => 'Código IBGE', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                            <div class="col-md-4 pb-3">
                                <?php echo $this->Form->control('estado_id',['type' => 'select','label' => 'Estado', 'options' => $estados, 'class' => 'form-select', 'required']);?>
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
