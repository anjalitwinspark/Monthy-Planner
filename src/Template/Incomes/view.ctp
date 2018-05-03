<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Income $income
 */
?>
<div id="wrapper">

    <?= $this->element('side-nav') ?>

    
        <div id="page-wrapper" class="gray-bg dashbard-1" >

        <?= $this->element('top-nav') ?>

            <div class="wrapper wrapper-content animated fadeInRight">

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
</div>
</div>
</div>