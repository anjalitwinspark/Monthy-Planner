<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reminder $reminder
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reminder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reminder->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Reminders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Expenses'), ['controller' => 'Expenses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expense'), ['controller' => 'Expenses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reminders form large-9 medium-8 columns content">
    <?= $this->Form->create($reminder) ?>
    <fieldset>
        <legend><?= __('Edit Reminder') ?></legend>
        <?php
            echo $this->Form->control('expense_id', ['options' => $expenses]);
            echo $this->Form->control('date');
            echo $this->Form->control('user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
