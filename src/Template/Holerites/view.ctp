<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Holerite $holerite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Holerite'), ['action' => 'edit', $holerite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Holerite'), ['action' => 'delete', $holerite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $holerite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Holerites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Holerite'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="holerites view large-9 medium-8 columns content">
    <h3><?= h($holerite->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($holerite->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Funcionario') ?></th>
            <td><?= $holerite->has('funcionario') ? $this->Html->link($holerite->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $holerite->funcionario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($holerite->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($holerite->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Salario') ?></th>
            <td><?= $this->Number->format($holerite->salario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adicional Noturno') ?></th>
            <td><?= $this->Number->format($holerite->adicional_noturno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Extra') ?></th>
            <td><?= $this->Number->format($holerite->hora_extra) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Inss') ?></th>
            <td><?= $this->Number->format($holerite->inss) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fgts') ?></th>
            <td><?= $this->Number->format($holerite->fgts) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ir') ?></th>
            <td><?= $this->Number->format($holerite->ir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ferias') ?></th>
            <td><?= $this->Number->format($holerite->ferias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vale Alimentacao') ?></th>
            <td><?= $this->Number->format($holerite->vale_alimentacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Base Fgts') ?></th>
            <td><?= $this->Number->format($holerite->base_fgts) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Base Inss') ?></th>
            <td><?= $this->Number->format($holerite->base_inss) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Liquido') ?></th>
            <td><?= $this->Number->format($holerite->liquido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bruto') ?></th>
            <td><?= $this->Number->format($holerite->bruto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($holerite->data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Admissao') ?></th>
            <td><?= h($holerite->data_admissao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Horas Trabalhadas') ?></th>
            <td><?= h($holerite->horas_trabalhadas) ?></td>
        </tr>
    </table>
</div>
