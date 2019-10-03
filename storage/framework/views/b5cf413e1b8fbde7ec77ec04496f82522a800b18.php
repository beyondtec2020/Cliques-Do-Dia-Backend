<?php $__env->startSection('sub-title'); ?>
| Post reviews
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<style type="text/css">
    b{
        float: left;
        margin-right: 5px;
    }
    p{
        margin-top: -5px;
    }
    .fa{
        font-size: 15px;
    }
</style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2 class="pull-left"> Avaliações</h2>
                <a href="<?php echo e(URL::previous()); ?>" class=" btn-primary col-md-offset-9 " style="background: #38ccff none repeat scroll 0 0;
    border: medium none;
    border-radius: 3px;
    color: #ffffff;
    font-size: 16px;
    font-weight: 700;
    line-height: 30px;
    width: auto;
    padding: 8px 22px;"> <i class="fa fa-arrow-left"></i> Voltar</a>

      <button class="btn btn-info" title="Report"><i class="fa fa-comment-o"></i> <?php echo e($AddList->report()->count()); ?></button>
          
				</div>
			</div>
		</div>
     

    <div class="row">			
        <div class="col-md-12">
             <div class="add_listing_info">
             <b>Título: </b> <p><?php echo e($AddList->title); ?></p>
             </div>
        </div>
        <?php $rr = $AddList->report()->paginate(10); ?>
        <?php $__currentLoopData = $rr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $user = App\User::where('id',$data->user_id)->first(); ?>
        <div class="col-md-12">
             <div class="add_listing_info">
             <div style="width: 20%; float: left;">
             <?php if(!$user->profile): ?>
            <img src="<?php echo e(asset('public/assets/admin/images/pro.png')); ?>" class="img-circle" alt="User Image" style="width: 90px; height: 90px;">
              <?php else: ?>
              <img src="<?php echo e(asset('public/images/'.$user->profile)); ?>" class="img-circle" alt="User Image" style="width: 90px; height: 90px;">
              <?php endif; ?>
              <br>
              <b class="text-danger" style="padding-left: 10px;"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></b> 
              </div>
             <h6><?php echo e($data->title); ?></h6>
              <p><?php echo e($data->description); ?></p>
             </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php echo e($rr->render()); ?>

   

	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.user_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>