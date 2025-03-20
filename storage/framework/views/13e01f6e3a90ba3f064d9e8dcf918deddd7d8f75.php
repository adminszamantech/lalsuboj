<?php $__env->startSection('title', $author->author_name_bn . ' । ঢাকা প্রকাশ'); ?>

<?php $__env->startSection('customMeta'); ?>
    <link rel="canonical" href="<?php echo e(url('/author/'.$author->author_slug)); ?>">
    <meta name="description" content="<?php echo e(!empty($author->author_bio_bn) ? $author->author_bio_bn : ''); ?>"/>

    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e(url('/author/'.$author->author_slug)); ?>"/>
    <meta property="og:title" content="<?php echo e($author->author_name_bn. ' । ঢাকা প্রকাশ'); ?>"/>
    <meta property="og:image" content="<?php echo e(asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>"/>
    <meta property="og:description" content="<?php echo e(!empty($author->author_bio_bn) ? $author->author_bio_bn : ''); ?>"/>

    <meta name="twitter:title" content="<?php echo e($author->author_name_bn. ' । ঢাকা প্রকাশ'); ?>">
    <meta name="twitter:description" content="<?php echo e(!empty($author->author_bio_bn) ? $author->author_bio_bn : ''); ?>">
    <meta name="twitter:image" content="<?php echo e(asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>

    <div class="main-content marginTop10">
        <div class="container">
            <!-- Top Section -->
            <p class="breadcrumb">
                <a href="/"><i class="fa fa-home"></i></a>
                <span>&raquo;</span>
                <a href="<?php echo e(url('topic/'.$author->author_slug)); ?>" class="active"><?php echo e($author->author_name_bn); ?></a>
            </p>

            <div class="row marginBottom20">
                <div class="col-sm-12">
                    <div class="author-box marginBottom20" style="display: flex; align-items: center">
                        <?php if(!empty($author->img_path)): ?>
                            <img src="<?php echo e(asset(config('appconfig.authorImagePath').$author->img_path)); ?>" style="width: 80px ; height: 80px ; border-radius: 50%; margin-bottom: 0; overflow: hidden; object-fit: cover;" alt="<?php echo e($author->author_name_bn); ?>">
                        <?php else: ?>
                            <img src="<?php echo e(asset(config('appconfig.commonImagePath').'favicon.png')); ?>" alt="Dhaka Prokash">
                        <?php endif; ?>
                        <div>
                            <p style="font-size: 32px; margin-left: 10px;"><?php echo e($author->author_name_bn); ?></p>
                            <p style="font-size: 16px; margin-left: 10px;"><?php echo $author->author_bio_bn; ?></p>
                        </div>
                    </div>

                    <hr>

                    <div class="author-contents">
                        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php ($sURL = fDesktopURL($content->content_id, $content->category->cat_slug, ($content->subcategory->subcat_slug ?? null), $content->content_type)); ?>

                            <div class="single-archive-item">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="imgbox">
                                            <a href="<?php echo e($sURL); ?>">
                                                <img src="<?php echo e($content->img_sm_path ? asset(config('appconfig.contentImagePath').$content->img_sm_path) : asset(config('appconfig.commonImagePath').'sm-default.jpg')); ?>" class="img-responsive" alt="<?php echo e($content->content_heading); ?>" title="<?php echo e($content->content_heading); ?>">
                                            </a>
                                        </div>

                                    </div>

                                    <div class="col-sm-9">
                                        <small class="text-muted">
                                            <a href="<?php echo e(url($content->category->cat_slug)); ?>" class="jC_tag"> <?php echo e($content->category->cat_name_bn); ?> </a>
                                            | <i class="fa fa-calendar"></i>
                                            <?php echo e(fFormatDateEn2Bn(date('d F Y, h:i a, l', strtotime($content->created_at)))); ?>

                                        </small>
                                        <h3>
                                            <a href="<?php echo e($sURL); ?>" title="<?php echo e($content->content_heading); ?>">
                                                <?php if(!empty($content->video_id) || !empty($content->podcast_id)): ?>
                                                    <span class="video-audio-icon">
                                                        <?php if(!empty($content->video_id)): ?>
                                                            <i class="fa fa-play"></i>
                                                        <?php endif; ?>
                                                        <?php if(!empty($content->podcast_id)): ?>
                                                            <i class="fa fa-volume-up"></i>
                                                        <?php endif; ?>
                                                    </span>
                                                <?php endif; ?>
                                                <?php echo e($content->content_heading); ?>

                                            </a>
                                        </h3>
                                        <p class="hidden-xs text-muted"><?php echo e($content->content_brief); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <hr>
                        <?php echo e($contents->links('vendor.pagination.bn-default')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.bn.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/author.blade.php ENDPATH**/ ?>