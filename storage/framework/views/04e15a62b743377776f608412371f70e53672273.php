

<?php $__env->startSection('sub-title'); ?>
| <?php echo e($menuslist->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('category'); ?>
<style type="text/css">
    .contactus_bg {
        background-image:url(<?php echo e(asset('public/images/'.$bg->search_bg)); ?>);
    }
</style>
<section id="inner_banner" class="parallex-bg contactus_bg">
    <div class="container">
        <div class="white-text text-center div_zindex">
            <h1> <?php echo $menuslist->name; ?> </h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<section id="inner_pages">
	<div class="container">
    	<div class="row">
            <div class="col-md-12 grid_view show_listing">
                    <?php echo $menuslist->description; ?>

            </div>            
        </div>
        <br>
    </div>
</section>


<section class="section-padding" >
    <div class="row">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                    <?php $__currentLoopData = $A728X90; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(url('/click-add/'.$v->id)); ?>" target="_blank"> 
                      <?php if($v->advert_type == 1): ?>
                      <img class="img-responsive" src="<?php echo e(asset('public/images/advertise/'.$v->val1)); ?>" alt="" />
                      <?php else: ?>
                          <?php echo $v->val; ?>

                      <?php endif; ?>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>