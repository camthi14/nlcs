<footer>
    <div class="footer_newsletter">
        <div class="row newsletter-content">
            <div class="col-lg-6 col-12 footer_subscribe">
                <img src=" <?= _PUBLIC_CLIENT . '/image/footer/subscribe-icon.png' ?>" alt="" class="letter-img">
                <span class="letter-content"><span class="white">Subscribe</span> weekly newsletter</span>
            </div>
        </div>
    </div>
    <div class="footer_top">
        <div class="footer_top-content">
            <div class="row top-content">
                <div class="col-lg-4 footer_logo">
                    <a href="" class="logo">
                        <img src=" <?= _PUBLIC_CLIENT . '/image/footer/logo_04.png ' ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-7 col-12 footer_follow">
                    <div class="footer_name">
                        <span class="fot_follow">Follow us</span>
                        <span class="fot_follow-line"></span>
                    </div>
                    <ul class="footer_list">
                        <li class="footer_item">
                            <a href="https://www.twitter.com/" class="footer_link">
                                <i class="fa-brands fa-twitter" style="padding: 0 4px;"></i>
                            </a>
                        </li>
                        <li class="footer_item">
                            <a href="https://www.facebook.com/" class="footer_link">
                                <i class="fa-brands fa-facebook-f" style="padding: 0 7px;"></i>
                            </a>
                        </li>
                        <li class="footer_item">
                            <a href="https://www.instagram.com/" class="footer_link">
                                <i class="fa-brands fa-instagram" style="padding: 0 5px;"></i>
                            </a>
                        </li>
                        <li class="footer_item">
                            <a href="https://translate.google.com/" class="footer_link">
                                <i class="fa-brands fa-google-plus-g" style="padding: 0 2px;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_content">
        <div class="row">
            <div class="col-lg-4 col-12 footer_content-about">
                <h4 class="footer_title">About us</h4>
                <div class="footer_address">
                    <span class="address-name">Address: </span>
                    <span class="address-main">Regione Venetta, 21/100, Milano,
                        Italy</span>
                </div>
                <ul class="footer_icon-list">
                    <li class="footer_icon-item">
                        <a href="tel:700800-50-800" class="footer_icon-link">
                            <i class="fa fa-phone"></i>
                            <span>+700800-50-800</span>
                        </a>
                    </li>
                    <li class="footer_icon-item">
                        <a href="mailto:manager@chaitan.md" class="footer_icon-link">
                            <i class="fa fa-envelope"></i>
                            <span>manager@chaitan.md</span>
                        </a>
                    </li>
                    <li class="footer_icon-item">
                        <div class="footer_icon-link">
                            <i class="fa-solid fa-sack-dollar"></i>
                            <span>chaitan</span>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 col-12 footer_content-explore">
                <h4 class="footer_title">Explore</h4>
                <ul class="row explore_list">
                    <li class="col-lg-6 explore_item <?= $data['page'] === 'home' ? 'active' : '' ?>">
                        <span class="ex_chevron"></span>
                        <a href="<?= _WEB_ROOT . '/' ?> " class="explore_link">
                            Home
                        </a>
                    </li>
                    <li class="col-lg-6 explore_item <?= $data['page'] === 'about' ? 'active' : '' ?>">
                        <span class="ex_chevron"></span>
                        <a href="<?= _WEB_ROOT . '/about' ?> " class="explore_link">
                            About us
                        </a>
                    </li>
                    <li class="col-lg-6 explore_item <?= $data['page'] === 'product' ? 'active' : '' ?>">
                        <span class="ex_chevron"></span>
                        <a href="<?= _WEB_ROOT . '/product' ?> " class="explore_link">
                            Product
                        </a>
                    </li>
                    <li class="col-lg-6 explore_item <?= $data['page'] === 'blog' ? 'active' : '' ?>">
                        <span class="ex_chevron"></span>
                        <a href="<?= _WEB_ROOT . '/blog' ?> " class="explore_link">
                            Blog
                        </a>
                    </li>
                    <li class="col-lg-6 explore_item <?= $data['page'] === 'contact' ? 'active' : '' ?>">
                        <span class="ex_chevron"></span>
                        <a href="<?= _WEB_ROOT . '/contact' ?> " class="explore_link">
                            Contact
                        </a>
                    </li>
                    <li class="col-lg-6 explore_item <?= $data['page'] === 'gallery' ? 'active' : '' ?>">
                        <span class="ex_chevron"></span>
                        <a href="<?= _WEB_ROOT . '/gallery' ?> " class="explore_link">
                            Gallery
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-12 footer_content-recent">
                <h4 class="footer_title">Recent News</h4>
                <div class="recent_content">
                    <a href="<?= _WEB_ROOT . '/blog' ?>" class="recent_main">
                        <img src=" <?= _PUBLIC_CLIENT . '/image/footer/blog_01-110x80.jpg' ?>" alt="">
                        <div class="recent_op">
                            <p class="recent_date">February 21, 2018</p>
                            <p class="recent_name">3 way how to test nutaral indian tea</p>
                        </div>
                    </a>
                    <a href="<?= _WEB_ROOT . '/blog' ?>" class="recent_main">
                        <img src=" <?= _PUBLIC_CLIENT . '/image/footer/blog_02-110x80.jpg' ?>" alt="">
                        <div class="recent_op">
                            <p class="recent_date">February 21, 2018</p>
                            <p class="recent_name">Results of international tea conference'18</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="footer_bottom">
        <span class="white"> &copy; 2022 Chaitan designed by Cam Thi</span>
        <div class='top_page'>
            <span class="icon-top">
                <i class="fa-solid fa-angles-down"></i>
            </span>
        </div>
    </div>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    AOS.init();
</script>

<script src="<?php echo _PUBLIC . '/client/assets/js/search.js' ?>"></script>
<script src="<?php echo _PUBLIC . '/client/assets/js/modal.js' ?>"></script>
<script src="<?php echo _PUBLIC . '/client/assets/js/validator.js' ?>"></script>

<?php if (isset($data['js'])) : ?>
    <?php foreach ($data['js'] as $js) : ?>
        <script src="<?= $this->getJs($js) ?>"></script>
    <?php endforeach ?>
<?php endif ?>

<script>
    <?php if ((isset($_SESSION['user_not_login']) && $_SESSION['user_not_login'])) : ?>

        $(".js_user").trigger("click");

        <?php unset($_SESSION['user_not_login']) ?>
    <?php endif ?>
</script>


<script>
    Validator({
        form: '#res-form1',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#email'),
            Validator.isEmail('#email'),
            Validator.isRequired('#password'),
            Validator.minLength('#password', 6),
        ],
    })

    Validator({
        form: '#modal-form1',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('#email'),
            Validator.isEmail('#email'),
            Validator.isRequired('#password'),
            Validator.minLength('#password', 6),
        ]
    })
</script>
</body>

</html>