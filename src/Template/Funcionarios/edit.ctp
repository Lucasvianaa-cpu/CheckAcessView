<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario $funcionario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $funcionario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['action' => 'index']) ?></li>
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
<div class="funcionarios form large-9 medium-8 columns content">
    <?= $this->Form->create($funcionario) ?>
    <fieldset>
        <legend><?= __('Edit Funcionario') ?></legend>
        <?php
            echo $this->Form->control('salario');
            echo $this->Form->control('cargo_id', ['options' => $cargos]);
            echo $this->Form->control('is_active');
            echo $this->Form->control('plano_saude_id', ['options' => $planosSaudes, 'empty' => true]);
            echo $this->Form->control('empresa_id', ['options' => $empresas]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('plantoes._ids', ['options' => $plantoes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
