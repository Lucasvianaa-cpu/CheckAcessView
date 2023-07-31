<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Veiculo $veiculo
 */
?>

<div class="container-fluid my-2 py-3">
    <div class="col-12 mb-4">
        <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 col-9">
                        <h6 class="mb-0 font-weight-semibold text-lg">Adicionar Veículo</h6>
                        <p class="text-sm mb-1">Preencha os campos abaixo</p>
                    </div>
                    <div class="">
                        <?= $this->Form->create($veiculo, ['class'=> 'row g-3']) ?>
                        <form class="row g-3">
                            <div class="col-12">
                                <?= $this->Form->control('modelo', ['type' => 'text', 'label' => 'Modelo', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o modelo o veículo']); ?>
                            </div>
                            <div class="col-md-8">
                                <?= $this->Form->control('cor', ['type' => 'text', 'label' => 'Cor', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a cor']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('placa', ['type' => 'text', 'label' => 'Placa', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a placa']); ?>
                            </div>
                            <div class="col-md-10 pb-3">
                                <?= $this->Form->control('user_id', ['type' => 'select','label' => 'Funcionário', 'options' => $users, 'class' => 'form-select', 'required' => 'required', 'placeholder' => 'Selecione o funcionário', 'empty' => 'Selecione'  ]); ?>           
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
