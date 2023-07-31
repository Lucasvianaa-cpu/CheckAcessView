<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlanosSaude[]|\Cake\Collection\CollectionInterface $planosSaudes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Planos Saude'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="planosSaudes index large-9 medium-8 columns content">
    <h3><?= __('Planos Saudes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('celular') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($planosSaudes as $planosSaude): ?>
            <tr>
                <td><?= $this->Number->format($planosSaude->id) ?></td>
                <td><?= h($planosSaude->registro) ?></td>
                <td><?= h($planosSaude->nome) ?></td>
                <td><?= h($planosSaude->descricao) ?></td>
                <td><?= h($planosSaude->telefone) ?></td>
                <td><?= h($planosSaude->celular) ?></td>
                <td><?= h($planosSaude->created) ?></td>
                <td><?= $this->Number->format($planosSaude->is_active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $planosSaude->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $planosSaude->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $planosSaude->id], ['confirm' => __('Are you sure you want to delete # {0}?', $planosSaude->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Botão de adicionar-->
    <div> 
        <a class="nav-link " href="<?= $this->Url->build(['controller' => 'PlanosSaudes', 'action' => 'add']); ?> "?>
        <span class="nav-link-text ms-1">Adicionar Plano de Saúde</span> 
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
