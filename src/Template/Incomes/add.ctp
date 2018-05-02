<!--<?php
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
<div class="incomes form large-9 medium-8 columns content">
    <?= $this->Form->create($income) ?>
    <fieldset>
        <legend><?= __('Add Income') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('income_field_id', ['options' => $incomeFields]);
            echo $this->Form->control('value');
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
                <div class="incomes form content col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Income </h5>
                          <!--    <div class="ibox-tools">
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
                        -->
                        </div>
                        
                        <div class="ibox-content">
                        <!--    <form method="get" class="form-horizontal">-->
                        <?= $this->Form->create(($income),['class'=>'form-horizontal']) ?>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        Income
                                    </label>

                                    <div class="col-sm-10" id="select">
                                       <select class="form-control m-b" name="data[0][income_field_id]">
                                <?php  foreach ($incomeFields as $value) {
                                        echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                    }
                                ?>
                                    </select>
                                   

                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Amount</label>

                                    <div class="col-sm-10">
                                        <input class="form-control" name="data[0][value]" type="text">
                                    </div>
                                </div>
                                
                                
                            
                        <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2" id='content'>
                                       
                                     <input type="button" id="more_fields" onclick="add_fields();" value="Add More" />
                                
 
                                        
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
<script>
var count = 1;
function add_fields() {
    var option = <?php echo json_encode($incomeFields); ?>;
    var selectoptions= '';
    for ( x in option) {
        selectoptions += '<option value="'+option[x].id+'">'+option[x].name+'</option>';
    }
 var d = document.getElementById("content");
 var options = document.getElementById("select");
 options.innerHTML +=  '<br><span><select class="form-control m-b" name="data['+count+'][income_field_id]">'+selectoptions+'</br></span>';
 d.innerHTML += '<br /><span> <input name="data['+count+'][value]" required="required" maxlength="255" id="x" type="text" /></span>';
 count++;
}
</script>
