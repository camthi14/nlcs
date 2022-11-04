<main>
    <?php require_once './mvc/views/modules/home/slider.php' ?>
    <div class="home">
        <div class="home_main1">
            <div class="row">
                <div class="col col-6 home_main1-left">
                    <?php if (isset($data['about'])) : ?>
                        <img src="<?= _PATH_MANAGE_IMG . $data['about']['image'] ?>" alt="">
                    <?php endif ?>
                </div>
                <div class="col col-6 home_main1-right">
                    <div data-aos="fade-up" data-aos-duration="2000" class="home_main1-content">
                        <h3 class="home_main-about">About company</h3>
                        <h2 class="home_main-title">World Tea Company</h2>
                        <p class=" home_main-sub main1-sub">Growers are constantly educated to practice Good
                            Agricultural Practices(GAP). The Processing/ Manufacturing facilities
                            owned by the export companies comply with local standards (SLSI) and with
                            International Quality Standards such as
                            ISO,HACCP, and EU Standards. Traceability throughout the supply chain is
                            monitored
                            in order to guarantee a safe product
                            to the consumers.</p>
                        <ul class="main1_block">
                            <li class="main1_item">
                                <img src="<?= _PUBLIC_CLIENT . '/image/index/main1/tea-icon-1.png' ?>" alt="" class="main1_img">
                                <div class="main1_info">Free delivery services</div>
                            </li>
                            <li class="main1_item">
                                <img src="<?= _PUBLIC_CLIENT . '/image/index/main1/tea-icon-2.png' ?>" alt="" class="main1_img">
                                <div class="main1_info">Proffesional customer support</div>
                            </li>
                            <li class="main1_item">
                                <img src="<?= _PUBLIC_CLIENT . '/image/index/main1/tea-icon-3.png' ?>" alt="" class="main1_img">
                                <div class="main1_info">Online store and payments</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="home_main2">
            <div class="main2_top">
                <h3 class="home_main-about">Our skills</h3>
                <h2 class="home_main-title">Quality ceylon tea production</h2>
                <p class=" home_main-sub main2-sub">Royal Ceylon Tea selected by the very best Ceylon Master
                    Teamen and presented to you with the permission of the Elephant
                    Chateau and the Ceylon Flavor Foundation. Every ethically sourced product we offer is
                    prepared with the utmost attention
                    to quality. </p>
            </div>
            <div class="main2_content">
                <div class="row ">
                    <ul data-aos="fade-right" data-aos-duration="3000" class="col col-lg-4 main2_block">
                        <li class="main2_item">
                            <div class="main2_item-img">
                                <img src="<?= _PUBLIC_CLIENT . '/image/index/main2/about-1.png' ?>" alt="">
                            </div>
                            <div class="main2_item-right main2_item1-right">
                                <h3 class="item-title">Highest quality</h3>
                                <p class="item-sub">Sed sed condimentum massa, vestibulum urn.</p>
                            </div>
                        </li>
                        <li class="main2_item">
                            <span class="main2_item-img">
                                <img src="<?= _PUBLIC_CLIENT . '/image/index/main2/about-2-1.png' ?>" alt="">
                            </span>
                            <div class="main2_item-right main2_item1-right">
                                <h3 class="item-title">Pure taste</h3>
                                <p class="item-sub">Morbi auctor vestibulum urna, ut interdum ipsum maximus
                                    et.
                                </p>
                            </div>
                        </li>
                        <li class="main2_item">
                            <span class="main2_item-img">
                                <img src="<?= _PUBLIC_CLIENT . '/image/index/main2/about-3-1.png' ?>" alt="">
                            </span>
                            <div class="main2_item-right main2_item1-right">
                                <h3 class="item-title">Wide assortment</h3>
                                <p class="item-sub">Vestibulum urna, ut interdum ipsum maximus et.</p>
                            </div>
                        </li>
                    </ul>
                    <div data-aos="zoom-in-up" data-aos-duration="3000" class="col col-lg-4 main2_img">
                        <?php if (isset($data['qualityCeylon'])) : ?>
                            <img src="<?= _PATH_MANAGE_IMG . $data['qualityCeylon']['image'] ?>" alt="">
                        <?php endif ?>
                    </div>
                    <ul data-aos="fade-left" data-aos-duration="3000" class="col col-lg-4 main2_block">
                        <li class="main2_item">
                            <div class="main2_item-right main2_item2-right">
                                <h3 class="item-title">Eco package</h3>
                                <p class="item-sub">Sed sed condimentum massa.</p>
                            </div>
                            <div class="main2_item-img">
                                <img src="<?= _PUBLIC_CLIENT . '/image/index/main2/about-4.png' ?>" alt="">
                            </div>
                        </li>
                        <li class="main2_item">
                            <div class="main2_item-right main2_item2-right">
                                <h3 class="item-title">Gluten free</h3>
                                <p class="item-sub">Sed sed condimentum massa.</p>
                            </div>
                            <div class="main2_item-img">
                                <img src="<?= _PUBLIC_CLIENT . '/image/index/main2/about-5.png' ?>" alt="">
                            </div>
                        </li>
                        <li class="main2_item">
                            <div class="main2_item-right main2_item2-right">
                                <h3 class="item-title">Without GMO</h3>
                                <p class="item-sub">Vestibulum urna, ut interdum ipsum maximus et.</p>
                            </div>
                            <div class="main2_item-img">
                                <img src="<?= _PUBLIC_CLIENT . '/image/index/main2/about-6.png' ?>" alt="">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="home_main3">
            <div class="main3_top">
                <h3 class="home_main-about">Our products</h3>
                <h2 class="home_main-title">Ceylon tea assortment</h2>
                <p class=" home_main-sub main3-sub">Expert tea leaf pluckers & trusted growers select only
                    the finest leaves from the top tea growing regions of Ceylon &
                    deliver them to you in this unique tea collection. A truly special farm to cup journey
                    that brings you the freshest &
                    tastiest grouping possible.</p>
            </div>
            <section class="main3_content js-slider owl-carousel">

                <?php if (isset($data['product'])) : ?>
                    <?php foreach ($data['product'] as $product) : ?>
                        <a href="" class="main3_swipe-link">
                            <div class="main3_swipe-bg">
                                <img src="<?= _PATH_IMG_Product . $product['img'] ?>" alt="">
                            </div>

                            <div class="main3_swipe-content">
                                <h3 class="main3_swipe-title"><?= htmlspecialchars($product['name']) ?></h3>
                                <p class="main3_swipe-sub"><?= htmlspecialchars($product['description']) ?></p>
                            </div>

                            <div class="main3_swipe-logo">
                                <img src="<?= _PUBLIC_CLIENT . '/image/index/main3.png' ?>" alt="">
                            </div>
                        </a>
                    <?php endforeach ?>
                <?php endif ?>

            </section>
        </div>

        <div class="home_main4">
            <div class="main4_container">
                <div class="row">
                    <div class="col col-6 main4_content">
                        <h3 data-aos="fade-right" data-aos-duration="3000" class="main4_title">Tea is one of the <span style="color: #fff;">most
                                popular</span>
                            drinks in the world.</h3>
                        <p data-aos="fade-left" data-aos-duration="3000" class="main4_sub">Tea has a complex positive
                            effect on the body. Daily use of a
                            cup of
                            tea is good for your health.</p>
                        <ul class="main4_list">
                            <div class="row">
                                <li data-aos="fade-down" data-aos-duration="2000" class="col col-6 main4_item">
                                    <div class="main4_item-img">
                                        <img src="<?= _PUBLIC_CLIENT . '/image/index/main4/icon-block-green-1.png' ?>" alt="">
                                    </div>
                                    <span class="main4_info">Improves brain function</span>
                                </li>
                                <li data-aos="fade-down" data-aos-duration="2000" class="col col-6 main4_item">
                                    <div class="main4_item-img"><img src="<?= _PUBLIC_CLIENT . '/image/index/main4/icon-block-green-3.png' ?>" alt=""></div>

                                    <span class="main4_info">Promotes weight loss
                                    </span>
                                </li>
                                <li data-aos="fade-down" data-aos-duration="4000" class="col col-6 main4_item">
                                    <div class="main4_item-img"><img src="<?= _PUBLIC_CLIENT . '/image/index/main4/icon-block-green-2.png' ?>" alt=""></div>

                                    <span class="main4_info">Disinfects harmful substances
                                    </span>
                                </li>
                                <li data-aos="fade-down" data-aos-duration="4000" class="col col-6 main4_item">
                                    <div class="main4_item-img"><img src="<?= _PUBLIC_CLIENT . '/image/index/main4/icon-block-green-4.png' ?>" alt=""></div>

                                    <span class="main4_info">Prolongs life
                                    </span>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="home_main5">
            <div class="main5_top">
                <h3 class="home_main-about">Online store</h3>
                <h2 class="home_main-title">Popular products</h2>
                <p class=" home_main-sub main5-sub">Perfection in Every Cup
                    Taste the pleasant, clean & layered notes of the many regions showcased in the Elephant
                    Chateau Royal Collection.</p>
            </div>
            <div class="main5_content">
                <ul class="main5_content-list">
                    <div class="row">

                        <?php if (isset($data['product'])) : ?>
                            <?php foreach ($data['product'] as $product) : ?>
                                <li class="col-12 col-lg-4 main5_content-item">
                                    <a href="" class="main5_content-link">
                                        <div class="main5_content-hover">
                                            <div class="main5_content-img">
                                                <img src="<?= _PATH_IMG_Product . $product['img'] ?>" alt="">
                                            </div>
                                            <div class="item-title"><?= htmlspecialchars($product['name']) ?></div>
                                        </div>
                                    </a>
                                    <div class="item-sub"><?= htmlspecialchars($product['description']) ?></div>
                                    <div class="item-price"><?= '$' . htmlspecialchars($product['price']) ?></div>
                                    <div class="main5_btn-more">
                                        <div class="main5_btn-hover">
                                            <a href="<?= _WEB_ROOT . '/product/detail/' . $product['id'] ?>">
                                                <span class="home_bg-btn main5-view">
                                                    More info
                                                    <i class="fa-solid fa-chevron-right"></i>
                                                </span>
                                            </a>
                                            <a href="<?= _WEB_ROOT . '/cart/show/' . $product['id'] ?>">
                                                <span class="home_bg-btn main5-add">
                                                    <p>Add to cart</p>
                                                    <i class="fa fa fa-shopping-bag "></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </ul>

                <div class="main5_read-more">
                    <a href="<?= _WEB_ROOT . '/product' ?>">
                        <span class="home_bg-btn main5-hover">View more</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="home_main6">
            <div class="main6_top">
                <div class="main6_content">
                    <h4 data-aos="fade-down" data-aos-duration="2000" class="mount">230</h4>
                    <h3 data-aos="fade-right" data-aos-duration="2000" class="main6_title">Happy Customers</h3>
                    <p data-aos="fade-left" data-aos-duration="2000" class="main6_sub">Integer quis tempor orci.
                        Suspendisse potenti. Interdum et
                        malesuada fames ac ante ipsum primis in faucibus. Quisque
                        gravida tempor diam id finibus. Duis non mi augue.</p>
                </div>
            </div>

            <div class="advertisement">
                <div class="row">
                    <div class="col col-lg-4 advertisement-content">Integer quis tempor orci. Suspendisse
                        potenti. Interdum
                        et malesuada fames ac ante ipsum primis in faucibus.
                    </div>
                    <div class="col col-lg-4 advertisement-phone">
                        <img src="<?= _PUBLIC_CLIENT . '/image/index/phone-call.png' ?>" alt="">
                        <span>8-800-520-800</span>
                    </div>
                    <div class="col col-lg-4 advertisement_read-more">
                        <a href="<?= _WEB_ROOT . '/product' ?>">
                            <span class="home_bg-btn advertisement-hover">Shop now</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="main6_content">
                <div class="row">
                    <div class="col col-6 main6_content-left">
                        <h3 data-aos="fade-right" data-aos-duration="2000" class="main6_title">Tea sorts presentation
                            and products degustation</h3>
                        <p data-aos="fade-left" data-aos-duration="2000" class="main6_sub">Integer quis tempor orci.
                            Suspendisse potenti. Interdum et
                            malesuada fames ac ante ipsum primis in faucibus.</p>
                    </div>
                    <div class="col col-6 main6_content-right">
                        <img src="<?= _PUBLIC_CLIENT . '/image/index/wooden-cup.jpg' ?>" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="home_main7">
            <div class="home_main7-container">
                <div class="home_main7-top">
                    <h3 class="home_main-about">Testimonials</h3>
                    <h2 class="home_main-title">What our buyers says</h2>
                </div>

                <div class="main7_content owl-carousel owl-theme">
                    <?php if (isset($data['user'])) : ?>
                        <?php foreach ($data['user'] as $user) : ?>
                            <div class="main7_content-item" data-image=" <?= _PATH_AVATAR . $user['avt'] ?>">
                                <div class="content_body-item">
                                    <h3 class="content_body-name"><?= $user['name'] ?></h3>
                                    <h4 class="content_body-job"><?= $user['group_name'] ?></h4>
                                    <p class="content_body-sub"><?= $user['description'] ?></p>
                                    <span class="quote fa fa-quote-left"></span>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <div class="home_main8">
            <div class="main8_top">
                <h3 class="home_main-about">It's interesting</h3>
                <h2 class="home_main-title">Recent blog posts</h2>
            </div>
            <div class="main8_content">
                <ul class="main8_content-list">
                    <div class="row">
                        <?php if (isset($data['blog']) && is_array($data['blog'])) : ?>
                            <?php foreach ($data['blog'] as $blog) : ?>
                                <li class="col col-lg-4 main8_content-item">
                                    <a href="" class="main8_content-link">
                                        <div class="content-img">
                                            <img src="<?= _PATH_IMG_BLOG . $blog['image'] ?>" alt="">
                                        </div>
                                        <span class="content-about"><?= htmlspecialchars($blog['title_sub']) ?></span>
                                        <h3 class="content-title"><?= htmlspecialchars($blog['title_main']) ?></h3>

                                    </a>
                                    <span class="content-sub"><?= htmlspecialchars($blog['description']) ?></span>
                                    <div class="content-calendar">
                                        <span class="content-month">February 21, 2018</span>
                                        <div class="content-info">
                                            <div class="content-cmt">
                                                <i class="fa-solid fa-comment-dots"></i>
                                                <span>4</span>
                                            </div>
                                            <div class="content-view">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>2,387</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </ul>

                <div class="main8_read-more">
                    <a href="<?= _WEB_ROOT . '/blog' ?>">
                        <span class="home_bg-btn main8-hover">Read more</span>
                    </a>
                </div>
            </div>
            
            <div class="main8_bottom">
                <ul class="main8_list">
                    <li class="main8_item">
                        <img class="item-img1" src="<?= _PUBLIC_CLIENT . '/image/index/main8/logo-gray-1.png' ?>" alt="">
                        <img class="item-img2" src="<?= _PUBLIC_CLIENT . '/image/index/main8/logo-gray-1.png' ?>" alt="">
                    </li>
                    <li class="main8_item">
                        <img class="item-img1" src="<?= _PUBLIC_CLIENT . '/image/index/main8/logo-gray-2.png' ?>" alt="">
                        <img class="item-img2" src="<?= _PUBLIC_CLIENT . '/image/index/main8/logo-gray-2.png' ?>" alt="">
                    </li>
                    <li class="main8_item">
                        <img class="item-img1" src="<?= _PUBLIC_CLIENT . '/image/index/main8/logo-gray-3.png' ?>" alt="">
                        <img class="item-img2" src="<?= _PUBLIC_CLIENT . '/image/index/main8/logo-gray-3.png' ?>" alt="">
                    </li>
                    <li class="main8_item">
                        <img class="item-img1" src="<?= _PUBLIC_CLIENT . '/image/index/main8/logo-gray-4.png' ?>" alt="">
                        <img class="item-img2" src="<?= _PUBLIC_CLIENT . '/image/index/main8/logo-gray-4.png' ?>" alt="">
                    </li>
                    <li class="main8_item">
                        <img class="item-img1" src="<?= _PUBLIC_CLIENT . '/image/index/main8/logo-gray-5.png' ?>" alt="">
                        <img class="item-img2" src="<?= _PUBLIC_CLIENT . '/image/index/main8/logo-gray-5.png' ?>" alt="">
                    </li>
                    <li class="main8_item">
                        <img class="item-img1" src="<?= _PUBLIC_CLIENT . '/image/index/main8/logo-gray-6.png' ?>" alt="">
                        <img class="item-img2" src="<?= _PUBLIC_CLIENT . '/image/index/main8/logo-gray-6.png' ?>" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>