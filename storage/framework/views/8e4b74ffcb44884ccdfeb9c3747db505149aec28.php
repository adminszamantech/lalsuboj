<?php $__env->startSection('title', $category->cat_name_bn . ' । ' . Cache::get('bnSiteSettings')->site_name); ?>

<?php $__env->startSection('custom-css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('customMeta'); ?>
    <link rel="canonical" href="<?php echo e(url($category->cat_slug)); ?>">
    <meta name="description" content="<?php echo e(!empty($category->cat_meta_description) ? $category->cat_meta_description : ''); ?>">

    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e(url($category->cat_slug)); ?>" />
    <meta property="og:title" content="<?php echo e($category->cat_name_bn . ' । ' . Cache::get('bnSiteSettings')->site_name); ?>" />
    <meta property="og:image"
        content="<?php echo e(asset(config('appconfig.commonImagePath') . Cache::get('bnSiteSettings')->og_image)); ?>" />
    <meta property="og:description"
        content="<?php echo e(!empty($category->cat_meta_description) ? $category->cat_meta_description : ''); ?>" />

    <meta name="twitter:title" content="<?php echo e($category->cat_name_bn . ' । ' . Cache::get('bnSiteSettings')->site_name); ?>">
    <meta name="twitter:description"
        content="<?php echo e(!empty($category->cat_meta_description) ? $category->cat_meta_description : ''); ?>">
    <meta name="twitter:image"
        content="<?php echo e(asset(config('appconfig.commonImagePath') . Cache::get('bnSiteSettings')->og_image)); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <div class="news_container">
        
        <div class="breadcrumb pt-4 mb-4">
            <div class="border-b-[1px] border-custom-dbc">
                <div class="mb-3">
                    <a class="block w-fit" href="#">
                        <h1 class="text-xl md:text-2xl dark:text-slate-200"><?php echo e($category->cat_name_bn); ?></h1>
                    </a>
                </div>
            </div>

        </div>
        <div class="category-content">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-4">
                <div
                    class="col-span-12 lg:col-span-12 xl:col-span-12 relative after:content-[''] after:absolute after:top-0 after:-right-3 after:w-[1px] after:h-full after:border-r after:dark:border-gray-600 after:border-custom-bc">
                    <?php if(@count($contents) > 0): ?>
                        <!-- Feature Category Content 4 content -->
                        <div class="category-frontContent">
                            <div class="category_head_content border-b border-custom-bc dark:border-gray-600 pb-4">
                                <div class="grid grid-cols-12 gap-6">
                                    <div
                                        class="col-span-12 md:col-span-6 relative after:content-[''] after:absolute after:top-0 after:-right-3 after:w-[1px] after:h-full after:border-r after:border-custom-bc after:dark:border-gray-600">
                                        <?php if(@count($contents) > 0): ?>
                                            <a href="<?php echo e(postURL($contents[0]->category->cat_slug, $contents[0]->content_id)); ?>"
                                                class="flex flex-col gap-2 hover:no-underline focus:no-underline group">
                                                <div class=" overflow-hidden">
                                                    <img class="w-full group-hover:scale-110 duration-500"
                                                        src="<?php echo e($contents[0]->img_bg_path ? asset(config('appconfig.contentImagePath') . $contents[0]->img_bg_path) : asset(config('appconfig.commonImagePath') . Cache::get('bnSiteSettings')->og_image)); ?>"
                                                        alt="<?php echo e($contents[0]->content_heading); ?>">
                                                </div>
                                                <div class="flex flex-col gap-3">
                                                    <h2
                                                        class="category-heading-text text-base-color group-hover:text-base-color-hover dark:text-slate-300 leading-[1.68rem]">
                                                        <strong><?php echo e($contents[0]->content_heading); ?></strong>
                                                    </h2>
                                                    <p class="lead-short-text text-[#555555] dark:text-gray-400">
                                                        <?php echo fGetWord(fFormatString($contents[0]->content_details), 50); ?></p>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <div
                                        class="col-span-12 md:col-span-6 pt-4 md:pt-0 border-t border-custom-bc dark:border-gray-600 md:border-none">
                                        <div class="flex flex-col gap-8">
                                            <?php $__currentLoopData = $contents->slice(1, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(postURL($feature_content->category->cat_slug, $feature_content->content_id)); ?>"
                                                    class="grid grid-cols-12 gap-2 hover:no-underline focus:no-underline group relative after:content-[''] after:absolute after:-bottom-4 after:left-0 after:w-full after:h-[1px] after:border-b after:border-custom-bc last:after:border-0 after:dark:border-gray-600">
                                                    <div class="col-span-7 md:col-span-6">
                                                        <h2
                                                            class="text-[19px] m-0 py-2 text-base-color group-hover:text-base-color-hover dark:text-slate-300 leading-[1.68rem]">
                                                            <strong><?php echo e($feature_content->content_heading); ?></strong>
                                                        </h2>
                                                        <h6><?php echo fGetWord(fFormatString($feature_content->content_details), 12); ?></h6>
                                                    </div>
                                                    <div class="col-span-5 md:col-span-6 overflow-hidden">
                                                        <img class="w-full group-hover:scale-110 duration-500"
                                                            src="<?php echo e(asset(config('appconfig.contentImagePath') . $feature_content->img_bg_path)); ?>"
                                                            alt="<?php echo e($feature_content->content_heading); ?>">
                                                    </div>
                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Feature Category Content -->
                        <?php echo $__env->make('frontend.bn.ads.category.category-top-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- Category Loop Content -->
                        <div class="category_loop_content py-4">
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-6" id="loopCategoryPostContainer">
                                <?php $__currentLoopData = $contents->slice(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature_bottom_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!-- Loop Content -->
                                    <a href="<?php echo e(postURL($feature_bottom_content->category->cat_slug, $feature_bottom_content->content_id)); ?>"
                                        class="col-span-12 md:col-span-6 relative group after:content-[''] after:absolute after:top-0 after:-right-3 after:w-[1px] after:h-full after:border-r last:after:border-0 after:border-custom-bc after:dark:border-gray-600">
                                        <div class="grid grid-cols-12 gap-2">
                                            <div class="col-span-7">
                                                <h2
                                                    class="text-[19px] text-base-color dark:text-slate-300 group-hover:text-base-color-hover leading-[1.68rem]">
                                                    <strong><?php echo e($feature_bottom_content->content_heading); ?></strong>
                                                </h2>
                                                <h6><?php echo fGetWord(fFormatString($feature_bottom_content->content_details), 12); ?></h6>
                                            </div>
                                            <div class="col-span-5 overflow-hidden">
                                                <img class="w-full group-hover:scale-110 duration-500"
                                                    src="<?php echo e($feature_bottom_content->img_bg_path ? asset(config('appconfig.contentImagePath') . $feature_bottom_content->img_bg_path) : asset(config('appconfig.commonImagePath') . Cache::get('bnSiteSettings')->og_image)); ?>"
                                                    alt="<?php echo e($feature_bottom_content->content_heading); ?>">
                                            </div>
                                        </div>
                                        <div class="w-full h-[1px] bg-custom-bc dark:bg-gray-600 absolute -bottom-3 left-0">
                                        </div>
                                    </a>
                                    <!-- End Loop Content -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            <button id="read_more" onclick="loadMoreContent()" style="background: #00704A"
                                class="px-4 py-2 text-center block text-white hover:bg-base-color-3 hover:no-underline focus:no-underline group hover:text-white rounded-sm text-base mt-4">
                                <span>আরও দেখুন</span>
                            </button>
                            <button id="loading" onclick="loadMoreLatestContent()" style="background: #00704A"
                                class="hidden px-4 py-2 text-center block text-white hover:bg-base-color-3 hover:no-underline focus:no-underline group hover:text-white rounded-sm text-base mt-4">
                                <span>লোডিং...</span>
                            </button>
                        </div>
                        <!-- Category Loop Content -->
                    <?php else: ?>
                        <h2 class="text-center py-6 dark:text-white">No Content</h2>
                    <?php endif; ?>
                    <?php echo $__env->make('frontend.bn.ads.category.category-bottom-ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                

            </div>
        </div>
    </div>

    <script>
        let offset = 14; // Initial offset (you've already loaded 10 posts)
        let categoryId = "<?php echo e($category->cat_id); ?>"; // Category ID
        function loadMoreContent() {
            let loading = document.getElementById('loading');
            loading.classList.remove('hidden')
            let readMore = document.getElementById('read_more');
            readMore.classList.add('hidden')

            axios.post('<?php echo e(route('load.more.category.posts')); ?>', {
                _token: "<?php echo e(csrf_token()); ?>",
                category_id: parseInt(categoryId),
                offset: offset
            }).then(response => {
                let postsContainer = document.getElementById('loopCategoryPostContainer');

                response.data.posts.forEach(post => {
                    let postElement = document.createElement('a');
                    postElement.classList.add('col-span-12');
                    postElement.classList.add('md:col-span-6');
                    postElement.classList.add('relative');
                    postElement.classList.add('group');
                    postElement.classList.add("after:content-['']");
                    postElement.classList.add("after:absolute");
                    postElement.classList.add("after:top-0");
                    postElement.classList.add("after:-right-3");
                    postElement.classList.add("after:w-[1px]");
                    postElement.classList.add("after:h-full");
                    postElement.classList.add("after:border-r");
                    postElement.classList.add("last:after:border-0");
                    postElement.classList.add("after:border-custom-bc");
                    postElement.classList.add("after:dark:border-gray-600");
              
                    postElement.href = `/details/${post.category.cat_slug}/${post.content_id}`;

                    let content =  post.content_details ; // your string with strong tags
                    let cleanedContent = content.replace(/<strong>/g, '').replace(/<\/strong>/g, '').split(' ').slice(0, 8).join(' ');

                    postElement.innerHTML =
                        `<div class="grid grid-cols-12 gap-2"><div class="col-span-7">
                            <h2 class="text-[19px] text-base-color dark:text-slate-300 group-hover:text-base-color-hover leading-[1.68rem]"><strong>${ post.content_heading }</strong></h2>
                            <p class="lead-short-text text-black dark:text-gray-400">${ cleanedContent + '...' }</p>
                         </div>
                        <div class="col-span-5 overflow-hidden">
                            <img class="w-full group-hover:scale-110 duration-500" src="/media/content/images/${ post.img_bg_path }" alt="${ post.content_heading }">
                        </div>
                        </div>
                            <div class="w-full h-[1px] bg-custom-bc dark:bg-gray-600 absolute -bottom-3 left-0">
                        </div>`
                    postsContainer.appendChild(postElement);
                });

                loading.classList.add('hidden')
                readMore.classList.remove('hidden')

                // Increment offset by 10
                offset += 10;

                // // Hide the read more button if no more posts
                if (!response.data.hasMorePosts) {
                    readMore.classList.add('hidden')
                }

            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.bn.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/category.blade.php ENDPATH**/ ?>