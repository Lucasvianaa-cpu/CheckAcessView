<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuncionariosPlanto $funcionariosPlanto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Funcionarios Plantoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Plantoes'), ['controller' => 'Plantoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Planto'), ['controller' => 'Plantoes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funcionariosPlantoes form large-9 medium-8 columns content">
    <?= $this->Form->create($funcionariosPlanto) ?>
    <fieldset>
        <legend><?= __('Add Funcionarios Planto') ?></legend>
        <?php
            echo $this->Form->control('funcionario_id', ['options' => $funcionarios]);
            echo $this->Form->control('plantao_id', ['options' => $plantoes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
