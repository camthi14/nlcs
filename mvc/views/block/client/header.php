<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href=" <?= _PUBLIC_CLIENT . '/image/plant.png' ?>">
    <title><?= 'Chaitan | ' . htmlspecialchars($data['title']) ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;1,200;1,300;1,400&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php if (isset($data['css'])) : ?>
        <?php foreach ($data['css'] as $css) : ?>
            <link rel="stylesheet" href="<?= $this->getCss($css) ?>">
        <?php endforeach ?>
    <?php endif ?>
</head>

<body>
    <div class="app">
        <div class="wpd_icon-main js_wpd-main">
            <div class="wpd_icon-content js_wpd-content">
                <form action="<?= _WEB_ROOT . '/product?search=' ?>" method="get" class="wpd-input">
                    <input type="text" name="search" class="input-search" placeholder="Search Our Store..." required>
                    <button type="submit" class="icon-search"><i class="fa-solid fa-magnifying-glass "></i></button>
                </form>
                <button class="wpd_icon-close js_wpd-close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <header class="header js-header">
            <div class="header_top relative">
                <div class="wrapper_left">
                    <ul class="block_icons">
                        <li class="block_icon">
                            <i class="icon fa fa-phone-square"></i>
                            <span class="noti" style="font-weight: 700;">+20-800-33-000</span>
                        </li>
                        <li class="block_icon">
                            <i class="icon fa-solid fa-location-dot"></i>
                            <span class="noti" style="font-weight: 400;">Regione Venetta, 21/100, Milano, Italy</span>
                        </li>
                        <li class="block_icon">
                            <i class="icon fa-solid fa-clock"></i>
                            <span class="noti" style="font-weight: 400;">Monday-Sunday 9:00 - 23:00</span>
                        </li>
                    </ul>
                </div>

                <style>
                    .avatar+.list-info {
                        visibility: hidden;
                    }

                    .avatar.show+.list-info {
                        visibility: visible;
                    }
                </style>

                <div class="wrapper_right">
                    <button class="leading-none wpd_icon-search wpd-btn">
                        <i class="fa-solid fa-magnifying-glass js_magnifying-glass"></i>
                    </button>
                    <a href="<?= _WEB_ROOT . '/cart' ?>" class="leading-none wpd_icon-cart wpd-btn">
                        <i class="fa fa fa-shopping-bag icon_c"></i>
                        <span class="mount-cart">
                            <?php
                            if (isset($_SESSION['cart']))
                                echo $_SESSION['cart']['info']['num_order'];
                            else echo 0;
                            ?>
                        </span>
                    </a>

                    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                        <div class="" style="margin: 0 12px;">
                            <?php if (isset($_SESSION['user']['avt']) && !empty($_SESSION['user']['avt'])) { ?>
                                <img src="<?php echo _PATH_AVATAR . $_SESSION['user']['avt'] ?>" alt="" class="cursor-pointer avatar w-[22px] h-[22px] rounded-full">
                            <?php } else { ?>
                                <img src="https://ss-images.saostar.vn/wp700/pc/1613810558698/Facebook-Avatar_3.png" alt="" class="cursor-pointer avatar w-[22px] h-[22px] rounded-full">
                            <?php } ?>

                            <ul class="absolute list-info z-[999] right-4 mt-2 top-full w-[100px] shadow-lg rounded-xl bg-white border-b-4 border-[#88b44e] shadow-[rgba(0, 0, 0, 0.3)] ">
                                <div class="absolute z-[100] top-[-15px] right-[12px] w-16 overflow-hidden inline-block">
                                    <div class="h-6 w-6 bg-white rotate-45 transform origin-bottom-left"></div>
                                </div>
                                <?php if ($_SESSION['user']['group_id'] == 1) { ?>
                                    <li class=""><a class="rounded-t-xl block p-3 text-[#252c30] text-xl hover:bg-[#f9fbf6] hover:text-[#88b44e]" href="<?php echo _WEB_ROOT . '/admin' ?>">Admin</a></li>
                                <?php } ?>
                                <?php if ($_SESSION['user']['group_id'] != 1) { ?>
                                    <li class=""><a class="block p-3 text-[#252c30] text-xl hover:bg-[#f9fbf6] hover:text-[#88b44e]" href="<?php echo _WEB_ROOT . '/infoOrder' ?>">Info Order</a></li>
                                <?php } ?>
                                <li class=""><a class="block p-3 text-[#252c30] text-xl hover:bg-[#f9fbf6] hover:text-[#88b44e]" href="<?php echo _WEB_ROOT . '/account' ?>">Info</a></li>
                                <li class=""><a class="block p-3 text-[#252c30] text-xl hover:bg-[#f9fbf6] hover:text-[#88b44e]" href="<?php echo _WEB_ROOT . '/User/handleLogout' ?>">Logout</a></li>
                            </ul>
                        </div>

                    <?php } else { ?>
                        <button class="leading-none wpd_icon-user wpd-btn js_user">
                            <i class="fa fa-user "></i>
                        </button>
                    <?php } ?>
                </div>
            </div>
            <div class="header_nav">
                <div class="header-logo">
                    <a href="<?= _WEB_ROOT . "/" ?>" class="logo">
                        <img src="<?= _PUBLIC_CLIENT . '/image/header/logo_03.png' ?>" alt="">
                    </a>
                </div>
                <ul class="navbar-list">
                    <li class="navbar-item <?= $data['page'] === 'home' ? 'active' : '' ?>">
                        <a href="<?= _WEB_ROOT . '/' ?> " class="navbar-link green">Home</a>
                    </li>
                    <li class="navbar-item nav-about <?= $data['page'] === 'about' ? 'active' : '' ?>">
                        <a href="<?= _WEB_ROOT . '/about' ?>" class="navbar-link">About us
                            <i class="fa-solid fa-chevron-down"></i>
                        </a>
                        <ul class="subnav">
                            <li><a href="<?= _WEB_ROOT . '/about' ?>#about_us">About Company</a></li>
                            <li><a href="<?= _WEB_ROOT . '/about' ?>#about_tes">Team Information</a></li>
                            <li><a href="<?= _WEB_ROOT . '/about' ?>#about_team">Team</a></li>
                            <li><a href="<?= _WEB_ROOT . '/about' ?>#about_faq">FAQ</a></li>
                        </ul>
                    </li>
                    <li class="navbar-item <?= $data['page'] === 'product' ? 'active' : '' ?>">
                        <a href="<?= _WEB_ROOT . '/product' ?>" class="navbar-link">Product</a>
                    </li>
                    <li class="navbar-item <?= $data['page'] === 'blog' ? 'active' : '' ?>">
                        <a href="<?= _WEB_ROOT . '/blog' ?>" class="navbar-link">Blog</a>
                    </li>
                    <li class="navbar-item <?= $data['page'] === 'contact' ? 'active' : '' ?>">
                        <a href="<?= _WEB_ROOT . '/contact' ?>" class="navbar-link">Contact</a>
                    </li>
                    <li class="navbar-item <?= $data['page'] === 'gallery' ? 'active' : '' ?>">
                        <a href="<?= _WEB_ROOT . '/gallery' ?>" class="navbar-link">Gallery</a>
                    </li>
                </ul>
                <div class="iconmenu">
                    <div class="iconmenu-item"></div>
                    <div class="iconmenu-item"></div>
                    <div class="iconmenu-item"></div>
                </div>
            </div>

        </header>