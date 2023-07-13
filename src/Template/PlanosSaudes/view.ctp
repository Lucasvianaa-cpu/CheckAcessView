<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlanosSaude $planosSaude
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Planos Saude'), ['action' => 'edit', $planosSaude->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Planos Saude'), ['action' => 'delete', $planosSaude->id], ['confirm' => __('Are you sure you want to delete # {0}?', $planosSaude->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Planos Saudes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Planos Saude'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="planosSaudes view large-9 medium-8 columns content">
    <h3><?= h($planosSaude->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Registro') ?></th>
            <td><?= h($planosSaude->registro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($planosSaude->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($planosSaude->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($planosSaude->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular') ?></th>
            <td><?= h($planosSaude->celular) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($planosSaude->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $this->Number->format($planosSaude->is_active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($planosSaude->created) ?></td>
        </tr>
    </table>
</div>
