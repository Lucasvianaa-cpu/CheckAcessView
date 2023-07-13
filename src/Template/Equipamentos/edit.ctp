<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipamento $equipamento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $equipamento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $equipamento->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Equipamentos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="equipamentos form large-9 medium-8 columns content">
    <?= $this->Form->create($equipamento) ?>
    <fieldset>
        <legend><?= __('Edit Equipamento') ?></legend>
        <?php
            echo $this->Form->control('num_patrimonio');
            echo $this->Form->control('descricao');
            echo $this->Form->control('is_active');
            echo $this->Form->control('funcionario_id', ['options' => $funcionarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
