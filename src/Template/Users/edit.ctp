<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Veiculos'), ['controller' => 'Veiculos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Veiculo'), ['controller' => 'Veiculos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('is_active');
            echo $this->Form->control('nome');
            echo $this->Form->control('password');
            echo $this->Form->control('sobrenome');
            echo $this->Form->control('cpf');
            echo $this->Form->control('rg');
            echo $this->Form->control('email');
            echo $this->Form->control('telefone');
            echo $this->Form->control('salario');
            echo $this->Form->control('data_nascimento');
            echo $this->Form->control('tipo_sanguineo');
            echo $this->Form->control('exp_profissional');
            echo $this->Form->control('agencia');
            echo $this->Form->control('conta');
            echo $this->Form->control('codigo_banco');
            echo $this->Form->control('pix');
            echo $this->Form->control('role_id', ['options' => $roles]);
            echo $this->Form->control('uid_rfid');
            echo $this->Form->control('email_empresarial');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
