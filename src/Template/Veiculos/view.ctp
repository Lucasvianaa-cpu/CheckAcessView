<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Veiculo $veiculo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Veiculo'), ['action' => 'edit', $veiculo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Veiculo'), ['action' => 'delete', $veiculo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $veiculo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Veiculos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Veiculo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="veiculos view large-9 medium-8 columns content">
    <h3><?= h($veiculo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Placa') ?></th>
            <td><?= h($veiculo->placa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modelo') ?></th>
            <td><?= h($veiculo->modelo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cor') ?></th>
            <td><?= h($veiculo->cor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Veiculoscol') ?></th>
            <td><?= h($veiculo->veiculoscol) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($veiculo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $veiculo->has('user') ? $this->Html->link($veiculo->user->id, ['controller' => 'Users', 'action' => 'view', $veiculo->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($veiculo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $this->Number->format($veiculo->is_active) ?></td>
        </tr>
    </table>
</div>
