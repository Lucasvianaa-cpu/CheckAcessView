<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Planto $planto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Planto'), ['action' => 'edit', $planto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Planto'), ['action' => 'delete', $planto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $planto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Plantoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Planto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="plantoes view large-9 medium-8 columns content">
    <h3><?= h($planto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($planto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Funcionario Id') ?></th>
            <td><?= $this->Number->format($planto->funcionario_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($planto->data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Total') ?></th>
            <td><?= h($planto->hora_total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Inicio') ?></th>
            <td><?= h($planto->hora_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Termino') ?></th>
            <td><?= h($planto->hora_termino) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Funcionarios') ?></h4>
        <?php if (!empty($planto->funcionarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Salario') ?></th>
                <th scope="col"><?= __('Cargo Id') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col"><?= __('Plano Saude Id') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($planto->funcionarios as $funcionarios): ?>
            <tr>
                <td><?= h($funcionarios->id) ?></td>
                <td><?= h($funcionarios->salario) ?></td>
                <td><?= h($funcionarios->cargo_id) ?></td>
                <td><?= h($funcionarios->is_active) ?></td>
                <td><?= h($funcionarios->plano_saude_id) ?></td>
                <td><?= h($funcionarios->empresa_id) ?></td>
                <td><?= h($funcionarios->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Funcionarios', 'action' => 'view', $funcionarios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Funcionarios', 'action' => 'edit', $funcionarios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Funcionarios', 'action' => 'delete', $funcionarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionarios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
