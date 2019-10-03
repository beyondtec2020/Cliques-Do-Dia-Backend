<?php $__env->startSection('sub-title'); ?>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/admin/css/bootstrap-table.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
<section class="content-header"><h1>Slider</h1>
<a href="<?php echo e(url('/add-slider')); ?>" type="button" class="pull-right btn  btn-info btn-flat"><i class="fa fa-plus"></i> <b>Add Slider </b> </a>
</section>
<section class="content">
    	
<div class="row">
    <div class="col-xs-12">
        
       
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title"></h3> -->
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-checkbox="true" ></th>
                            <th data-field="sl"  >SL.</th>
                            <th data-field="image" data-sortable="true">Image</th>
                            <th data-field="Actions" data-sortable="true">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td class="text-center"></td>
                          <td><?php echo e(++$k); ?></td>
                           <td class="">
                              <img src="<?php echo e(asset('public/images/slider/'.$cat->image)); ?>" class="img-responsive" alt="image"/> 
                           </td>
                            <td class="">
                                <a class="btn btn-danger btn-xs" href="<?php echo e(url('/delete-slider/'.$cat->id)); ?>" onclick="return checkDelete()">
                                    <span class="glyphicon glyphicon-trash"></span>  Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/assets/admin/js/bootstrap-table.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>