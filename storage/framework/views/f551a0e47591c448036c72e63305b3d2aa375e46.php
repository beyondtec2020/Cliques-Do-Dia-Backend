<?php echo $__env->make('admin.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- <section class="content-header"><h1>Page Header</h1></section>
    <section class="content"></section> -->
    <?php echo $__env->yieldContent('content'); ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong><?php echo $GeneralSetting->footer; ?></strong>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo e(asset('public/assets/admin/js/jquery-2.2.3.min.js')); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo e(asset('public/assets/admin/js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('public/js/sweetalert.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('public/assets/admin/js/app.min.js')); ?>"></script>
<?php echo $__env->make('Alerts::alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
    function  checkDelete()
    {
        chk = confirm('Confirma a exclusão do anúncio ??');
        if(chk){
            return true;
        }else{
            return false;
        }
    }
</script>
<script type="text/javascript">
  $(".alert").delay(4000).slideUp(300, function() {
       $(this).alert('close');
    });
</script>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
