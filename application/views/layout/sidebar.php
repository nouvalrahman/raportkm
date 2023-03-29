<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <img src="<?= base_url('assets/backend/img/smamita.png') ?>" alt="" class="img-fluid mb-2">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 mt-4">
        <!-- TES -->
        <?php
        $role_id = $this->session->userdata('role_id');
        // $queryMenu = "SELECT `menu`.`id`, `menu`, `icon`
        //         FROM `menu` JOIN `useraccess_menu`
        //         ON `menu`.`id` = `useraccess_menu`.`menu_id`
        //         WHERE `useraccess_menu`.`role_id` = $role_id
        //         AND `menu`.`is_active` = 1 
        //         ORDER BY `useraccess_menu`.`menu_id` ASC
        //         ";

        // $menu = $this->db->query($queryMenu)->result_array();
        // var_dump($menu);
        // die;
        ?>
        <!-- END -->
        <?php foreach ($menu as $m): ?>
            <?php
            // var_dump($this->uri->segment(1));
            // var_dump($m['menu']);
            // var_dump($this->uri->segment(2));
            // die;
            // stripos($this->uri->segment(1), $m['menu']) !== FALSE ->>> insensitive
            // strpos($this->uri->segment(1), $m['menu']) !== FALSE ->>> 
            ?>

            <li class="menu-item <?php if (stripos($this->uri->segment(1), $m['menu']) !== FALSE) {
                echo "active open";
            } ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle ">
                    <i class="<?= $m['icon'] ?>"></i>
                    <div data-i18n="<?= $m['menu'] ?>"><?= $m['menu'] ?></div>
                </a>

                <?php
                $menuId = $m['id'];
                // $querysubmenu = "SELECT * FROM `sub_menu` WHERE `menu_id` = $menuId AND is_active = 1";
                $querysubmenu = "SELECT *
                        FROM `submenu` JOIN `menu`
                        ON `submenu`.`menu_id` = `menu`.`id`
                        WHERE `submenu`.`menu_id` = $menuId
                        -- WHERE `sub_menu`.`menu_id` = {$m['id']}
                        AND `submenu`.`is_active` = 1
                        ";

                // <!-- END QUERY SUBMENU -->
                // <!-- result array query builder -->
                $submenu = $this->db->query($querysubmenu)->result_array();
                ?>

                <ul class="menu-sub">
                    <?php foreach ($submenu as $sm): ?>
                        <li class="menu-item <?php if (stripos($this->uri->segment(2), $sm['title']) !== FALSE) {
                            echo "active";
                        } ?>">
                            <a href="<?= base_url($sm['url']) ?>" class="menu-link">
                                <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
                                <div data-i18n="<?= $sm['title'] ?>"><?= $sm['title'] ?></div>
                                <!-- <div data-i18n="Analytics">Dashboard</div> -->
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </li>
        <?php endforeach ?>












        <!--          


         <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Pages</span>
         </li>
         <li class="menu-item active">
             <a href="javascript:void(0);" class="menu-link menu-toggle ">
                 <i class="menu-icon tf-icons bx bx-dock-top"></i>
                 <div data-i18n="Account Settings">Account Settings</div>
             </a>
             <ul class="menu-sub">
                 <li class="menu-item active">
                     <a href="pages-account-settings-account.html" class="menu-link">
                         <div data-i18n="Account">Account</div>
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="pages-account-settings-notifications.html" class="menu-link">
                         <div data-i18n="Notifications">Notifications</div>
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="pages-account-settings-connections.html" class="menu-link">
                         <div data-i18n="Connections">Connections</div>
                     </a>
                 </li>
             </ul>
         </li> -->

    </ul>
</aside>
<!-- / Menu -->