<?php $__env->startSection('sub-title'); ?>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<style type="text/css" media="print">
    @media  print
{    
    .print,.btn
    {
        display: none !important;
    }
   @page  {
    size: auto;   /* auto is the initial value */
    margin: 0px auto;  /* this affects the margin in the printer settings */
}
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?> 
<section class="content">
       <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-comment-o"></i><strong> Review (<?php echo e($AddList->review()->count()); ?>)</strong></h3>
              <a href="<?php echo e(URL::previous()); ?>" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
              Title: <?php echo e($AddList->title); ?>

            <!-- <small>Date: <?php echo e($AddList->updated_at->toFormattedDateString()); ?></small> -->

            <div class="btn-group pull-right">
                  <button type="button" class="btn btn-info">Action</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <?php if($AddList->status == 0): ?> 
                                <li><a href="<?php echo e(url('/active-list/'.$AddList->id)); ?>">Active</a></li>
                                <li><a href="<?php echo e(url('/expired-list/'.$AddList->id)); ?>">Expired</a></li>
                                <?php elseif($AddList->status == 1): ?>
                                <li><a href="<?php echo e(url('/pending-list/'.$AddList->id)); ?>">Pending</a></li>
                                <li><a href="<?php echo e(url('/expired-list/'.$AddList->id)); ?>">Expired</a></li>
                                <?php elseif($AddList->status == 2): ?>
                                <li><a href="<?php echo e(url('/active-list/'.$AddList->id)); ?>">Active</a></li>
                                <li><a href="<?php echo e(url('/pending-list/'.$AddList->id)); ?>">Pending</a></li>
                                <?php endif; ?>

                              <?php if($AddList->is_featured == 0): ?> 
                              <li><a href="<?php echo e(url('/allow-fetured-list/'.$AddList->id)); ?>">Allow Fetured</a></li>
                              <?php else: ?>
                              <li><a href="<?php echo e(url('/disallow-fetured-list/'.$AddList->id)); ?>">Disallow Fetured</a></li>
                              <?php endif; ?>
                  </ul>
                </div>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      

      <?php $rr = $AddList->review()->paginate(10); ?>
      
      <?php $__currentLoopData = $rr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="row" > 
        <div class="col-xs-2">
        <?php $user = App\User::where('id',$data->user_id)->first(); ?>
          <?php if(!$user->profile): ?>
          <img src="<?php echo e(asset('public/assets/admin/images/pro.png')); ?>" class="img-circle" alt="User Image" style="width: 90px; height: 90px; text-align: center;"><br>
          <?php else: ?>
          <img src="<?php echo e(asset('public/images/'.$user->profile)); ?>" class="img-circle" alt="User Image" style="width: 90px; height: 90px; text-align: center;"><br>
          <?php endif; ?>
          <b><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></b>    
        </div>
        <div class="col-xs-10">
            <p class="text-muted well well-sm no-shadow">
            <b> <?php echo e($data->title); ?></b><br> <?php echo e($data->description); ?></p>
            <p><span class="review_score">
                <?php switch(number_format($data->rating,0)):
                      case (1): ?>
                          <i class="fa fa-star active"></i>
                      <?php break; ?>
                      <?php case (2): ?>
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i>
                      <?php break; ?>
                      <?php case (3): ?>
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i>
                      <?php break; ?>
                      <?php case (4): ?>
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i> 
                          <i class="fa fa-star active"></i>
                      <?php break; ?>
                      <?php case (5): ?>
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i> 
                          <i class="fa fa-star active"></i>
                          <i class="fa fa-star active"></i>
                      <?php break; ?>

                      <?php default: ?>
                  <?php endswitch; ?>
                  </span></p>
        </div>
      </div><br>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <!-- /.row -->

    </section>
                
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <?php echo $rr->render(); ?>

            </div>
            
        </div>
      </div>
    </div>


    
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
      
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>