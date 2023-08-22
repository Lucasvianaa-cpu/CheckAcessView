<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="container-fluid my-2 py-3">
    <div class="col-12 mb-4">
        <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 col-9">
                        <h6 class="mb-0 font-weight-semibold text-lg">Editar Usuário</h6>
                        <p class="text-sm mb-1">Edite os campos do usuário selecionada</p>
                    </div>
                    <div class="">
                        <?= $this->Form->create($user, ['class'=> 'row g-3']) ?>
                        <form class="row g-3">
                            <div class="col-12">
                                <?php echo $this->Form->control('nome',['type' => 'text', 'label' => 'Nome', 'class' => 'form-control', 'required' => 'required']);?>
                            </div>
                            <div class="col-6">
                                <?php echo $this->Form->control('cpf',['type' => 'text', 'label' => 'CPF', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                            <div class="col-6">
                                <?php echo $this->Form->control('rg',['type' => 'text', 'label' => 'RG', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                            <div class="col-6">
                                <?php echo $this->Form->control('email',['type' => 'text', 'label' => 'Email', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                            <div class="col-6">
                                <?php echo $this->Form->control('telefone',['type' => 'text', 'label' => 'Telefone', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                            <div class="col-6">
                                <?php echo $this->Form->control('data_nascimento',['type' => 'date', 'label' => 'Data Nascimento', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                            <div class="col-6">
                                <?php echo $this->Form->control('tipo_sanguineo',['type' => 'text', 'label' => 'Tipo Sanguíneo', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                            <div class="col-12">
                                <?php echo $this->Form->control('exp_profissional',['type' => 'text', 'label' => 'Experiência Profissional', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                            <div class="col-4">
                                <?php echo $this->Form->control('agencia',['type' => 'text', 'label' => 'Agência', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                            <div class="col-6">
                                <?php echo $this->Form->control('conta',['type' => 'text', 'label' => 'Conta', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                            <div class="col-2">
                                <?php echo $this->Form->control('codigo_banco',['type' => 'text', 'label' => 'Código do Banco', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                            <div class="col-6">
                                <?php echo $this->Form->control('pix',['type' => 'text', 'label' => 'Chave PIX', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                            <div class="col-6">
                                <?php echo $this->Form->control('uid_rfid',['type' => 'text', 'label' => 'Tag RFID', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                            <div class="col-8">
                                <?php echo $this->Form->control('email_empresarial',['type' => 'text', 'label' => 'Email Empresarial', 'class' => 'form-control', 'required' => 'required', 'placeholder']);?>
                            </div>
                            
                            <div class="col-md-2 pb-3">
                                <?php echo $this->Form->control('role_id',['type' => 'select','label' => 'Permissão', 'options' => $roles, 'class' => 'form-select', 'required']);?>
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

