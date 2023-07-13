<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuncionariosPlanto $funcionariosPlanto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Funcionarios Planto'), ['action' => 'edit', $funcionariosPlanto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Funcionarios Planto'), ['action' => 'delete', $funcionariosPlanto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionariosPlanto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios Plantoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionarios Planto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Plantoes'), ['controller' => 'Plantoes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Planto'), ['controller' => 'Plantoes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="funcionariosPlantoes view large-9 medium-8 columns content">
    <h3><?= h($funcionariosPlanto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Funcionario') ?></th>
            <td><?= $funcionariosPlanto->has('funcionario') ? $this->Html->link($funcionariosPlanto->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $funcionariosPlanto->funcionario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Planto') ?></th>
            <td><?= $funcionariosPlanto->has('planto') ? $this->Html->link($funcionariosPlanto->planto->id, ['controller' => 'Plantoes', 'action' => 'view', $funcionariosPlanto->planto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($funcionariosPlanto->id) ?></td>
        </tr>
    </table>
</div>
