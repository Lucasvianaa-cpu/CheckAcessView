<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Veiculos'), ['controller' => 'Veiculos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Veiculo'), ['controller' => 'Veiculos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($user->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sobrenome') ?></th>
            <td><?= h($user->sobrenome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cpf') ?></th>
            <td><?= h($user->cpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rg') ?></th>
            <td><?= h($user->rg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($user->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Sanguineo') ?></th>
            <td><?= h($user->tipo_sanguineo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Exp Profissional') ?></th>
            <td><?= h($user->exp_profissional) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Agencia') ?></th>
            <td><?= h($user->agencia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conta') ?></th>
            <td><?= h($user->conta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codigo Banco') ?></th>
            <td><?= h($user->codigo_banco) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pix') ?></th>
            <td><?= h($user->pix) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->id, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Uid Rfid') ?></th>
            <td><?= h($user->uid_rfid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Empresarial') ?></th>
            <td><?= h($user->email_empresarial) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $this->Number->format($user->is_active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Salario') ?></th>
            <td><?= $this->Number->format($user->salario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Nascimento') ?></th>
            <td><?= h($user->data_nascimento) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Veiculos') ?></h4>
        <?php if (!empty($user->veiculos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Placa') ?></th>
                <th scope="col"><?= __('Modelo') ?></th>
                <th scope="col"><?= __('Cor') ?></th>
                <th scope="col"><?= __('Veiculoscol') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->veiculos as $veiculos): ?>
            <tr>
                <td><?= h($veiculos->id) ?></td>
                <td><?= h($veiculos->placa) ?></td>
                <td><?= h($veiculos->modelo) ?></td>
                <td><?= h($veiculos->cor) ?></td>
                <td><?= h($veiculos->veiculoscol) ?></td>
                <td><?= h($veiculos->created) ?></td>
                <td><?= h($veiculos->is_active) ?></td>
                <td><?= h($veiculos->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Veiculos', 'action' => 'view', $veiculos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Veiculos', 'action' => 'edit', $veiculos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Veiculos', 'action' => 'delete', $veiculos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $veiculos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
