<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PontosHora $pontosHora
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pontos Hora'), ['action' => 'edit', $pontosHora->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pontos Hora'), ['action' => 'delete', $pontosHora->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pontosHora->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pontos Horas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pontos Hora'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Historicos Pontos'), ['controller' => 'HistoricosPontos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Historicos Ponto'), ['controller' => 'HistoricosPontos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pontosHoras view large-9 medium-8 columns content">
    <h3><?= h($pontosHora->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Historicos Ponto') ?></th>
            <td><?= $pontosHora->has('historicos_ponto') ? $this->Html->link($pontosHora->historicos_ponto->id, ['controller' => 'HistoricosPontos', 'action' => 'view', $pontosHora->historicos_ponto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pontosHora->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Ponto') ?></th>
            <td><?= h($pontosHora->data_ponto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora') ?></th>
            <td><?= h($pontosHora->hora) ?></td>
        </tr>
    </table>
</div>
