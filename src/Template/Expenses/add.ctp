<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expense $expense
 */
?>

<!--
<div class="expenses form large-9 medium-8 columns content">
    <?= $this->Form->create($expense) ?>
    <fieldset>
        <legend><?= __('Add Expense') ?></legend>
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

-->
<div id="wrapper">

    <?= $this->element('side-nav') ?>

    
    <div id="page-wrapper" class="gray-bg dashbard-1" >

        

        <div class="wrapper wrapper-content animated fadeInRight">
       
            <div class="row">
                <div class="expenses form content col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Expense </h5>
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
                        <!--    <form method="get" class="form-horizontal">-->
                        <?= $this->Form->create(($expense),['class'=>'form-horizontal']) ?>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label">
                                        
                                    </label>

                                    <div class="col-sm-10">
                                    <?php    echo $this->Form->control('expense_field_id', ['options' => $expenseFields]); ?>
                                    <!--    <select class="form-control m-b" name="account">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                    </select>
                                -->

                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Amount</label>

                                    <div class="col-sm-10">
                                        <input class="form-control" name="value" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>

                                    <div class="col-sm-10">
                                        <input class="form-control" name="description" type="text">
                                    </div>
                                </div>
                                <div class="form-group" >
                                    <label class="col-sm-2 control-label">Date</label>
                                    <div class="input-group date col-sm-10" style="width:385px;">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" name="date" class="form-control" value="30/04/2018">
                                    </div>
                                </div>

                                <div class="form-group">
                                    
                                   <label class="col-sm-2 control-label">Recurring</label>
                                
                                    <div class="col-sm-10">
                                    
                                        <div>
                                            <label> 
                                                <input type="hidden" name="recurring" value="0" />
                                                <input value="1" name="recurring" type="checkbox"  > 
                                                
                                            </label>
                                        </div>
                                    
                                        
                                    </div>
                                
                                
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Recurring Duration</label>
                                    <div class="col-sm-10">
                                        
                                        <input class="form-control" value=0 name="recurring_duration" type="text">
                                    </div>
                                </div>

                               <!-- <div class="form-group" id="data_4">
                                <label class="font-noraml col-sm-2 control-label">Month select</label>
                                <div class="input-group date col-sm-10">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" value="07/01/2014" type="text">
                                </div>
                            </div>
                        -->
                        <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                                
                                

                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>

         </div>
    </div>
</div>


            