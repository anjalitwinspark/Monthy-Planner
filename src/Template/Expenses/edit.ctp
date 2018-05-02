<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expense $expense
 */
?>
<div id="wrapper">

    <?= $this->element('side-nav') ?>

    
        <div id="page-wrapper" class="gray-bg dashbard-1" >

        <?= $this->element('top-nav') ?>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="expenses form large-9 medium-8 columns content">
    <?= $this->Form->create($expense) ?>
    <fieldset>
        <legend><?= __('Edit Expense') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('expense_field_id', ['options' => $expenseFields]);
            echo $this->Form->control('value');
            echo $this->Form->control('description');
            echo $this->Form->control('recurring');
            echo $this->Form->control('recurring_duration');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
