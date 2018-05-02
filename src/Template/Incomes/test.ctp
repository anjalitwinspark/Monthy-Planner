<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Income $income
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Incomes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Income Fields'), ['controller' => 'IncomeFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Income Field'), ['controller' => 'IncomeFields', 'action' => 'add']) ?></li>
    </ul>
</nav>
<!-- <div class="incomes form large-9 medium-8 columns content">
    <?= $this->Form->create($income) ?>
    <fieldset>
        <legend><?= __('Add Income') ?></legend>
        <?php
           // echo $this->Form->control('user_id', ['options' => $users]);
            //echo $this->Form->control('income_field_id', ['options' => $incomeFields]);
            //echo $this->Form->control('value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->
<body>

<div class='col-lg-7'>
  <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Input Mask <small>http://jasny.github.io/bootstrap/</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3>
                                Input Mask
                            </h3>
                            <p>
                                Input masks allows a user to more easily enter data where you would like them to enter the data in a certain format.
                            </p>
                            <form class="form-horizontal m-t-md" action="#">
                            <?= $this->Form->create() ?>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Salary</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="1" name="value" placeholder="" type="text">
                                        <span class="help-block">Enter Salary</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pension</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="2" name="value" placeholder="" type="text">
                                        <span class="help-block">Enter Pension</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Rental Income</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="3" name="value" placeholder="" type="text">
                                        <span class="help-block">Enter REntal Income</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Savings</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="4" name="value" placeholder="" type="text">
                                        <span class="help-block">Enter Savings</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Sales Revenue</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="5" name="value" placeholder="" type="text">
                                        <span class="help-block">Enter Sales Revenue</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Investment Income</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="6" name="value" placeholder="" type="text">
                                        <span class="help-block">Enter Investment Income</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Other</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="7" name="value" placeholder="" type="text">
                                        <span class="help-block">Enter Other Income</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary block full-width m-b">Submit</button>
                                </div>
                            <?= $this->Form->end() ?>     
                        </div>
            
</div>  
    
</body>
