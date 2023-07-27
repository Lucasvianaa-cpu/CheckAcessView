<div class="container">
    <div>
        <div class="card-body" style="padding: 20px 20px 20px 20px!important;">
            <?= $this->Form->create($user) ?>
            <div class="col-xs-12 col-md-6">
                <?= $user->nome ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <?= $this->Form->control('roles_id', ['label' => 'Permissão', 'class' => 'form-select', 'default' => $user->role_id, 'options' => $roles, 'empty' => 'Selecione', 'required' => 'required']); ?>
            </div>
            <?= $this->Form->button(__('Confirmar Alteração'), ['class' => 'btn btn-primary mt-3']) ?>
        </div>
    </div>

    <?= $this->Form->end() ?>

</div>

