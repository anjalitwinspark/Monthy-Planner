<!--<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>

-->
<?= $this->Form->create() ?>
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						
					
						<input class="input100" type="text" name="email" placeholder="Username" id="users-email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
				
				
					<div class="wrap-input100 validate-input" data-validate="Enter password">
							
						<input class="input100" type="password" name="password" placeholder="Password" id="users-password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					
					</div>
					

					

					<div class="container-login100-form-btn">
						
						<button class="login100-form-btn">
							Login
						</button>
					
					</div>
					<br>
					<div class="container-login100-form-btn">
					
					<?php echo $this->Html->link('Sign Up', '/Users/add',array( 'class' => 'login100-form-btn'))?>
					</div>

			<!--		<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				-->
				</form>
			</div>
		</div>
	</div>
	<?= $this->Form->end() ?>