<?php $__env->startSection('title', request()->get('q') . ' । অনুসন্ধান । নতুনদেশ২৪.কম'); ?>

<?php $__env->startSection('mainContent'); ?>
    <div class="search_container w-[1000px] max-w-full px-3 md:px-4 mx-auto my-6">
        <div class="flex flex-col gap-4">
            <div class="search_header">
                <div class="flex flex-row gap-4 dark:text-white text-2xl">
                    <h2>অনুসন্ধান : </h2>
                    <h2>`<?php echo e($keyword); ?>`</h2>
                </div>
            </div>
            <?php if(count($contents) > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 border border-custom-bc px-4 dark:border-gray-600" id="searchLoopContainer">
                    <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <a href="<?php echo e(postURL($content->category->cat_slug, $content->content_id)); ?>" class="grid grid-cols-12 py-4 gap-4 group border-b border-custom-bc dark:border-gray-600 last:border-b-0">
                            <div class="overflow-hidden col-span-4">
                                <img class="w-full h-full group-hover:scale-110 duration-500" src="<?php echo e($content->img_bg_path ? asset(config('appconfig.contentImagePath').$content->img_bg_path) : asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->og_image)); ?>" alt="">
                            </div>
                            <div class="col-span-8">
                                <div class="flex flex-col gap-2">
                                    <h2 class="text-[14px] md:text-[18px] m-0 text-base-color font-semibold pr-2 group-hover:text-base-color-hover dark:text-slate-200"><?php echo e($content->content_heading); ?></h2>

                                </div>
                            </div>
                        </a>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
                <div class="flex flex-row justify-center items-center">
                    <button id="latest_read_moreBtn" style="background:#00704A" onclick="loadMoreSearchContent()" class="px-4 py-2 text-center block text-white hover:bg-base-color-3 hover:no-underline focus:no-underline group hover:text-white rounded-sm text-base mt-4">
                        <span>আরও দেখুন</span>
                    </button>
                    <button id="loading" style="background:#00704A" class="hidden px-4 py-2 text-center block text-white hover:bg-base-color-3 hover:no-underline focus:no-underline group hover:text-white rounded-sm text-base mt-4">
                        <span>লোডিং...</span>
                    </button>
                </div>
            <?php else: ?>
                <h2 class="text-center py-4">No Content found</h2>
            <?php endif; ?>
        </div>
    </div>


    <script>
        let offset = 10; // Initial offset (you've already loaded 10 posts)

        function loadMoreSearchContent(){
            let loading = document.getElementById('loading');
            loading.classList.remove('hidden')
            let readMore = document.getElementById('latest_read_moreBtn');
            readMore.classList.add('hidden')

            axios.post('<?php echo e(route('search.more.post')); ?>', {
                _token: "<?php echo e(csrf_token()); ?>",
                offset: offset,
                q: "<?php echo e($keyword); ?>"
            }).then(response => {

                let postsContainer = document.getElementById('searchLoopContainer');

                response.data.posts.forEach(post => {
                    let postElement = document.createElement('div');

                    postElement.classList.add('border-b');
                    postElement.classList.add('border-custom-bc');
                    postElement.classList.add('dark:border-gray-600');
                    postElement.classList.add('last:border-0');
                    postElement.classList.add("py-4");
                    // console.log(post)
                    // postElement.href = `/details/${post.category.cat_slug}/${post.content_id}`;
                    postElement.innerHTML = ` <a href="/details/${post.category.cat_slug}/${post.content_id}" class="grid grid-cols-12 gap-4 group border-b border-custom-bc dark:border-gray-600 last:border-b-0"><div class="overflow-hidden col-span-4"><img class="w-full h-full group-hover:scale-110 duration-500" src="/media/content/images/${ post.img_bg_path }" alt="${ post.content_heading }"></div><div class="col-span-8"><div class="flex flex-col gap-2"><h2 class="text-[14px] md:text-[18px] m-0 text-base-color font-semibold pr-2 group-hover:text-base-color-hover dark:text-slate-200">${ post.content_heading }</h2>

                                </div>
                            </div>
                        </a>`
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

<?php echo $__env->make('frontend.bn.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/search.blade.php ENDPATH**/ ?>