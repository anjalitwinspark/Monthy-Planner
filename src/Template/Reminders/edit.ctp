<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reminder $reminder
 */
?>


<div id="wrapper">

    <?= $this->element('side-nav') ?>

    

        <div id="page-wrapper" class="gray-bg dashbard-1" >

        <?= $this->element('top-nav') ?>

            <div class="wrapper wrapper-content animated fadeInRight">

<div class="reminders form large-9 medium-8 columns content">

    <?= $this->Form->create($reminder) ?>
    <fieldset>
        <legend><?= __('Edit Reminder') ?></legend>
        <?php
            echo $this->Form->control('expense_id', ['options' => $expenses]);
            echo $this->Form->control('date');
            echo $this->Form->control('description');
            echo $this->Form->control('user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
</div>

</div>

