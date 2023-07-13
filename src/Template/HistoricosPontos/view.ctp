<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistoricosPonto $historicosPonto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Historicos Ponto'), ['action' => 'edit', $historicosPonto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Historicos Ponto'), ['action' => 'delete', $historicosPonto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historicosPonto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Historicos Pontos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Historicos Ponto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="historicosPontos view large-9 medium-8 columns content">
    <h3><?= h($historicosPonto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($historicosPonto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Funcionario') ?></th>
            <td><?= $historicosPonto->has('funcionario') ? $this->Html->link($historicosPonto->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $historicosPonto->funcionario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($historicosPonto->id) ?></td>
        </tr>
    </table>
</div>
