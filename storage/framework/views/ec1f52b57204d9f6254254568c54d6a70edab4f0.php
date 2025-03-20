<?php $__env->startSection('title'); ?>
   Page Not Found
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <div class="news_container">
        <div class="h-screen flex flex-col gap-2 items-center justify-center">
                <h2 class="text-4xl dark:text-slate-300">দু:খিত পাওয়া যায়নি!</h2>
                <p class="text-xl dark:text-slate-300">সর্বশেষ খবর জানতে ক্লিক করুন</p>
                <a href="<?php echo e(url('/latest/news')); ?>" class="bg-base-color py-1 px-4 rounded text-slate-300">সর্বশেষ খবর</a>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.bn.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/szamymni/notundesh24.com/resources/views/errors/404.blade.php ENDPATH**/ ?>