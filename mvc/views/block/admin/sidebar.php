<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= _WEB_ROOT . "/" ?>" class="brand-link">
        <img src="<?= _PUBLIC_CLIENT . '/image/plant.png' ?>" alt="Chaitan Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Chaitan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <?php if (isset($_SESSION['user'])) : ?>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                <div class="image">
                    <img src="<?= _PATH_AVATAR . $_SESSION['user']['avt'] ?>" alt="User Image" class="img-avatar">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $_SESSION['user']['name'] ?></a>
                </div>
            </div>
        <?php endif ?>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?php echo _WEB_ROOT . '/admin' ?>" class="nav-link <?php echo $data['page'] === 'admin' ? 'active' : '' ?>">
                        <i class="mr-2 fas fa-palette"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo _WEB_ROOT . '/admin/groupUser' ?>" class="nav-link <?php echo $data['page'] === 'groupUser/list' ? 'active' : '' ?>">
                        <i class="mr-2 fas fa-users"></i>
                        <p>
                            Group User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo _WEB_ROOT . '/user/listUser' ?>" class="nav-link <?php echo $data['page'] === 'users/list' ? 'active' : '' ?>">
                        <i class="mr-2 fas fa-user"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo _WEB_ROOT . '/category/listCate' ?>" class="nav-link <?php echo $data['page'] === 'category/list' ? 'active' : '' ?>">
                        <i class="mr-2 fas fa-shapes"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo _WEB_ROOT . '/product/listProduct' ?>" class="nav-link <?php echo $data['page'] === 'product/list' ? 'active' : '' ?>">
                        <i class="mr-2 fas fa-shopping-bag"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo _WEB_ROOT . '/blog/listBlog' ?>" class="nav-link <?php echo $data['page'] === 'blog/list' ? 'active' : '' ?>">
                        <i class="mr-2 fas fa-blog"></i>
                        <p>
                            Blog
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo _WEB_ROOT . '/manageImage/listImg' ?>" class="nav-link <?php echo $data['page'] === 'manageImg/list' ? 'active' : '' ?>">
                        <i class="mr-2 far fa-image"></i>
                        <p>
                            ManageImage
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>