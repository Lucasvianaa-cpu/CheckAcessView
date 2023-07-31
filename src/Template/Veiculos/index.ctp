<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Veiculo[]|\Cake\Collection\CollectionInterface $veiculos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Veiculo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="veiculos index large-9 medium-8 columns content">
    <h3><?= __('Veiculos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('placa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modelo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('veiculoscol') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($veiculos as $veiculo): ?>
            <tr>
                <td><?= $this->Number->format($veiculo->id) ?></td>
                <td><?= h($veiculo->placa) ?></td>
                <td><?= h($veiculo->modelo) ?></td>
                <td><?= h($veiculo->cor) ?></td>
                <td><?= h($veiculo->veiculoscol) ?></td>
                <td><?= h($veiculo->created) ?></td>
                <td><?= $this->Number->format($veiculo->is_active) ?></td>
                <td><?= $veiculo->has('user') ? $this->Html->link($veiculo->user->id, ['controller' => 'Users', 'action' => 'view', $veiculo->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $veiculo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $veiculo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $veiculo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $veiculo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Botão de adicionar-->
    <div> 
        <a class="nav-link " href="<?= $this->Url->build(['controller' => 'Veiculos', 'action' => 'add']); ?> "?>
        <span class="nav-link-text ms-1">Adicionar Veículo</span> 
    </div>

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
