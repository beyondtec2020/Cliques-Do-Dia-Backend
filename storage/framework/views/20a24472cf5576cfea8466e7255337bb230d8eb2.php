<?php $__env->startSection('sub-title'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('category'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/search.css')); ?>" type="text/css">
<style type="text/css">
    .contactus_bg {
        background-image:url(<?php echo e(asset('public/images/'.$bg->search_bg)); ?>);
    }
</style>

<section id="inner_banner" class="parallex-bg contactus_bg">
    <div class="intro_text white-text div_zindex carousel-search-form">
            <div class="search_form">
                <form action="<?php echo e(url('/search-listing')); ?>" method="get">
                <?php echo e(csrf_field()); ?>

                    <div class="form-group select">
                        <select class="form-control chosen" name="category" required="">
                            <option value="">What are you looking for?</option>
                            <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group select ">
                         <select class="form-control chosen" name="city" required="" style="">
                            <option value="">City name</option>
                            <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($v->slug); ?>"><?php echo e($v->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group search_btn">
                        <input type="submit" value="Search" class="btn btn-block">
                    </div>
                </form>
            </div>
        </div>
    <div class="dark-overlay"></div>
</section>

<section id="" class="section-padding">
	<div class="container">
        <div class="row">
        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 grid_view show_listing">
            	<div class="listing_wrap">
                    <div class="listing_img">
                        <!-- <span class="like_post"><i class="fa fa-bookmark-o"></i></span> -->
                        <span class="like_post">
                            <form action="<?php echo e(url('/add-to-favourite')); ?>" method="post" style="display: inline-block;">
                            <?php echo e(csrf_field()); ?>

                            <!-- <a href="" ><i class="fa fa-bookmark-o"></i> Add to favorites</a> -->
                            <input type="hidden" name="postId" value="<?php echo e($data->id); ?>">
                                <?php if(Sentinel::getUser()): ?>
                                <input type="hidden" name="UserID" value="<?php echo e(Sentinel::getUser()->id); ?>">
                                <?php endif; ?>
                            <button type="submit" style="background: transparent;border: transparent;"><i class="fa fa-bookmark-o"></i></button>
                            </form>
                        </span>
                        
                        <div class="listing_cate">
                            <span class="cate_icon"><a href="#"><img src="<?php echo e(asset('public/images/'.$data->cat->cat_image)); ?>" alt="icon-img"></a></span> 

                            <!-- <span class="listing_like"><a href="#"><i class="fa fa-heart-o"></i></a></span> -->
                        </div>
                        <a href="<?php echo e(url('/single-post/'.$data->id.'/'.$data->slug)); ?>">
                        <img src="<?php echo e(asset('public/images/'.$data->CountImage()->first()->image)); ?>" alt="image"></a>
                    </div>
                    <div class="listing_info">
                        <div class="post_category">
                            <a href="<?php echo e(url('/single-category/'.$data->cat->id.'/'.$data->cat->slug)); ?>"><?php echo e($data->cat->name); ?></a>
                        </div>
                        <h4><a href="<?php echo e(url('/single-post/'.$data->id.'/'.$data->slug)); ?>"><?php echo e($data->title); ?></a></h4>
                        <p><?php echo e($data->short_desc); ?></p>
                        
                        <div class="listing_review_info">
                            <p><span class="review_score">
                            <?php
                            if ($data->review()->where('addlist_id', '=', $data->id)->first()) {
                                
                                $ratingCount = $data->review()->where('rating', '!=', 0)->count('rating');
                                $ratingSum = $data->review()->where('rating', '!=', 0)->sum('rating');
                                
                                if ( $ratingCount == 0) { 
                                $ratingCount = 1; 
                                }
                                $totalRating = ($ratingSum / $ratingCount);   
                            }else{
                                $totalRating = 0;
                            }
                            
                        ?> <?php echo e(number_format( $totalRating,1)); ?>/5</span> 

                        <?php switch(number_format( $totalRating,0)):
                                                case (1): ?>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star "></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                <?php break; ?>

                                                <?php case (2): ?>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star "></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                <?php break; ?>
                                                
                                                <?php case (3): ?>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star "></i>
                                                    <i class="fa fa-star"></i>
                                                <?php break; ?>

                                                <?php case (4): ?>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star"></i>
                                                <?php break; ?>

                                                <?php case (5): ?>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i> 
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                <?php break; ?>

                                                <?php default: ?>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                            <?php endswitch; ?>
                                        </p>
                           
                            <p class="listing_map_m"><i class="fa fa-map-marker"></i> <?php echo e($data->city->name); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
        </div>

            <div class="col-md-8 col-md-offset-2" style="padding: 10px 0px;">
                    <?php $__currentLoopData = $A970X90; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
$(".chosen").chosen();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>