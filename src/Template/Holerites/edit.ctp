<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Holerite $holerite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $holerite->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $holerite->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Holerites'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="holerites form large-9 medium-8 columns content">
    <?= $this->Form->create($holerite) ?>
    <fieldset>
        <legend><?= __('Edit Holerite') ?></legend>
        <?php
            echo $this->Form->control('data');
            echo $this->Form->control('descricao');
            echo $this->Form->control('data_admissao');
            echo $this->Form->control('salario');
            echo $this->Form->control('adicional_noturno');
            echo $this->Form->control('hora_extra');
            echo $this->Form->control('inss');
            echo $this->Form->control('fgts');
            echo $this->Form->control('ir');
            echo $this->Form->control('ferias');
            echo $this->Form->control('vale_alimentacao');
            echo $this->Form->control('horas_trabalhadas');
            echo $this->Form->control('base_fgts');
            echo $this->Form->control('base_inss');
            echo $this->Form->control('liquido');
            echo $this->Form->control('bruto');
            echo $this->Form->control('funcionario_id', ['options' => $funcionarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
