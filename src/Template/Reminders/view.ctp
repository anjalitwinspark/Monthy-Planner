<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reminder $reminder
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reminder'), ['action' => 'edit', $reminder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reminder'), ['action' => 'delete', $reminder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reminder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reminders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reminder'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Expenses'), ['controller' => 'Expenses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expense'), ['controller' => 'Expenses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reminders view large-9 medium-8 columns content">
    <h3><?= h($reminder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Expense') ?></th>
            <td><?= $reminder->has('expense') ? $this->Html->link($reminder->expense->id, ['controller' => 'Expenses', 'action' => 'view', $reminder->expense->id]) : '' ?></td>
        </tr>
        <tr>

            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($reminder->description) ?></td>
        </tr>
        <tr>

            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reminder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($reminder->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($reminder->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($reminder->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($reminder->modified) ?></td>
        </tr>
    </table>
</div>
