

<?php $__env->startSection('sub-title'); ?>
| Add Post
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Add-List</h2>
				</div>
			</div>
		</div>



        <div class="row">
			
            <div class="col-lg-12 col-md-12">
				<form action="<?php echo e(route('saveList')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                    	<div class="add_listing_info">
                            <h3>Basic Informations</h3>				
                            <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                                    <label class="label-title"> Title</label>
                                    <input type="text" name="title" class="form-control">
                                <?php echo $errors->first('title', '<p class="help-block">:message</p>'); ?>

                                </div>
                            <div class="form-group <?php echo e($errors->has('short_description') ? 'has-error' : ''); ?>">
                                <label class="label-title">Short Description</label>
                                <input type="text" name="short_description" class="form-control">
                                <?php echo $errors->first('short_description', '<p class="help-block">:message</p>'); ?>

                            </div>
                            <div class="form-group <?php echo e($errors->has('category') ? 'has-error' : ''); ?>">
                                <label class="label-title">Category</label>
                                <div class="select">
                                    <select class="form-control" name="catgory" required>
                                    <option value="">Select category</option>
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php echo $errors->first('category', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>                   
                        </div> 
                        
                        <div class="add_listing_info">
                            <h3>Contact Info</h3>				
                            <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
                                <label class="label-title">Address</label>
                                <input type="text" name="address" class="form-control">
                                <?php echo $errors->first('address', '<p class="help-block">:message</p>'); ?>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 <?php echo e($errors->has('city') ? 'has-error' : ''); ?>">
                                    <label class="label-title">City</label>
                                    <div class="select">
                                        <select class="form-control" name="city">
                                        <option value="">Select city</option>
                                        <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php echo $errors->first('city', '<p class="help-block">:message</p>'); ?>

                                     </div>   
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 <?php echo e($errors->has('zip_code') ? 'has-error' : ''); ?>">
                                    <label class="label-title">Zip-Code</label>
                                    <input type="text" name="zip_code" class="form-control">
                                    <?php echo $errors->first('zip_code', '<p class="help-block">:message</p>'); ?>

                                </div>  
                                <div class="form-group col-sm-6 <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
                                    <label class="label-title">Phone Number</label>
                                    <input type="text" name="phone" class="form-control">
                                    <?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

                                </div>  
                            </div>
                            <div class="row">
                            	<div class="form-group col-sm-6">
                                    <label class="label-title">Email <span>(optional)</span></label>
                                    <input type="text" name="email" class="form-control">
                                </div>
	                            <div class="form-group col-sm-6">
                                    <label class="label-title">Website <span>(optional)</span></label>
                                    <input type="text" name="website" class="form-control">
                                </div> 
                            </div>
                            <div class="row">
            	                <div class="form-group col-md-3 col-sm-6">
                                    <label class="label-title">Facebook <span>(optional)</span></label>
                                    <input type="text" name="facebook" class="form-control">
                                </div> 
        	                    <div class="form-group col-md-3 col-sm-6">
                                    <label class="label-title">Linkdin <span>(optional)</span></label>
                                    <input type="text" name="linkdin" class="form-control">
                                </div> 
    	                        <div class="form-group col-md-3 col-sm-6">
                                    <label class="label-title">Twitter <span>(optional)</span></label>
                                    <input type="text" name="twitter" class="form-control">
                                </div> 
	                            <div class="form-group col-md-3 col-sm-6">
                                    <label class="label-title">Google Plus <span>(optional)</span></label>
                                    <input type="text" name="google" class="form-control">
                                </div>      
                            </div>             
                        </div>
                        
                        <div class="add_listing_info">
                            <h3>Listing Details</h3>				
                            <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
                                <label class="label-title">Description</label>
                                <textarea class="form-control" name="description"></textarea>
                                <?php echo $errors->first('description', '<p class="help-block">:message</p>'); ?>

                            </div>  
                            <div class="form-group">
                            	<label class="label-title">Amenities <span>(optional)</span></label>
                                <div class="checkbox">
                                <?php $i=1; $j=1; ?>
                                <?php $__currentLoopData = $Amenity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p><input type="checkbox" id="amenities<?php echo e(++$k); ?>" name="amenities[<?php echo e($j++); ?>]" value="<?php echo e($data->id); ?>" >
                                    <label for="amenities<?php echo e($i++); ?>"><?php echo e($data->name); ?></label></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>         
                        </div>
                        
                        
                        <div class="add_listing_info">
                            <h3>Add Pricing</h3>	
                            <div class="row">			
                                <div class="form-group col-sm-6 <?php echo e($errors->has('min_price') ? 'has-error' : ''); ?>">
                                    <label class="label-title">Min. Price</label>
                                    <input type="text" name="min_price" class="form-control" min="0">
                                    <?php echo $errors->first('min_price', '<p class="help-block">:message</p>'); ?>

                                </div>  
                                 <div class="form-group col-sm-6 <?php echo e($errors->has('max_price') ? 'has-error' : ''); ?>">
                                    <label class="label-title">Max. Price</label>
                                    <input type="text" name="max_price" class="form-control" min="0">
                                    <?php echo $errors->first('max_price', '<p class="help-block">:message</p>'); ?>

                                </div>  
                            </div>
                                     
                        </div>   
                        
                        <div class="add_listing_info">
                            <h3>Add Video</h3>              
                            <div class="form-group">
                                <label class="label-title">Video Youtube URL <code>Only embeded code supported</code></label>
                                <input type="text" name="video" class="form-control">
                            </div>      
                        </div>
                        
                        <div class="add_listing_info">
                            <h3>Add Location</h3>				
                            <div class="form-group">
                                <label class="label-title">Google Location <code>Only embeded code supported</code></label>
                                <input type="text" name="location" class="form-control">
                            </div>      
                        </div>
                        
                        <div class="add_listing_info">
                            <h3>Add Gallery Images</h3>				
                            <div class="row">
                               <div class="form-group <?php echo e($errors->has('images') ? 'has-error' : ''); ?>">
                                  <input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple required />
                              </div>
                              <?php echo $errors->first('images', '<p class="help-block" style="color: red">:message</p>'); ?>

                                <div class="form-group">
                                    <div id="image_preview"></div>
                                </div>
                            </div> 
                        </div>
                        
                        <div class="add_listing_info">
                            <input type="submit" value="Submit Listing" class="btn btn-block">
                        </div>   
                    </form>
			</div>
			</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/assets/admin/js/jquery.form.js')); ?>"></script>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script>
   bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

<script>
function preview_images() 
{
 var total_file=document.getElementById("images").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
 }
}
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.user_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>