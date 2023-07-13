<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlanosSaude $planosSaude
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $planosSaude->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $planosSaude->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Planos Saudes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="planosSaudes form large-9 medium-8 columns content">
    <?= $this->Form->create($planosSaude) ?>
    <fieldset>
        <legend><?= __('Edit Planos Saude') ?></legend>
        <?php
            echo $this->Form->control('registro');
            echo $this->Form->control('nome');
            echo $this->Form->control('descricao');
            echo $this->Form->control('telefone');
            echo $this->Form->control('celular');
            echo $this->Form->control('is_active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
