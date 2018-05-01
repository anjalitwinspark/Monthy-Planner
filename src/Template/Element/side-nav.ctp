<nav class="navbar-default navbar-static-side" role="navigation" >
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu" style="display: inline-flex;">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                        <span>
                            
                        </span>
                        <a data-toggle="dropdown"  href="#">
                            <span class="clear">
                             <span class="block m-t-xs">
                             <strong class="font-bold">Budget Planner
                             </strong>
                             </span>  
                            </span> 
                        </a>
                        
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <ul class="nav nav-second-level collapse in" style="">

                        <li><?= $this->Html->link(__('Add Expenses'), ['controller'=>'Expenses','action' => 'add']) ?></li>
                        <li><?= $this->Html->link(__('Add Income'), ['controller'=>'Incomes','action' => 'add']) ?></li>
                        
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>