<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Empresa $empresa
 */
?>

<head>

<?= $this->fetch('script') ?>

<?= $this->Html->script('https://code.jquery.com/jquery-3.6.4.min.js', ['block' => 'script']); ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js', ['block' => 'script']); ?>

</head>
<div class="container-fluid my-2 py-3">
    <div class="col-12 mb-4">
        <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 col-9">
                        <h6 class="mb-0 font-weight-semibold text-lg">Adicionar Empresa</h6>
                        <p class="text-sm mb-1">Preencha os campos abaixo</p>
                    </div>
                    <div class="">
                        <?= $this->Form->create($empresa, ['class'=> 'row g-3']) ?>
                        <form class="row g-3">
                            <div class="col-12">
                                <?= $this->Form->control('razao_social', ['type' => 'text', 'label' => 'Razão Social', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a razão social']); ?>
                            </div>
                            <div class="col-md-8">
                                <?= $this->Form->control('nome_fantasia', ['type' => 'text', 'label' => 'Nome Fantasia', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o nome fantasia']); ?>
                            </div>
                            <div class="col-md-4">
                            <?= $this->Form->control('cnpj', ['type' => 'text', 'label' => 'CNPJ', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o CNPJ', 'id' => 'cnpj']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('ie', ['type' => 'text', 'label' => 'IE', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a Inscrição Estadual']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('cep', ['type' => 'text', 'label' => 'CEP', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o CEP', 'id' => 'cep']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('endereco', ['type' => 'text', 'label' => 'Rua', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a Rua']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('numero', ['type' => 'number', 'label' => 'Número', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o Número']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('bairro', ['type' => 'text', 'label' => 'Bairro', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o Bairro']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('telefone', ['type' => 'text', 'label' => 'Telefone', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o telefone']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('qtd_funcionarios', ['type' => 'number', 'label' => 'Qtd. Funcionários', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite a quantidade de funcionários']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('desc_empresa', ['type' => 'text', 'label' => 'Descrição', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Faça um breve resumo de sua empresa...']); ?>
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

<?= $this->Html->script('https://code.jquery.com/jquery-3.6.4.min.js', ['block' => 'script']); ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js', ['block' => 'script']); ?>


        <?= $this->Html->scriptBlock('
            jQuery(document).ready(function($) {
                $("#cnpj").mask("00.000.000/0000-00");
            });
        '); ?>
