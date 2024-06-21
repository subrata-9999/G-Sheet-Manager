<?php
$scope = $this->session->scope;
$sidebar = [];

foreach ($scope as $controller => $actions) {
    foreach ($actions as $action => $details) {
        $sidebar[$details['group_by']][] = [
            'url' => "$controller/$action",
            'display' => $details['display'],
            'is_visible' => $details['is_visible']
        ];
    }
}

?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $this->session->name ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php foreach ($sidebar as $key => $menus) : ?>
        <?php if (empty($key)) : ?>
            <?php foreach ($menus as $menu) : ?>
                <?php if ($menu['is_visible']) : ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url() . $menu['url'] ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span><?= $menu['display'] ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#<?= strtolower(str_replace(' ', '', $key)) ?>" aria-expanded="true" aria-controls="<?= strtolower(str_replace(' ', '', $key)) ?>">
                    <i class="fas fa-tasks"></i>
                    <span><?= $key ?></span>
                </a>
                <div id="<?= strtolower(str_replace(' ', '', $key)) ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php foreach ($menus as $menu) : ?>
                            <?php if ($menu['is_visible']) : ?>
                                <a class="collapse-item" href="<?= base_url() . $menu['url'] ?>"><?= $menu['display'] ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->