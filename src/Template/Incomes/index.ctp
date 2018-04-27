<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Income[]|\Cake\Collection\CollectionInterface $incomes
 */
?>

<div class="incomes index large-9 medium-8 columns content">
    <h3><?= __('Incomes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('income_field_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($incomes as $income): ?>
            <tr>
                <td><?= $this->Number->format($income->id) ?></td>
                <td><?= $income->has('user') ? $this->Html->link($income->user->name, ['controller' => 'Users', 'action' => 'view', $income->user->id]) : '' ?></td>
                <td><?= $income->has('income_field') ? $this->Html->link($income->income_field->name, ['controller' => 'IncomeFields', 'action' => 'view', $income->income_field->id]) : '' ?></td>
                <td><?= h($income->created) ?></td>
                <td><?= h($income->modified) ?></td>
                <td><?= $this->Number->format($income->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $income->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $income->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $income->id], ['confirm' => __('Are you sure you want to delete # {0}?', $income->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
