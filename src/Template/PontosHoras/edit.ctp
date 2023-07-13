<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PontosHora $pontosHora
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pontosHora->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pontosHora->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pontos Horas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Historicos Pontos'), ['controller' => 'HistoricosPontos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Historicos Ponto'), ['controller' => 'HistoricosPontos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pontosHoras form large-9 medium-8 columns content">
    <?= $this->Form->create($pontosHora) ?>
    <fieldset>
        <legend><?= __('Edit Pontos Hora') ?></legend>
        <?php
            echo $this->Form->control('data_ponto');
            echo $this->Form->control('hora');
            echo $this->Form->control('historico_ponto_id', ['options' => $historicosPontos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
