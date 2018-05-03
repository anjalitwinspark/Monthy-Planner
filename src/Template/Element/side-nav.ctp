<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse ">
                <ul class="nav metismenu " id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
                            <span>
                            <img alt="image" class="img-circle" style="width:150px;height:100px;border-radius: 10%;" src="img/logo.jpg">
                             </span>
                            
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    
                            
                    <li><?= $this->Html->link(__('Add Expenses'), ['controller'=>'Expenses','action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('Add Income'), ['controller'=>'Incomes','action' => 'add']) ?></li>
                </ul>
            </div>
</nav>

