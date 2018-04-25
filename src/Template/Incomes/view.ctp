<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Income $income
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Income'), ['action' => 'edit', $income->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Income'), ['action' => 'delete', $income->id], ['confirm' => __('Are you sure you want to delete # {0}?', $income->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Incomes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Income'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Income Fields'), ['controller' => 'IncomeFields', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Income Field'), ['controller' => 'IncomeFields', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="incomes view large-9 medium-8 columns content">
    <h3><?= h($income->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $income->has('user') ? $this->Html->link($income->user->name, ['controller' => 'Users', 'action' => 'view', $income->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Income Field') ?></th>
            <td><?= $income->has('income_field') ? $this->Html->link($income->income_field->name, ['controller' => 'IncomeFields', 'action' => 'view', $income->income_field->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($income->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= $this->Number->format($income->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($income->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($income->modified) ?></td>
        </tr>
    </table>
</div>
