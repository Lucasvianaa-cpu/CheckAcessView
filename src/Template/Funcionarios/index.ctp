<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario[]|\Cake\Collection\CollectionInterface $funcionarios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cargos'), ['controller' => 'Cargos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cargo'), ['controller' => 'Cargos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Planos Saudes'), ['controller' => 'PlanosSaudes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Planos Saude'), ['controller' => 'PlanosSaudes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipamentos'), ['controller' => 'Equipamentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipamento'), ['controller' => 'Equipamentos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Historicos Pontos'), ['controller' => 'HistoricosPontos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Historicos Ponto'), ['controller' => 'HistoricosPontos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Holerites'), ['controller' => 'Holerites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Holerite'), ['controller' => 'Holerites', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Plantoes'), ['controller' => 'Plantoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Planto'), ['controller' => 'Plantoes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funcionarios index large-9 medium-8 columns content">
    <h3><?= __('Funcionarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('salario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cargo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plano_saude_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcionarios as $funcionario): ?>
            <tr>
                <td><?= $this->Number->format($funcionario->id) ?></td>
                <td><?= $this->Number->format($funcionario->salario) ?></td>
                <td><?= $funcionario->has('cargo') ? $this->Html->link($funcionario->cargo->id, ['controller' => 'Cargos', 'action' => 'view', $funcionario->cargo->id]) : '' ?></td>
                <td><?= $this->Number->format($funcionario->is_active) ?></td>
                <td><?= $funcionario->has('planos_saude') ? $this->Html->link($funcionario->planos_saude->id, ['controller' => 'PlanosSaudes', 'action' => 'view', $funcionario->planos_saude->id]) : '' ?></td>
                <td><?= $funcionario->has('empresa') ? $this->Html->link($funcionario->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $funcionario->empresa->id]) : '' ?></td>
                <td><?= $funcionario->has('user') ? $this->Html->link($funcionario->user->id, ['controller' => 'Users', 'action' => 'view', $funcionario->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $funcionario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $funcionario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $funcionario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Botão de adicionar-->
    <div> 
        <a class="nav-link " href="<?= $this->Url->build(['controller' => 'Funcionarios', 'action' => 'add']); ?> "?>
        <span class="nav-link-text ms-1">Vincular Usuário ao Funcionário</span> 
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
