<?php include( 'header.php' ); ?>
	
	<br>

	<div class = "container">
		<h2>Login Here</h2><br>

		<form action="<?= base_url('admin/index') ?>" method="post" name="login">

			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
					   <label for="name">Name</label>
					   <input type="text" name="uname"  class="form-control" value="<?php echo set_value('uname'); ?>" id="name" placeholder="Enter name">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
				<p><?php echo form_error('uname',"<div class='text-danger'>","</div>"); ?></p>
				</div>
			</div>
           
           <div class="row">
				<div class="col-lg-6">
		           <div class="form-group">
		              <label for="password">Password</label>
		              <input type="password" name="upassword" value="<?php echo set_value('upassword'); ?>" id="password"  class="form-control"  placeholder="Enter Password">
		           </div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
				<p><?php echo form_error('upassword',"<div class='text-danger'>","</div>"); ?> </p>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
            		<button type="submit" class="btn btn-primary">Login</button>
           		</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
           			<p class="text-center">Don't have account? <a href="<?php echo site_url('/admin/register') ?>" id="signup">Sign up here</a></p>
           		</div>
			</div>


        </form>
		                 

	</div>

<?php include( 'footer.php' ); ?>