<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistoricosPonto[]|\Cake\Collection\CollectionInterface $historicosPontos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Historicos Ponto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="historicosPontos index large-9 medium-8 columns content">
    <h3><?= __('Historicos Pontos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('funcionario_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historicosPontos as $historicosPonto): ?>
            <tr>
                <td><?= $this->Number->format($historicosPonto->id) ?></td>
                <td><?= h($historicosPonto->created) ?></td>
                <td><?= $historicosPonto->has('funcionario') ? $this->Html->link($historicosPonto->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $historicosPonto->funcionario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $historicosPonto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $historicosPonto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $historicosPonto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historicosPonto->id)]) ?>
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
