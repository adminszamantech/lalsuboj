<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="<?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?> treeview">
                <a href="<?php echo e(url('admin/backend/dashboard')); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            
            <?php if(auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 4 || auth()->user()->role == 5): ?>
                <li class="<?php echo e(request()->routeIs('bn-contents.*')
                                || request()->routeIs('bn-breaking-news.*')
                                || request()->routeIs('bn-videos.*')
                                || request()->routeIs('bn-video-position.*')
                                || request()->routeIs('bn-content-position.*')
                                || request()->routeIs('elections.*') ? 'active' : ''); ?> treeview">
                    <a href="#">
                        <i class="fa fa-file-o"></i> <span>News</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo e(request()->routeIs('bn-contents.create') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('bn-contents.create')); ?>"><i class="fa fa-plus-square"></i> Add news</a>
                        </li>
                        <li class="<?php echo e(request()->routeIs('bn-contents.index') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('bn-contents.index')); ?>"><i class="fa fa-file-o"></i> News list</a></li>




                        <li class="<?php echo e(request()->routeIs('bn-content-position.*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('bn-content-position.index')); ?>"><i class="fa fa-file-o"></i> News
                                position</a>
                        </li>
                        <li class="<?php echo e(request()->routeIs('bn-videos.*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('bn-videos.index')); ?>"><i class="fa fa-file-o"></i> Videos</a>
                        </li>
                        <li class="<?php echo e(request()->routeIs('bn-video-position.*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('bn-video-position.index')); ?>"><i class="fa fa-file-o"></i> Video
                                Position</a>
                        </li>
                        <li class="<?php echo e(request()->routeIs('elections.index') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('elections.index')); ?>"><i class="fa fa-file-o"></i> Elections</a>
                        </li>
                        <li class="<?php echo e(request()->routeIs('admin.counter') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.counter')); ?>"><i class="fa fa-file-o"></i> Counter</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>


            
            <?php if(auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 4 || auth()->user()->role == 5 || auth()->user()->role == 6): ?>
                <li class="<?php echo e(request()->routeIs('manual-photos.*') ? 'active' : ''); ?> treeview">
                    <a href="#">
                        <i class="fa fa-picture-o"></i> <span>Media Libary</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo e(request()->routeIs('manual-photos.create') ? 'active' : null); ?>">
                            <a href="<?php echo e(route('manual-photos.create')); ?>"><i class="fa fa-plus-square"></i> Add New Photo</a>
                        </li>
                        <li class="<?php echo e(request()->routeIs('manual-photos.index') ? 'active' : null); ?>">
                            <a href="<?php echo e(route('manual-photos.index')); ?>"><i class="fa fa-file-o"></i> Photo list</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo e(request()->routeIs('manual-docs.*') ? 'active' : ''); ?> treeview">
                    <a href="#">
                        <i class="fa fa-folder-open-o"></i> <span>Documents</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo e(request()->routeIs('manual-docs.create') ? 'active' : null); ?>">
                            <a href="<?php echo e(route('manual-docs.create')); ?>"><i class="fa fa-plus-square"></i> Add New Document</a>
                        </li>
                        <li class="<?php echo e(request()->routeIs('manual-docs.index') ? 'active' : null); ?>">
                            <a href="<?php echo e(route('manual-docs.index')); ?>"><i class="fa fa-file-o"></i> Documents list</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            
            <?php if(auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 5): ?>
                <li class="<?php echo e(request()->routeIs('photo-albums.*')
                             || request()->routeIs('photo-album-positions.*') ? 'active' : ''); ?> treeview">
                    <a href="#">
                        <i class="fa fa-photo"></i> <span>Photo</span>
                        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo e(request()->routeIs('photo-albums.create') ? 'active' : null); ?>">
                            <a href="<?php echo e(route('photo-albums.create')); ?>"><i class="fa fa-plus-square"></i> Add Photo Album</a>
                        </li>
                        <li class="<?php echo e(request()->routeIs('photo-albums.index') ? 'active' : null); ?>">
                            <a href="<?php echo e(route('photo-albums.index')); ?>"><i class="fa fa-file-o"></i> Photo Album list</a>
                        </li>
                        <li class="<?php echo e(request()->routeIs('photo-album-positions.*') ? 'active' : null); ?>">
                            <a href="<?php echo e(route('photo-album-positions.index')); ?>"><i class="fa fa-file-o"></i> Album Position</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            
            <?php if(auth()->user()->role == 1 || auth()->user()->role == 3 || auth()->id() == 11): ?>
                <li class="<?php echo e(request()->routeIs('bn-ads.*') || request()->routeIs('bn-mobile-ads.*') ? 'active' : ''); ?> treeview">
                    <a href="#">
                        <i class="fa fa-image"></i> <span>Ad Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo e(request()->routeIs('bn-ads.*') ? 'active' : null); ?>">
                            <a href="<?php echo e(route('bn-ads.index')); ?>"><i class="fa fa-dollar"></i> Desktop Ads</a>
                        </li>
                        <li class="<?php echo e(request()->routeIs('bn-mobile-ads.*') ? 'active' : null); ?>">
                            <a href="<?php echo e(route('bn-mobile-ads.index')); ?>"><i class="fa fa-dollar"></i> Mobile Ads</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            
            <!--<?php if(auth()->user()->role == 1 || auth()->user()->role == 2): ?>
                <li class="<?php echo e(request()->routeIs('epapers.*') || request()->routeIs('magazines.*') ? 'active' : ''); ?> treeview">
                    <a href="#">
                        <i class="fa fa-image"></i> <span>E-paper & Magazine</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo e(request()->routeIs('epapers.*') ? 'active' : null); ?>">
                            <a href="<?php echo e(route('epapers.index')); ?>"><i class="fa fa-image"></i> E-Paper List</a>
                        </li>
                        <li class="<?php echo e(request()->routeIs('magazines.*') ? 'active' : null); ?>">
                            <a href="<?php echo e(route('magazines.index')); ?>"><i class="fa fa-image"></i> Magazine List</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?> -->



            
            <?php if(auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 5): ?>
                <li class="<?php echo e(request()->routeIs('bn-tags.*')
                                || request()->routeIs('bn-authors.*')
                                || request()->routeIs('bn-categories.*')
                                || request()->routeIs('bn-subcategories.*')
                                || request()->routeIs('bn-video-categories.*')
                                || request()->routeIs('countries.*')
                                || request()->routeIs('divisions.*')
                                || request()->routeIs('districts.*')
                                || request()->routeIs('upozillas.*')
                                || request()->routeIs('bn-site-settings.*') ? 'active' : ''); ?> treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i> <span>Bn Settings</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo e(request()->routeIs('bn-tags.*') ? 'active' : null); ?>">
                            <a href="<?php echo e(route('bn-tags.index')); ?>"><i class="fa fa-tag"></i> Bn Tag</a>
                        </li>
                        <li class="<?php echo e(request()->routeIs('bn-authors.*') ? 'active' : null); ?>">
                            <a href="<?php echo e(route('bn-authors.index')); ?>"><i class="fa fa-file-o"></i> Bn Author</a>
                        </li>
                        <?php if(auth()->user()->role == 1): ?>
                            <li class="<?php echo e(request()->routeIs('bn-categories.*') ? 'active' : null); ?>">
                                <a href="<?php echo e(route('bn-categories.index')); ?>"><i class="fa fa-plus-square"></i> Bn Category</a>
                            </li>
                            <li class="<?php echo e(request()->routeIs('bn-subcategories.*') ? 'active' : null); ?>">
                                <a href="<?php echo e(route('bn-subcategories.index')); ?>"><i class="fa fa-file-o"></i> Bn Subcategory</a>
                            </li>
                            <li class="<?php echo e(request()->routeIs('bn-video-categories.*') ? 'active' : null); ?>">
                                <a href="<?php echo e(route('bn-video-categories.index')); ?>"><i class="fa fa-plus-square"></i> Bn Video Category</a>
                            </li>
                            <li class="<?php echo e(request()->routeIs('countries.*') ? 'active' : null); ?>">
                                <a href="<?php echo e(route('countries.index')); ?>"><i class="fa fa-plus-square"></i> Country</a>
                            </li>
                            <li class="<?php echo e(request()->routeIs('divisions.*') ? 'active' : null); ?>">
                                <a href="<?php echo e(route('divisions.index')); ?>"><i class="fa fa-file-o"></i> Division list</a>
                            </li>
                            <li class="<?php echo e(request()->routeIs('districts.*') ? 'active' : null); ?>">
                                <a href="<?php echo e(route('districts.index')); ?>"><i class="fa fa-file-o"></i> District list</a>
                            </li>
                            <li class="<?php echo e(request()->routeIs('upozillas.*') ? 'active' : null); ?>">
                                <a href="<?php echo e(route('upozillas.index')); ?>"><i class="fa fa-file-o"></i> Upozilla list</a>
                            </li>
                            <li class="<?php echo e(request()->routeIs('bn-site-settings.*') ? 'active' : null); ?>">
                                <a href="<?php echo e(route('bn-site-settings.index')); ?>"><i class="fa fa-file-o"></i> Bn Site Settings</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>

                

                <?php if(auth()->user()->role == 1): ?>
                    <li class="<?php echo e(request()->routeIs('users.*')
                                || request()->routeIs('mis-users.*') ? 'active' : ''); ?> treeview">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Users</span>
                            <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                        </a>
                        <ul class="treeview-menu">
                            <!--<li class="<?php echo e(request()->routeIs('mis-users.*') ? 'active' : null); ?>">
                                <a href="<?php echo e(route('mis-users.index')); ?>"><i class="fa fa-file-o"></i> MIS user</a>
                            </li> -->
                            <li class="<?php echo e(request()->routeIs('users.*') ? 'active' : null); ?>">
                                <a href="<?php echo e(route('users.index')); ?>"><i class="fa fa-plus-square"></i> User</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/backend/common/sidebar.blade.php ENDPATH**/ ?>