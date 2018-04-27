<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expense[]|\Cake\Collection\CollectionInterface $expenses
 */
?>


<div id="wrapper">

    <?= $this->element('side-nav') ?>

    
    <div id="page-wrapper" class="gray-bg dashbard-1" >

        <?= $this->element('top-nav') ?>

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                              

                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Expenses</h5>
                            <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                        </div>
                     

                        <div class="ibox-content">
                        <div class="expenses index large-9 medium-8 columns content">
                            <div class="feed-activity-list">
                                <!--    <h3><?= __('Expenses') ?></h3>-->
                                <?php foreach ($expenses as $expense): ?>
                                <div class="feed-element">
                                    <large class="pull-right text-navy">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $expense->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $expense->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $expense->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expense->id)]) ?>
                                    </large>
                                            
                                    <strong><?= $expense->has('expense_field') ? $this->Html->link($expense->expense_field->name, ['controller' => 'ExpenseFields', 'action' => 'view', $expense->expense_field->id]) : '' ?>
                                    </strong>

                                    <br>
                                    <strong><?= $this->Number->format($expense->value) ?>
                                    </strong>

                                    <div><?= $this->Text->autoParagraph(h($expense->description)); ?>
                                    </div>
                                    <small class="text-muted"><?= h($expense->created) ?>
                                    </small>
                                </div>
                                <?php endforeach; ?>
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
                        </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly</span>
                                <h5>Expense</h5>
                        </div>
                        <div class="ibox-content">
                                <h1 class="no-margins">

                                    <?= $monthlyExpense[0]->sum; ?>
                                </h1>
                                
                                <small>Total expense</small>
                        </div>
                    </div>
                    <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly</span>
                                <h5>Income</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">

                                    <?= $monthlyIncome[0]->sum; ?>
                                </h1>
                                
                                <small>Total income</small>
                            </div>
                    </div>
                    <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-warning pull-right">Annual</span>
                                <h5>Income</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?= ($monthlyIncome[0]->sum)*12; ?></h1>
                                
                                <small>New orders</small>
                            </div>
                    </div>
                </div>
                
            </div>


            

            
        </div>
    </div>
</div>

    <!--
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expense_field_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recurring') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recurring_duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($expenses as $expense): ?>
            <tr>
                <td><?= $this->Number->format($expense->id) ?></td>
                <td><?= $expense->has('user') ? $this->Html->link($expense->user->name, ['controller' => 'Users', 'action' => 'view', $expense->user->id]) : '' ?></td>
                <td><?= $expense->has('expense_field') ? $this->Html->link($expense->expense_field->name, ['controller' => 'ExpenseFields', 'action' => 'view', $expense->expense_field->id]) : '' ?></td>
                <td><?= $this->Number->format($expense->value) ?></td>
                <td><?= h($expense->recurring) ?></td>
                <td><?= $this->Number->format($expense->recurring_duration) ?></td>
                <td><?= h($expense->created) ?></td>
                <td><?= h($expense->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $expense->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $expense->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $expense->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expense->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
-->

    



