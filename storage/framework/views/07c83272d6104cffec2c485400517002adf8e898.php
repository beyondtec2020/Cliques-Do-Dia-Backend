
<?php $__env->startSection('sub-title'); ?>
| registration
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="primary-bg">
    <div class="container">
        <div id="login_signup">
            <div class="form_wrap_m">
                <div class="white_box">
                    <h3>Sign Up</h3>
                    <form action="<?php echo e(url('/register')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                        <div class="form-group <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
                        <?php echo $errors->first('first_name', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        <?php echo $errors->first('last_name', '<p class="help-block">:message</p>'); ?>

                        </div>

                        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                            <input type="email" name="email" class="form-control" placeholder="Email Address">
                            <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-block" value="Sign Up">
                        </div>
                    </form>
                    <p>Already have an account? <a href="<?php echo e(url('/login')); ?>">Sign In</a></p>
                    <div class="back_home"><a href="<?php echo e(url('/')); ?>" class="btn outline-btn btn-sm"><i class="fa fa-angle-double-left"></i> Back to Home</a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('form.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>