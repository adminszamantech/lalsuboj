<?php if($paginator->hasPages()): ?>
    <div class="pagination">
        
        <?php if($paginator->onFirstPage()): ?>
            <a class="disabled"><span>প্রথম</span></a>
            <a class="disabled"><span>&laquo;</span></a>
        <?php else: ?>
            <a href="<?php echo e($paginator->url(1)); ?>">প্রথম</a>
            <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">&laquo;</a>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <a href="" class="disabled"><span><?php echo e($element); ?></span></a>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <a href="" class="active"><span><?php echo e(fFormatDateEn2Bn($page)); ?></span></a>
                    <?php else: ?>
                        <a href="<?php echo e($url); ?>"><?php echo e(fFormatDateEn2Bn($page)); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">&raquo;</a>
            <a href="<?php echo e($paginator->url($paginator->lastPage())); ?>">শেষ</a>
        <?php else: ?>
            <a class="disabled"><span>&raquo;</span></a>
            <a class="disabled"><span>শেষ</span></a>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/vendor/pagination/bn-default.blade.php ENDPATH**/ ?>