<?php $__env->startSection('title'); ?>
    <?php echo e($detailsContent->content_heading); ?>

<?php $__env->stopSection(); ?>
<?php
    $sURL = postURL($detailsContent->category->cat_slug, $detailsContent->content_id);
    //$ogImage = url('share-image/'.$detailsContent->category->cat_slug).'?t='.date('Ymdhi').'&imgPath='.$detailsContent->img_bg_path;
    $ogImage = asset($detailsContent->og_image)
?>

<?php $__env->startSection('customMeta'); ?>
    <meta name="description"
          content="<?php echo e(!empty($detailsContent->meta_details) ? $detailsContent->meta_details : fGetWord(fFormatString($detailsContent->content_brief),20)); ?>"/>
    <link rel="canonical" href="<?php echo e($sURL); ?>">
    <meta name="keywords" content="<?php echo e($detailsContent->meta_keywords); ?>">

    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo e($sURL); ?>"/>
    <meta property="og:title" content="<?php echo e($detailsContent->content_heading); ?>"/>
    <meta property="og:image" content="<?php echo e($ogImage); ?>"/>
    <meta property="og:site_name" content="<?php echo e(config('app.url')); ?>"/>
    <meta property="og:description"
          content="<?php echo e(!empty($detailsContent->meta_details) ? $detailsContent->meta_details : fGetWord(fFormatString($detailsContent->content_brief),20)); ?>"/>
    <meta property="article:author" content="<?php echo e(url('/')); ?>"/>

    <meta name="twitter:title" content="<?php echo e($detailsContent->content_heading); ?>">
    <meta name="twitter:description"
          content="<?php echo e(!empty($detailsContent->meta_details) ? $detailsContent->meta_details : fGetWord(fFormatString($detailsContent->content_brief),20)); ?>">
    <meta name="twitter:image" content="<?php echo e($ogImage); ?>">

    <script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "NewsArticle",
		"url" : "<?php echo e($sURL); ?>",
		"mainEntityOfPage":{
			"@type":"WebPage",
			"name" : "<?php echo e($detailsContent->content_heading); ?>",
			"@id":"<?php echo e($sURL); ?>"
		},
		"headline": "<?php echo e($detailsContent->content_heading); ?>",
		"image": {
			"@type": "ImageObject",
			"url": "<?php echo e($detailsContent->img_bg_path ? asset(config('appconfig.contentImagePath').$detailsContent->img_bg_path) : asset(config('appconfig.commonImagePath').'bg-default.jpg')); ?>"
		},
		"datePublished": "<?php echo e(date('d F Y, h:i a', strtotime($detailsContent->created_at))); ?>",
		"dateModified": "<?php echo e(date('d F Y, h:i a', strtotime($detailsContent->updated_at))); ?>",
		"author": {
			"@type": "Person",
			"url": "<?php echo e($authors->count() ? url('/author/'.$authors->first()->author_slug): url('/')); ?>",
			"name": "<?php echo e($authors->count() ? $authors->first()->author_name_bn : Cache::get('bnSiteSettings')->site_name); ?>"
		},
		"publisher": {
			"@type": "Organization",
			"name": "<?php echo e(url('/')); ?>",
			"logo": {
				"@type": "ImageObject",
				"url": "<?php echo e(asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo)); ?>"
			}
		}
	}



    </script>
    <script type="application/ld+json">
	{
		"@context":"https://schema.org",
		"@type":"BreadcrumbList",
		"itemListElement":[
			{
				"@type":"ListItem",
				"position":1,
				"item":{
					"@id":"<?php echo e(url('/')); ?>",
					"name":"Home"
				}
			},
			{
				"@type":"ListItem",
				"position":2,
				"item":{
					"@id":"<?php echo e(url($detailsContent->category->cat_slug)); ?>",
					"name":"<?php echo e($detailsContent->category->cat_name_bn); ?>"
				}
			},
			{
				"@type":"ListItem",
				"position":3,
				"item":{
					"name": "<?php echo e($detailsContent->content_heading); ?>",
					"@id":"<?php echo e($sURL); ?>"
				}
			}
		]
	}

    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('fb-sdk'); ?>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/en_AUS/sdk.js#xfbml=1&version=v12.0&appId=<?php echo e(config('appconfig.fb_app_id')); ?>&autoLogAppEvents=1"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-css'); ?>
    <style>
        .news_details p {
            padding: 12px 0px;
            line-height: 29px;
        }
        .img-caption, figure.image figcaption {
            color: #000;
            font-size: 14px;
            border-bottom: 1px solid #ccc;
            padding: 2px 0px 2px 0px;
            line-height: 22px;
            margin-bottom: 10px;
            text-align: center;
            background: gainsboro;
        }


        /* Long Link Text block */
        .news-news_details p a {
            /*display: block;*/
            white-space: pre-wrap; /* css-3 */
            white-space: -moz-pre-wrap; /* Mozilla, since 1999 */
            white-space: -pre-wrap; /* Opera 4-6 */
            white-space: -o-pre-wrap; /* Opera 7 */
            word-wrap: break-word; /* Internet Explorer 5.5+ */
        }


    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <div class="news_container">
        <div class="grid grid-cols-12 gap-8 py-4">
            <div class="col-span-12 md:col-span-9 print:col-span-12 relative md:after:content-[''] md:after:absolute after:top-0 after:-right-4 md:after:w-[1px] md:after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600" id="printArea">
                <nav class="print:hidden">
                    <ol class="flex items-center gap-1 text-sm text-gray-600 border-b border-custom-bc dark:border-gray-500 w-fit">
                        <li>
                            <a href="<?php echo e(url($detailsContent->category->cat_slug)); ?>" class="block transition hover:text-gray-700 dark:text-gray-200 dark:hover:text-gray-300 text-base"> <?php echo e($detailsContent->category->cat_name_bn); ?> </a>
                        </li>
                    </ol>
                </nav>
                <div class="pb-4 border-dashed border-slate-400 border-b hidden print:block">
                    <img class="w-[200px] mx-auto" src="<?php echo e(asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo)); ?>" alt="">
                </div>
                <div class="flex flex-col gap-4 print:gap-2">

                    <div class="news_heading py-4 border-b border-custom-bc dark:border-gray-600 print:border-none print:pb-1 print:pt-3">
                        <?php if($detailsContent->content_sub_heading): ?>
                            <span class="text-xl text-red-500"><?php echo e($detailsContent->content_sub_heading); ?></span>
                        <?php endif; ?>
                        <h2 class="text-3xl lg:text-4xl leading-[40px] lg:leading-[50px] dark:text-slate-200 print:text-2xl"><?php echo e($detailsContent->content_heading); ?></h2>
                    </div>
                    <div class="info-area flex flex-col md:flex-row items-center justify-between relative print:after:bg-transparent">
                        <div class="w-full md:w-1/2">
                            <div class="flex gap-2 group items-center pb-2 md:pb-0">
                                <div class="print:hidden">
                                    <img src="<?php echo e($authors->count() ? asset('/media/authorImages/'.$authors->first()->img_path) : asset('/media/common/'.Cache::get('bnSiteSettings')->favicon)); ?>" alt="" class="mx-auto rounded-full w-10 h-10 md:w-12 md:h-12">
                                </div>
                                <div class="flex flex-col justify-center">
                                    <p class="group-hover:text-[#3375af] dark:text-slate-200"><?php echo e($authors->count() ? $authors->first()->author_name_bn : 'নতুনদেশ ডেস্ক'); ?></p>
                                    <p class="text-gray-600 dark:text-slate-300">প্রকাশ:
                                        <span><?php echo e(fFormatDateEn2Bn(date('d F Y, h:i a', strtotime($detailsContent->created_at)))); ?></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 print:hidden items-center">
                            <!-- ShareThis BEGIN -->
                            <div class="sharethis-inline-share-buttons" data-url="<?php echo e($sURL); ?>" data-title="<?php echo e($detailsContent->content_heading); ?>"></div>
                            <!-- ShareThis END -->

                        </div>
                    </div>

                    <div class="news_image">
                        <img src="<?php echo e(asset(config('appconfig.contentImagePath').$detailsContent->img_bg_path)); ?>" class="w-full" alt="">
                        <?php if($detailsContent->img_bg_caption): ?>
                            <div class="img-caption">
                                <?php echo e($detailsContent->img_bg_caption); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="single_news_detail text-gray-700 dark:text-slate-200 text-[19px] w-[710px] max-w-full mx-auto leading-6">
                        <div class="news_details">
                            <?php echo $detailsContent->content_details; ?>

                        </div>
                        <div class="tag_items">
                            <div class="flex flex-wrap gap-3 py-3 print:hidden">
                                <?php if($detailsContent->tags): ?>
                                    <?php ($tags = explode(',', $detailsContent->tags)); ?>
                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="bg-slate-200 text-gray-700 hover:bg-slate-300 rounded dark:bg-[#707070] dark:hover:bg-black text-[16px] py-1 px-3 dark:text-white text-center flex items-center" href="<?php echo e(url('/topic/'.$tag)); ?>"><?php echo e(str_replace('-', ' ', $tag)); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="print:hidden">
                            <div class="fb-comments" data-href="<?php echo e($sURL); ?>" data-width="100%" data-numposts="5"></div>
                        </div>
                    </div>
                </div>
                <div class="latest_container my-8 print:hidden">
                    <div class="latest_news flex flex-col gap-4">
                        <div class="latest_header py-3 border-t border-b border-custom-dbc dark:border-b-4">
                            <h2 class="text-xl md:text-2xl dark:text-slate-200">সর্বশেষ</h2>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                            <?php if(count($latestContents) > 0): ?>
                                <?php $__currentLoopData = $latestContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(postURL($latestContent->category->cat_slug, $latestContent->content_id)); ?>" class="flex flex-col gap-2 hover:no-underline focus:no-underline group relative md:after:content-[''] md:after:absolute after:top-0 after:left-4 md:after:w-full md:after:h-full md:after:border-r after:border-custom-bc after:dark:border-gray-600 border-b md:border-b-0 pb-2 md:pb-0">
                                        <div class="overflow-hidden">
                                            <img class="w-full group-hover:scale-110 duration-500" src="<?php echo e($latestContent->img_bg_path ? asset(config('appconfig.contentImagePath').$latestContent->img_bg_path) : asset('/media/common/'.Cache::get('bnSiteSettings')->og_image)); ?>" alt="<?php echo e($latestContent->content_heading); ?>">
                                        </div>
                                        <div>
                                            <h2 class="text-[17px] group-hover:text-base-color-hover dark:text-slate-300"><?php echo e($latestContent->content_heading); ?></h2>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 md:col-span-3 print:hidden">
                <div class="right_sidebar sticky top-12">
                    <?php if(count($relatedContents) > 0): ?>
                       <div class="related_content_sidebar">
                           <div class="py-2 border-b border-custom-dbc dark:border-b-4">
                               <h2 class="text-2xl dark:text-slate-200">এ সম্পর্কিত আরও খবর</h2>
                           </div>
                           <div>
                           <?php $__currentLoopData = $relatedContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <div class="py-4 border-b last:border-b-0 dark:border-gray-600">
                                   <a href="<?php echo e(postURL($content->category->cat_slug, $content->content_id)); ?>" class="grid grid-cols-12 gap-1 group">
                                       <div class="col-span-8">
                                           <h3 class="text-[17px] group-hover:text-base-color-hover dark:text-slate-300"><?php echo e($content->content_heading); ?></h3>
                                       </div>
                                       <div class="col-span-4 overflow-hidden">
                                           <img src="<?php echo e($content->img_bg_path ? asset(config('appconfig.contentImagePath').$content->img_bg_path) : asset('/media/common/'.Cache::get('bnSiteSettings')->og_image)); ?>" class="w-full group-hover:scale-110 duration-500" alt="<?php echo e($content->content_heading); ?>">
                                       </div>
                                   </a>
                               </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </div>
                       </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js'); ?>


    <script>

        // Specific Content Print
        function printPageArea(){
            var printContent = document.getElementById('printArea').innerHTML;
            
            
            
            window.print();
            // document.body.innerHTML = originalContent;
        }


    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.bn.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/szamymni/notundesh24.com/resources/views/frontend/bn/details.blade.php ENDPATH**/ ?>