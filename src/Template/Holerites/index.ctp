<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Holerite[]|\Cake\Collection\CollectionInterface $holerites
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Holerite'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="holerites index large-9 medium-8 columns content">
    <h3><?= __('Holerites') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_admissao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('salario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adicional_noturno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_extra') ?></th>
                <th scope="col"><?= $this->Paginator->sort('inss') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fgts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ferias') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vale_alimentacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('horas_trabalhadas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('base_fgts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('base_inss') ?></th>
                <th scope="col"><?= $this->Paginator->sort('liquido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bruto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('funcionario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($holerites as $holerite): ?>
            <tr>
                <td><?= $this->Number->format($holerite->id) ?></td>
                <td><?= h($holerite->data) ?></td>
                <td><?= h($holerite->descricao) ?></td>
                <td><?= h($holerite->data_admissao) ?></td>
                <td><?= $this->Number->format($holerite->salario) ?></td>
                <td><?= $this->Number->format($holerite->adicional_noturno) ?></td>
                <td><?= $this->Number->format($holerite->hora_extra) ?></td>
                <td><?= $this->Number->format($holerite->inss) ?></td>
                <td><?= $this->Number->format($holerite->fgts) ?></td>
                <td><?= $this->Number->format($holerite->ir) ?></td>
                <td><?= $this->Number->format($holerite->ferias) ?></td>
                <td><?= $this->Number->format($holerite->vale_alimentacao) ?></td>
                <td><?= h($holerite->horas_trabalhadas) ?></td>
                <td><?= $this->Number->format($holerite->base_fgts) ?></td>
                <td><?= $this->Number->format($holerite->base_inss) ?></td>
                <td><?= $this->Number->format($holerite->liquido) ?></td>
                <td><?= $this->Number->format($holerite->bruto) ?></td>
                <td><?= $holerite->has('funcionario') ? $this->Html->link($holerite->funcionario->id, ['controller' => 'Funcionarios', 'action' => 'view', $holerite->funcionario->id]) : '' ?></td>
                <td><?= h($holerite->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $holerite->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $holerite->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $holerite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $holerite->id)]) ?>
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
