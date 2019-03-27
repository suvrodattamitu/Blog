<?php include('header.php'); ?>

<div class="container">
    <br>
<form method="POST" action="<?= base_url('admin/check_valid') ?>">

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
               <div class="col-sm-9">
                    <h2>Registration</h2>
               </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
               <label for="username" class="col-sm-3 control-label">User Name</label>
               <div class="col-sm-9">
                    <input type="text" name="username"  value="<?php echo set_value('username'); ?>" class="form-control"  placeholder="Enter user name">
               </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="col-sm-9">
                <p><?php echo form_error('username',"<div class='text-danger'>","</div>"); ?> </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-9">
                    <input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>" placeholder="First Name" class="form-control" autofocus>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="col-sm-9">
                <p><?php echo form_error('firstname',"<div class='text-danger'>","</div>"); ?> </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>" placeholder="Last Name" class="form-control" autofocus>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="col-sm-9">
                <p><?php echo form_error('lastname',"<div class='text-danger'>","</div>"); ?> </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email* </label>
                <div class="col-sm-9">
                    <input type="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email" class="form-control" name= "email">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="col-sm-9">
                <p><?php echo form_error('email',"<div class='text-danger'>","</div>"); ?> </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password*</label>
                <div class="col-sm-9">
                    <input type="password" name="password1" value="<?php echo set_value('password1'); ?>" placeholder="Password" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="col-sm-9">
                <p><?php echo form_error('password1',"<div class='text-danger'>","</div>"); ?> </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
                <div class="col-sm-9">
                    <input type="password" name="password2" value="<?php echo set_value('password2'); ?>" placeholder="Password" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="col-sm-9">        
                <p><?php echo form_error('password2',"<div class='text-danger'>","</div>"); ?> </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="col-sm-4">
               <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
        </div>
    </div>

    
</form> <!-- /form -->

</div>

<?php include('footer.php'); ?>
