<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Expenses'), ['controller' => 'Expenses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expense'), ['controller' => 'Expenses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Incomes'), ['controller' => 'Incomes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Income'), ['controller' => 'Incomes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Expenses') ?></h4>
        <?php if (!empty($user->expenses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Expense Field Id') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Recurring') ?></th>
                <th scope="col"><?= __('Recurring Duration') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->expenses as $expenses): ?>
            <tr>
                <td><?= h($expenses->id) ?></td>
                <td><?= h($expenses->user_id) ?></td>
                <td><?= h($expenses->expense_field_id) ?></td>
                <td><?= h($expenses->value) ?></td>
                <td><?= h($expenses->description) ?></td>
                <td><?= h($expenses->recurring) ?></td>
                <td><?= h($expenses->recurring_duration) ?></td>
                <td><?= h($expenses->created) ?></td>
                <td><?= h($expenses->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Expenses', 'action' => 'view', $expenses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Expenses', 'action' => 'edit', $expenses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Expenses', 'action' => 'delete', $expenses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expenses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Incomes') ?></h4>
        <?php if (!empty($user->incomes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Income Field Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->incomes as $incomes): ?>
            <tr>
                <td><?= h($incomes->id) ?></td>
                <td><?= h($incomes->user_id) ?></td>
                <td><?= h($incomes->income_field_id) ?></td>
                <td><?= h($incomes->created) ?></td>
                <td><?= h($incomes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Incomes', 'action' => 'view', $incomes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Incomes', 'action' => 'edit', $incomes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Incomes', 'action' => 'delete', $incomes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $incomes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
