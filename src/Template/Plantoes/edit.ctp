<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Planto $planto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $planto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $planto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Plantoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="plantoes form large-9 medium-8 columns content">
    <?= $this->Form->create($planto) ?>
    <fieldset>
        <legend><?= __('Edit Planto') ?></legend>
        <?php
            echo $this->Form->control('data');
            echo $this->Form->control('hora_total');
            echo $this->Form->control('hora_inicio');
            echo $this->Form->control('hora_termino');
            echo $this->Form->control('funcionario_id');
            echo $this->Form->control('funcionarios._ids', ['options' => $funcionarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
