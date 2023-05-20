


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <!-- Brand Logo -->
      <a href="<?php echo url("/"); ?>" class="brand-link"  style="text-align:center;">
        <img src="<?php echo $site_logo ?>" alt=" " class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $site_name; ?></span>
      </a>




      <!-- Sidebar -->
      <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <?php if (in_array("user", $users_group->pages)) { ?>
             <li class="nav-item">
               <a href="<?php echo url("user/"); ?>" class="nav-link">
                 <i class="fa fa-tachometer-alt"></i> <p> <?php echo $lang["dashboard"]; ?></p>
               </a>
             </li>
           <?php } ?>

           <?php if (in_array("user/coins", $users_group->pages)) { ?>
           <li id="coins-link" class="nav-item">
             <a href="<?php echo url('/user/coins'); ?>"  class="nav-link">
               <i class="fa fa-list"></i>
               <span> <?php echo $lang["coins"]; ?></span>
             </a>
           </li>
         <?php } ?>

           <?php if (in_array("user/languages", $users_group->pages)) { ?>
             <li id="languages-link" class="nav-item">
               <a href="<?php echo url('/user/languages'); ?>"  class="nav-link">
                 <i class="fa fa-language"></i>
                 <span>  <?php echo $lang["languages"]; ?></span>
               </a>
             </li>
           <?php } ?>

           <?php if (in_array("user/users", $users_group->pages)) { ?>
             <li id="users-link" class="nav-item">
               <a href="<?php echo url('/user/users'); ?>"  class="nav-link">
                 <i class="fa fa-user"></i>
                 <span> <?php echo $lang["users"]; ?></span>
               </a>
             </li>
           <?php } ?>
           <?php if (in_array("user/users-groups", $users_group->pages)) { ?>
             <li id="users-groups-link" class="nav-item">
               <a href="<?php echo url('/user/users-groups'); ?>"  class="nav-link">
                 <i class="fa fa-users"></i>
                 <span> <?php echo $lang["users_group"]; ?></span>
               </a>
             </li>
           <?php } ?>


             <?php if (in_array("user/settings", $users_group->pages)) { ?>
             <li id="settings-link" class="nav-item">
               <a href="<?php echo url('/user/settings'); ?>"  class="nav-link">
                 <i class="fa fa-cogs"></i>
                 <span> <?php echo $lang["setting"]; ?></span>
               </a>
             </li>
           <?php } ?>




          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      </div>
      <!-- /.sidebar -->
    </aside>





