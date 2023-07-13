<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Planto[]|\Cake\Collection\CollectionInterface $plantoes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Planto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="plantoes index large-9 medium-8 columns content">
    <h3><?= __('Plantoes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_termino') ?></th>
                <th scope="col"><?= $this->Paginator->sort('funcionario_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($plantoes as $planto): ?>
            <tr>
                <td><?= $this->Number->format($planto->id) ?></td>
                <td><?= h($planto->data) ?></td>
                <td><?= h($planto->hora_total) ?></td>
                <td><?= h($planto->hora_inicio) ?></td>
                <td><?= h($planto->hora_termino) ?></td>
                <td><?= $this->Number->format($planto->funcionario_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $planto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $planto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $planto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $planto->id)]) ?>
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
