<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
            </li>
            </ul>
            <ul class="nav-second-level collapse in">   
             
	        <li class="heading"><?= __('Actions') ?></li>
	        <li><?= $this->Html->link(__('New Income'), ['action' => 'add']) ?></li>
	        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
	        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
	        <li><?= $this->Html->link(__('List Income Fields'), ['controller' => 'IncomeFields', 'action' => 'index']) ?></li>
	        <li><?= $this->Html->link(__('New Income Field'), ['controller' => 'IncomeFields', 'action' => 'add']) ?></li>
	    </ul>
</nav>     
            </ul>	
        </div>
    </nav>