



<div id="page-wrapper" class="gray-bg dashboard">


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
                                    <label class="col-sm-1 control-label">
                                        
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
                                
                                <div id='content'>
                                     <input type="button" id="more_fields" onclick="add_fields();" value="Add More" />
                                </div>

                            
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
