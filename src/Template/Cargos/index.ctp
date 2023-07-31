<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cargo[]|\Cake\Collection\CollectionInterface $cargos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cargo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cargos index large-9 medium-8 columns content">
    <h3><?= __('Cargos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cargos as $cargo): ?>
            <tr>
                <td><?= $this->Number->format($cargo->id) ?></td>
                <td><?= h($cargo->nome) ?></td>
                <td><?= h($cargo->descricao) ?></td>
                <td><?= $cargo->has('categoria') ? $this->Html->link($cargo->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $cargo->categoria->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cargo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cargo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cargo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cargo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Botão de adicionar-->
    <div> 
        <a class="nav-link " href="<?= $this->Url->build(['controller' => 'Cargos', 'action' => 'add']); ?> "?>
        <span class="nav-link-text ms-1">Adicionar Cargo</span> 
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
