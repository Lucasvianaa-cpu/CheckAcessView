<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $role->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($role) ?>
    <fieldset>
        <legend><?= __('Edit Role') ?></legend>
        <?php
            echo $this->Form->control('is_active');
            echo $this->Form->control('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
