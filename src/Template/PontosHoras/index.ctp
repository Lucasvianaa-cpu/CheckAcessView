<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PontosHora[]|\Cake\Collection\CollectionInterface $pontosHoras
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pontos Hora'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Historicos Pontos'), ['controller' => 'HistoricosPontos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Historicos Ponto'), ['controller' => 'HistoricosPontos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pontosHoras index large-9 medium-8 columns content">
    <h3><?= __('Pontos Horas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_ponto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('historico_ponto_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pontosHoras as $pontosHora): ?>
            <tr>
                <td><?= $this->Number->format($pontosHora->id) ?></td>
                <td><?= h($pontosHora->data_ponto) ?></td>
                <td><?= h($pontosHora->hora) ?></td>
                <td><?= $pontosHora->has('historicos_ponto') ? $this->Html->link($pontosHora->historicos_ponto->id, ['controller' => 'HistoricosPontos', 'action' => 'view', $pontosHora->historicos_ponto->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pontosHora->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pontosHora->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pontosHora->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pontosHora->id)]) ?>
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
