<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipamento $equipamento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Equipamento'), ['action' => 'edit', $equipamento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Equipamento'), ['action' => 'delete', $equipamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipamento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Equipamentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipamento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="equipamentos view large-9 medium-8 columns content">
    <h3><?= h($equipamento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Num Patrimonio') ?></th>
            <td><?= h($equipamento->num_patrimonio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($equipamento->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($equipamento->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Funcionario') ?></th>
            <td><?= $equipamento->has('funcionario') ? $this->Html->link($equipamento->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $equipamento->funcionario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($equipamento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $this->Number->format($equipamento->is_active) ?></td>
        </tr>
    </table>
</div>
