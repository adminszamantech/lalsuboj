<footer class="bg-[#eff5f4] pt-8 pb-0 border-t-4 dark:bg-[#26334d] border-custom-dbc">
    <div class="news_container">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            <div class="col-span-12">
                <div class="flex gap-3 flex-col md:flex-row mb-6 justify-around md:justify-between items-center">
                    <div>
                        <a href="<?php echo e(url('/')); ?>">
                            <img class="logo_header" src="<?php echo e(asset(config('appconfig.commonImagePath').Cache::get('bnSiteSettings')->logo)); ?>" alt="">
                        </a>
                         <?php if(Cache::get('bnSiteSettings')->editor_meta): ?>
                    <div>
                        <p class="text-[color:var(--link-color)] text-xl dark:text-slate-300 text-center text-sm">
                             <strong> সম্পাদক ও প্রকাশক: <?php echo e(Cache::get('bnSiteSettings')->editor_meta); ?></strong>
                        </p>
                        <p class="text-[color:var(--link-color)] text-xl dark:text-slate-300 text-center text-sm" style="font-size: 17px;">
                            <?php echo e(Cache::get('bnSiteSettings')->address); ?>

                        </p>
                        
                    </div>
                    <?php endif; ?>
                    </div>
                   
                   <div>
                    <div class="mb-2"> 
                        <h1 class="text-[color:var(--link-color)] text-xl dark:text-slate-300 text-center"><strong>অনুসরণ করুন</strong></h1>
                    </div>
                    <div class="flex gap-3 justify-center">
                       
                        <?php if(Cache::get('bnSiteSettings')->facebook): ?>
                            <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->facebook); ?>" target="_blank">
                                <div style="background: #0866ff; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-500 ease-out dark:group-hover:border-white">
                                    <i class="fa fa-facebook"></i>
                                </div>
                            </a>
                        <?php endif; ?>
                        <?php if(Cache::get('bnSiteSettings')->twitter): ?>
                            <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->twitter); ?>" target="_blank">
                                <div style="background: #00ACEE; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-500 ease-out dark:group-hover:border-white">
                                    
                                    <i class="fa fa-twitter"></i>
                                </div>
                            </a>
                        <?php endif; ?>
                        <?php if(Cache::get('bnSiteSettings')->instagram): ?>
                            <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->instagram); ?>" target="_blank">
                                <div style="background: #C13584; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-500 ease-out dark:group-hover:border-white">
                                    <i class="fa fa-instagram"></i>
                                </div>
                            </a>
                        <?php endif; ?>
                        <?php if(Cache::get('bnSiteSettings')->youtube): ?>
                            <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->youtube); ?>">
                                <div style="background: #FF0000; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-500 ease-out dark:group-hover:border-white">
                                    <i class="fa fa-youtube"></i>
                                </div>
                            </a>
                        <?php endif; ?>
                        <?php if(Cache::get('bnSiteSettings')->linkedin): ?>
                            <a class="group" href="<?php echo e(Cache::get('bnSiteSettings')->linkedin); ?>" target="_blank">
                                <div style="background: #0077B5; color:white; border-radius:20px" class="w-8 h-8 flex justify-center items-center rounded-sm group-hover:border-black duration-500 ease-out dark:group-hover:border-white">
                                    <i class="fa fa-linkedin"></i>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                   </div>
                 
                </div>

                <div class="flex flex-col gap-3 md:gap-0 md:flex-row justify-between items-center py-3 border-b border-custom-bc dark:border-gray-600">
                   
                </div>
                <div class="copyright_text text-center">
                    <p class="py-4 dark:text-slate-300"><?php echo e(Cache::get('bnSiteSettings')->copyright); ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>


<?php /**PATH D:\DevelopingTeam\laragon\www\nutundesh24\resources\views/frontend/bn/common/footer.blade.php ENDPATH**/ ?>