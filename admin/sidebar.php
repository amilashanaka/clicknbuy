<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 " style="opacity: .8">
        <span class="brand-text font-weight-light"> <?= $sys['APP_NAME'] ?></span>
    </a><!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php
                if (is_array($side_menu)) {
                    foreach ($side_menu as $item) {
                ?>
                        <li class="nav-item has-treeview  <?= $item['menu'] ?>">
                            <a href="<?= $item['url'] ?>" class="nav-link  <?= $item['active'] ?>">
                                <i class="nav-icon  <?= $item['icon'] ?>"></i>
                                <p>
                                    <?= $item['name'] ?>
                                    <?= is_array($item['submenu']) ? '<i class="right fas fa-angle-left"></i>' : '' ?>
                                </p>
                            </a>
                            <?php if (is_array($item['submenu'])) {
                                foreach ($item['submenu']  as $sub_item) { ?>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?= $sub_item['url'] ?>" class="nav-link" style="font-size: 13px;">
                                                <i class="nav-icon <?= $sub_item['icon'] ?>"></i>
                                                <p><?= $sub_item['name'] ?></p>
                                            </a>
                                        </li>
                                    </ul>
                            <?php }
                            }  ?>
                        </li>
                <?php }
                } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>