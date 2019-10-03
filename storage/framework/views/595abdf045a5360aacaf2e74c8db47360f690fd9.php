about-us.blade.php


<?php $__env->startSection('category'); ?>

<style type="text/css">
    .contactus_bg {
        background-image:url(<?php echo e(asset('public/images/'.$bg->search_bg)); ?>);
    }
</style>

<section id="inner_banner" class="parallex-bg contactus_bg">
    <div class="container">
        <div class="white-text text-center div_zindex">
            <h1> Últimos Anúncios</h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

<section id="spost" class="section-padding">
	<div class="container">
    	<div class="row">
            <?php $__currentLoopData = $AddList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <span class="cate_icon">
                            <a href="<?php echo e(url('/single-category/'.$data->cat->id.'/'.$data->cat->slug)); ?>">
                            <img src="<?php echo e(asset('public/images/'.$data->cat->cat_image)); ?>" alt="icon-img"></a></span> 

                            <!-- <span class="listing_like"><a href="#"><i class="fa fa-heart-o"></i></a></span> -->
                        </div>
                        <a href="<?php echo e(url('/single-post/'.$data->id.'/'.$data->slug)); ?>"><img src="<?php echo e(asset('public/images/'.$data->CountImage()->first()->image)); ?>" alt="image"></a>
                    </div>
                    <div class="listing_info">
                        <div class="post_category">
                            <a href="<?php echo e(url('/single-category/'.$data->cat->id.'/'.$data->cat->slug)); ?>"><?php echo e($data->cat->name); ?></a>
                        </div>
                        <h4><a href="<?php echo e(url('/single-post/'.$data->id.'/'.$data->slug)); ?>"><?php echo e(str_limit($data->title,20,'..')); ?></a></h4>
                        <p><?php echo e(str_limit($data->short_desc,40,'..')); ?></p>
                        
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
                            <p class="listing_map_m pull-right">
                            <i class="fa fa-map-marker"></i> <?php echo e($data->city->name); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
        </div>
        <?php echo e($AddList->links()); ?>

    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>