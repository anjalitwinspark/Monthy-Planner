<div class="row border-bottom">
    

        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <ul class="nav navbar-top-links navbar-right " style="display: inline-flex;">
                <li class="dropdown open">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" aria-expanded="true">
                        <i class="fa fa-bell"></i>  <span class="label label-primary"><?= h($i)?></span>
                    </a>
                    
                            
                    <ul class="dropdown-menu dropdown-alerts">
                        <?php if($i!=0):?>
                        <?php foreach ($reminderToday as $z): ?>
                        <li>
                            <a href="#">
                                <div class="alert alert-warning">
                                    <i class="fa fa-bell fa-fw"></i> <?= h($z->description)?>
                                    <span class="pull-right text-muted small"></span>

                                </div>
                            </a>
                        </li>
                        
                    <?php endforeach; ?>
                <?php endif?>
                        
                    </ul>
                    
                </li>
                
                <li>
                    
                    <?= $this->Html->link(__('Log Out'), ['controller' => 'Users', 'action' => 'logout']) ?>
                    
                </li>

     
            </ul>

        </nav>
    


</div>

