  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo e(url('/admin/backend/dashboard')); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">ND</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo e(Cache::get('bnSiteSettings')->site_name); ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

        <a style="color:#fff; background: black; padding: 5px 10px; margin-top: 10px; display: inline-block" target="_blank" href="<?php echo e(route('home_page')); ?>">View Site</a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo e(asset('/media/common/'.Cache::get('bnSiteSettings')->favicon)); ?>" class="user-image" alt="Admin Image">
              <span class="hidden-xs"><?php echo e(auth()->user()->name); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo e(asset('/media/common/'.Cache::get('bnSiteSettings')->favicon)); ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo e(auth()->user()->name); ?> - <?php echo e(Str::title(auth()->user()->designation)); ?>

                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                  <a href="<?php echo e(route('admin.logout')); ?>" class="btn btn-default btn-flat"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
                      <?php echo e(csrf_field()); ?>

                  </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
<?php /**PATH /home/szamymni/notundesh24.com/resources/views/backend/common/header.blade.php ENDPATH**/ ?>