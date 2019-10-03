<?php $__env->startSection('sub-title'); ?>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('public/assets/admin/css/bootstrap-fileinput.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
<section class="content-header"><h1>Clients </h1>
<a href="<?php echo e(url('/clients')); ?>" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
</section><br>
<section class="content">
       <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-edit"></i><strong> Edit Clients</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="col-sm-9 col-sm-offset-2"><?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>

             <form action="<?php echo e(url('/update-client')); ?>" method="post" class="form-horizontal" enctype="multipart/form-data" name="editCategoryForm">
              <?php echo e(csrf_field()); ?>


            <div class="box-body">
            <input type="hidden" name="id" value="<?php echo e($category->id); ?>">
                <div class="form-group">
                  <label for="" class="col-sm-2  control-label">
                    Name :</label>
                  <div class="col-sm-9">
                  <input type="text" name="website" class="form-control"  value="<?php echo e($category->website); ?>" placeholder="https://www.example.com/">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2  control-label">Status :</label>
                  <div class="col-sm-9">
                    <select name="status" id="status" class="form-control has-error" required="" >
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                  </div>
                </div>
                
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh"></i> <strong>  Update Information </strong>
              </button>
            </div>
            </div>
            </div>
            </form>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-picture-o"></i> <strong> Edit Category Image</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->

             <form action="<?php echo e(url('/update-clientImage')); ?>" method="post" class="form-horizontal" enctype="multipart/form-data" >
              <?php echo e(csrf_field()); ?>


            <div class="box-body">
            <input type="hidden" name="id" value="<?php echo e($category->id); ?>">
                
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">
                    Image :</label>
                  <div class="col-sm-9">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"> </span>
                            </div>
                            <span class="input-group-addon btn default btn-file">
                                    <span class="fileinput-new bold"> Change Image </span>
                                    <span class="fileinput-exists bold"> Change </span>
                                    <input type="file" name="logo" > </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <code>Image Must be Type of jpg, png</code>
                    </div>
                    <br>
                    <img src="<?php echo e(asset('public/images/'.$category->logo)); ?>">
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-refresh"></i> <strong>  Update  Information </strong>
              </button>
            </div>
            </div>
            </div>
            </form>
        </div>
      </div>
    </div>
</section>
<script type="text/javascript">
  document.forms['editCategoryForm'].elements['status'].value=<?php echo e($category->status); ?>

</script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/assets/admin/js/bootstrap-fileinput.js')); ?>"></script>
<?php $__env->stopSection(); ?>
    	
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>