<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roles view large-9 medium-8 columns content">
    <h3><?= h($role->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($role->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($role->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $this->Number->format($role->is_active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($role->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($role->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Sobrenome') ?></th>
                <th scope="col"><?= __('Cpf') ?></th>
                <th scope="col"><?= __('Rg') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Telefone') ?></th>
                <th scope="col"><?= __('Salario') ?></th>
                <th scope="col"><?= __('Data Nascimento') ?></th>
                <th scope="col"><?= __('Tipo Sanguineo') ?></th>
                <th scope="col"><?= __('Exp Profissional') ?></th>
                <th scope="col"><?= __('Agencia') ?></th>
                <th scope="col"><?= __('Conta') ?></th>
                <th scope="col"><?= __('Codigo Banco') ?></th>
                <th scope="col"><?= __('Pix') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Uid Rfid') ?></th>
                <th scope="col"><?= __('Email Empresarial') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($role->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->is_active) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->nome) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->sobrenome) ?></td>
                <td><?= h($users->cpf) ?></td>
                <td><?= h($users->rg) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->telefone) ?></td>
                <td><?= h($users->salario) ?></td>
                <td><?= h($users->data_nascimento) ?></td>
                <td><?= h($users->tipo_sanguineo) ?></td>
                <td><?= h($users->exp_profissional) ?></td>
                <td><?= h($users->agencia) ?></td>
                <td><?= h($users->conta) ?></td>
                <td><?= h($users->codigo_banco) ?></td>
                <td><?= h($users->pix) ?></td>
                <td><?= h($users->role_id) ?></td>
                <td><?= h($users->uid_rfid) ?></td>
                <td><?= h($users->email_empresarial) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
