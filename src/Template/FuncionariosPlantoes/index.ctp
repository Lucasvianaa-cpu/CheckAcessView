<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuncionariosPlanto[]|\Cake\Collection\CollectionInterface $funcionariosPlantoes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Funcionarios Planto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Plantoes'), ['controller' => 'Plantoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Planto'), ['controller' => 'Plantoes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funcionariosPlantoes index large-9 medium-8 columns content">
    <h3><?= __('Funcionarios Plantoes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('funcionario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plantao_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcionariosPlantoes as $funcionariosPlanto): ?>
            <tr>
                <td><?= $this->Number->format($funcionariosPlanto->id) ?></td>
                <td><?= $funcionariosPlanto->has('funcionario') ? $this->Html->link($funcionariosPlanto->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $funcionariosPlanto->funcionario->id]) : '' ?></td>
                <td><?= $funcionariosPlanto->has('planto') ? $this->Html->link($funcionariosPlanto->planto->id, ['controller' => 'Plantoes', 'action' => 'view', $funcionariosPlanto->planto->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $funcionariosPlanto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $funcionariosPlanto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $funcionariosPlanto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionariosPlanto->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
