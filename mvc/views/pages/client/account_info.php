<main>
    <div class=" bg_top">
        <div class="bg_top-content ">
            <h1 class="bg_top-title">Account</h1>
            <div class="bg_top-info">
                <a href="<?= _WEB_ROOT . '/' ?>" class="bg_top-link">Home</a>
                <i class="fa-solid fa-chevron-down bg_top-chevron"></i>
                <p class="bg_top-sub">Account</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row account_content">
            <?php if (isset($data['user_info']) && count($data['user_info']) > 0) : ?>
                <div class="col-lg-4 account_left">
                    <div class="account_img">
                        <img src="<?= _PATH_AVATAR . $data['user_info']['avt'] ?>" alt="">
                    </div>
                    <div class=" account_name"><?= $data['user_info']['name'] ?></div>
                    <p class="account_email"><?= $data['user_info']['email'] ?></p>
                    <input type="submit" value="Edit" class="mt-2">
                </div>
                <div class="col-lg-8 account_right">
                    <h3>CONTACT INFO</h3>
                    <p><span>Name: </span><?= $data['user_info']['name'] ?></p>
                    <p><span>Email: </span><?= $data['user_info']['email'] ?></p>
                    <p><span>Phone: </span><?= $data['user_info']['phone'] ?></p>
                    <p><span>Address </span><?= $data['user_info']['address'] ?></p>
                    <img src="<?= _PUBLIC_CLIENT . '/image/coffee-book-hands-relaxing.jpg' ?>" alt="">
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>