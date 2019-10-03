
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sub-title'); ?>
| Contact us
<?php $__env->stopSection(); ?>
<?php $__env->startSection('category'); ?>
<style type="text/css">
    .contactus_bg {
        background-image:url(<?php echo e(asset('public/images/'.$bg->contact_bg)); ?>);
    }
</style>

<section id="inner_banner" class="parallex-bg contactus_bg">
	<div class="container">
    	<div class="white-text text-center div_zindex">
        	<h1>Contact Us </h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

<section id="inner_pages">
	<div class="container">
    	<div class="row">
        	<div class="col-md-4">
            	<div class="office_info_box">
                	<div class="info_icon">
                    	<i class="fa fa-home"></i>
                    </div>
                    <h4>Office Address</h4>
                    <p><?php echo $GeneralSetting->address; ?></p>
                </div>
            </div>
            
            <div class="col-md-4">
            	<div class="office_info_box">
                	<div class="info_icon">
                    	<i class="fa fa-phone"></i>
                    </div>
                    <h4>Phone Number</h4>
                    <p><?php echo $GeneralSetting->phone; ?></p>
                </div>
            </div>
            
            <div class="col-md-4">
            	<div class="office_info_box">
                	<div class="info_icon">
                    	<i class="fa fa-envelope-o"></i>
                    </div>
                    <h4>Email Address</h4>
                    <p><a href="mailto:<?php echo e($GeneralSetting->office_email); ?>"><?php echo $GeneralSetting->office_email; ?></a>  </p>
                </div>
            </div>
        </div>
        
        <div class="row">
        	<div class="col-md-6">
            	<div class="contact_form">
                	<h4>Let's get in touch</h4>
            		<form action="<?php echo e(url('/submitContact')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                	<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                    	<input type="text" name="name" class="form-control" placeholder="Name">
                        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

                    </div>
                    <div class="form-group<?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
                    <input type="text" name="phone" class="form-control" placeholder="Phone">
                    <?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

                    </div>

                    <div class="form-group<?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                    <input type="text" name="email" class="form-control" placeholder="Enter your Email Address">
                    <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

                    </div>

                    <div class="form-group<?php echo e($errors->has('subject') ? 'has-error' : ''); ?>">
                    	<input type="text" name="subject" class="form-control" placeholder="Subject">
                        <?php echo $errors->first('subject', '<p class="help-block">:message</p>'); ?>

                    </div>

                    <div class="form-group<?php echo e($errors->has('message') ? 'has-error' : ''); ?>">
                    	<textarea class="form-control"  name="message" placeholder="Message"></textarea>
                        <?php echo $errors->first('message', '<p class="help-block">:message</p>'); ?>

                    </div>
                    <div class="form-group">
                    	<input type="submit" class="btn btn-block" value="Submit">
                    </div>
                </form>
                </div>
            </div>
            
            <div class="col-md-6">
            	<div class="map_wrap">
                <br><br><br>
                	<?php echo $GeneralSetting->gmaps; ?>

                </div>
            </div>
            
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>