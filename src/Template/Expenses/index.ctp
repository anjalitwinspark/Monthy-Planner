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

        <div class="wrapper wrapper-content animated fadeInRight" style="background-image: url('');">

            <div class="row">
                <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Expense Chart <small></small></h5>
                        <div class="ibox-tools">
                            <span class="label label-warning ">Yearly</span>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                        </div>
                    </div>
                    <div class="ibox-content">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart" style="padding: 0px; position: relative;">
                                   
                                </div>
                               
                            </div>
                    </div>
                </div>
                </div>

                <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">

                        <h5>Expense Line Chart</h5>
                        <div class="ibox-tools">
                            <span class="label label-warning ">Monthly</span>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-line-chart" style="padding: 0px; position: relative;">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
           

            <div class="row">

                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly</span>
                                <h5>Expense</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">

                                    <?= $monthlyExpense; ?>
                                </h1>
                               
                                <small>Total expense: <strong><?= $totalExpense; ?></strong></small>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3">
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
                   
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-warning pull-right">Annual</span>
                                <h5>Income</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?= ($monthlyIncome[0]->sum)*12; ?></h1>
                               
                                <small></small>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Reminder</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                               
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="text-center">
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form"><i class="fa fa-bell"></i> ADD REMINDER </a>

                            <?= $this->Form->postButton('Check Reminder', ['controller'=>'Expenses','action' => 'check'],['class'=>'btn btn-warning']) ?>

                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                </div>
                                               
                                                <div class="col-lg-8">
                                                   
                                                    <h3 class="m-t-none m-b">Reminder
                                                    </h3>

                                                   
                                                    <?= $this->Form->create(null, ['url' => ['controller'=>'reminders','action' => 'add']]) ?>
                                                    <form role="form">
                                                        <div class="form-group">
                                                        <select class="form-control" style="width:375px;"name="expense_id">
                                                        <?php
                                                            foreach ($expenses as $value) {
                                                            echo '<option name="expense_id" value="'.$value->id.'">'.$value->description.'
                                                                    </option>';
                                                                }
                                                                ?>
                                                        </select></div>
                                                       
                                                        <div class="form-group">
                                                           
                                                            <label >Reminder
                                                            </label>
                                                           
                                                            <input type="text" name="description" placeholder="Enter Reminder" class="form-control">
                                                           
                                                        </div>

                                                        <br>
                                                        <div class="form-group" >
                                <label class="font-noraml">Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" name="date" class="form-control" value="30/04/2018">
                                </div>
                            </div>
                                                        <div>
                                                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                                                                <strong>Save</strong></button>

                                                        </div>
                                                    </form>
                                                    <?= $this->Form->end() ?>
                                                   
                                                </div>

                                               
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                           
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                           
                            <div class="ibox-tools">
                                <span class="label label-warning">
                                <h5>Expense</h5></span>
                                <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                                    </a>
                            <!--    <a class="close-link">
                                <i class="fa fa-times"></i>
                                </a>-->
                            </div>

                        </div>
                    

                        <div class="ibox-content">
                       
                            <div class="feed-activity-list">
                               
                                <?php foreach ($expenses as $expense): ?>
                                <div class="feed-element ">
                                    <large class="pull-right text-navy">
                                        <?= $this->Html->link(__(''), ['controller'=>'Expenses','action' => 'view', $expense->id],['class'=>'fa fa-eye fa-lg']) ?>
                                        <?= $this->Html->link(__(''), ['controller'=>'Expenses','action' => 'edit', $expense->id],['class'=>'fa fa-edit fa-lg']) ?>
                                        <?= $this->Form->postLink(__(''), ['controller'=>'Expenses','action' => 'delete', $expense->id],['class'=>'fa fa-times fa-lg'], ['confirm' => __('Are you sure you want to delete # {0}?', $expense->id)]) ?>
                                    </large>
                               

                                    <strong class=""><?= h($expense->expense_field->name)//$expense->has('expense_field') ? $this->Html->link($expense->expense_field->name, ['controller' => 'ExpenseFields', 'action' => 'view', $expense->expense_field->id]) : '' ?>
                                    </strong>

                                    <br>
                                    <strong><?= $this->Number->format($expense->value) ?>
                                    </strong>

                                    <div><?= $this->Text->autoParagraph(h($expense->description)); ?>
                                    </div>
                                    <small class="text-muted"><?= h($expense->date) ?>
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
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                       
                                        <div class="ibox-tools">
                                            <span class="label label-info">
                                            <h5>Income</h5></span>
                                            <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                            </a>
                                        <!--    <a class="close-link">
                                            <i class="fa fa-times"></i>
                                            </a>-->
                                        </div>
                                       
                            </div>
                        <div class="ibox-content">
   
                            <div class="feed-activity-list">
                                                <?php foreach ($incomes as $income): ?>

                                                <div class="feed-element">
                                                   
                                                   
                                                        <small class="pull-right">
                                                            <?= $this->Html->link(__(''), ['controller'=>'Incomes','action' => 'view', $income->id],['class'=>'fa fa-eye fa-lg']) ?>
                                                            <?= $this->Html->link(__(''), ['controller'=>'Incomes','action' => 'edit', $income->id],['class'=>'fa fa-edit fa-lg']) ?>
                   
                                                            <?= $this->Form->postLink(__(''), ['controller'=>'Incomes','action' => 'delete', $income->id],['class'=>'fa fa-times fa-lg'], ['confirm' => __('Are you sure you want to delete # {0}?', $income->id)]) ?>
                                                        </small>

                                                        <strong><?= $income->income_field->name ?></strong> <?= h($income->value)?> <br>
                                                        <small class="text-muted">
                                                            <?= h($income->created)?>
                                                        </small>

                                                   
                                                </div>
                                                <?php endforeach; ?>

                            </div>
                                   
                        </div>
                    </div>

                </div>
               
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                       
                                        <div class="ibox-tools">
                                            <span class="label label-danger ">
                                                
                                            <h5 >Reminder</h5></span>
                                            <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                            </a>
                                        <!--    <a class="close-link">
                                            <i class="fa fa-times"></i>
                                            </a>-->
                                        </div>
                                        <!-- <div class="widget yellow-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-warning fa-4x"></i>
                            <h1 class="m-xs">Reminder</h1>
                            
                        </div>
                    </div> -->
                            </div>
                        <div class="ibox-content">
   
                            <div class="feed-activity-list">
                                                <?php foreach ($reminders as $reminder): ?>

                                                <div class="feed-element">
                                                   
                                                   
                                                        <small class="pull-right">
                                                        <!--    <i class="fa fa-eye">
                                                            <?= $this->Html->link(__('View'), ['controller'=>'Reminders','action' => 'view', $reminder->id]) ?>
                                                        </i>-->
                                                            
                                                            <?= $this->Html->link(__(''), ['controller'=>'Reminders','action' => 'edit', $reminder->id],['class'=>'fa fa-edit fa-lg btn btn-default']) ?>
                                                           
                   
                                                            <?= $this->Form->postLink('', ['controller'=>'Reminders','action' => 'delete', $reminder->id],['class'=>'fa fa-times btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $reminder->id)]) ?>
                                                        </small>

                                                        <strong><?= $reminder->description ?></strong> 
                                                        <br>
                                                        <small class="text-muted">
                                                            <?= h($reminder->date)?>
                                                        </small>

                                                   
                                                </div>
                                                <?php endforeach; ?>

                            </div>
                                   
                        </div>
                    </div>

                </div>
     
            </div>

           
        </div>
    </div>
</div>