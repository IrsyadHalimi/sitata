        <!-- Sidebar -->
        <?php if ($user['role_id']==2) { ?>
        <ul class="navbar-nav bg-info sidebar sidebar-dark accordion" id="accordionSidebar">
        <?php } 
        else { ?>
        <ul class="navbar-nav bg-danger sidebar sidebar-dark accordion" id="accordionSidebar">    
        <?php } ?>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-text mx-3"><h4><strong>SITATA</strong></h4></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Query Menu -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC 
                        ";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <!-- Looping Menu -->
            <?php foreach($menu as $m) : ?>

            <div class="sidebar-heading">
                <?= $m['menu']; ?>
            </div>

            <!-- Siapkan Sub-menu Sesuai Menu -->
            <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT *
                                FROM `user_sub_menu` JOIN `user_menu`
                                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                               WHERE `user_sub_menu`.`menu_id` = $menuId
                                 AND `user_sub_menu`.`is_active` = 1";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

            <?php foreach($subMenu as $sm) : ?>
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url($sm['url']); ?> ">
                <i class="<?= $sm['icon']; ?>"></i>
                <?= $sm['title']; ?></a>
            </li>
            <?php endforeach ?>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php endforeach; ?>
            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>"  data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->