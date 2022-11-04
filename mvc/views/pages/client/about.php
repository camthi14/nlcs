<main>
    <div class="about">
        <div class=" bg_top">
            <div class="bg_top-content ">
                <h1 class="bg_top-title">About Company</h1>
                <div class="bg_top-info">
                    <a href="<?= _WEB_ROOT . '/' ?>" class="bg_top-link">Home</a>
                    <i class="fa-solid fa-chevron-down bg_top-chevron"></i>
                    <p class="bg_top-sub">Company</p>
                </div>
            </div>
        </div>
        <div id="about_us" class="about-us">
            <div class="about_main">
                <div class="row">
                    <div class="col-12 col-lg-6 about_main-content">
                        <h3 class="about_main-title">Who We Are</h3>
                        <h4 class="about_main-name">Fashion democracy</h4>
                        <p class="about_main-sub">
                            We believe in a world where you have total freedom to be you, without judgement.
                            To
                            experiment. To express yourself. To
                            be brave and grab life as the extraordinary adventure it is. So we make sure
                            everyone
                            has an equal chance to discover
                            all the amazing things they’re capable of – no matter who they are, where
                            they’re
                            from
                            or what looks they like to boss.
                            We exist to give you the confidence to be whoever you want to be.
                        </p>
                    </div>
                    <div class="col-12 col-lg-6 about_main-img">
                        <img src=" <?= _PUBLIC_CLIENT . '/image/header/images3.jpg' ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="about_main">
                <div class="row">
                    <div class="col-12 col-lg-6 about_main-img">
                        <img src=" <?= _PUBLIC_CLIENT . '/image/header/images4.jpg' ?>" alt="">
                    </div>
                    <div class="col-12 col-lg-6 about_main-content">
                        <h3 class="about_main-title">Choice For All</h3>
                        <h4 class="about_main-name">Fashion democracy</h4>
                        <p class="about_main-sub">
                            Our audience (AKA you) is wonderfully unique. And we do everything we can to
                            help
                            you
                            find your fit, offering our Ciloe
                            Brands in more than 30 sizes – and we're committed to providing all sizes at the
                            same
                            price – so you can be confident
                            we’ve got the perfect thing for you. We’re also proud to partner with GLAAD, one
                            of
                            the
                            biggest voices in LGBTQ
                            activism, on a gender-neutral collection to unite in accelerating acceptance.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="about_tes">
        <div class="bg_top"></div>
        <div id="about_tes" class="about_tes-content">
            <div class="row">
                <?php if (isset($data['user'])) : ?>
                    <?php foreach ($data['user'] as $user) : ?>
                        <div class="col-12 col-lg-6 about_tes-item">
                            <div class="about_tes-img">
                                <img src=" <?= _PATH_AVATAR . $user['avt'] ?>" alt="">
                            </div>
                            <h3 class="about_tes-name"><?= $user['name'] ?></h3>
                            <h4 class="about_tes-job"><?= $user['group_name'] ?></h4>
                            <p class="about_tes-sub"><?= $user['description'] ?></p>
                            <span class="quote fa fa-quote-left"></span>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </div>

    <div class="about_team">
        <div class=" bg_top"></div>
        <ul id="about_team" class="about_team-list">
            <div class="row">
                <?php if (isset($data['user'])) : ?>
                    <?php foreach ($data['user'] as $user) : ?>
                        <li class="col-12 col-lg-3 about_team-item">
                            <div class="about_team-info">
                                <div class="about_team-img">
                                    <img src=" <?= _PATH_AVATAR . $user['avt'] ?>" alt="">
                                </div>
                                <h3 class="about_team-name"><?= $user['name'] ?></h3>
                            </div>
                            <p class="about_team-job"><?= $user['group_name'] ?></p>
                            <ul class="about_team-icons">
                                <li class="about_team-icon">
                                    <a href="https://www.twitter.com/" class="about_team-link">
                                        <i class="fa-brands fa-twitter" style="padding: 0 4px;"></i>
                                    </a>
                                </li>
                                <li class="about_team-icon">
                                    <a href="https://www.facebook.com/" class="about_team-link">
                                        <i class="fa-brands fa-facebook-f" style="padding: 0 7px;"></i>
                                    </a>
                                </li>
                                <li class="about_team-icon">
                                    <a href="https://www.instagram.com/" class="about_team-link">
                                        <i class="fa-brands fa-instagram" style="padding: 0 5px;"></i>
                                    </a>
                                </li>
                                <li class="about_team-icon">
                                    <a href="https://www.youtube.com/" class="about_team-link">
                                        <i class="fa-brands fa-youtube" style="padding: 0 3px;"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </ul>
    </div>
    <div class="about_faq">
        <div class=" bg_top"></div>
        <div id="about_faq" class="about_faq-main">
            <div class="about_faq-content">
                <h3 class="about_faq-title">Is it possible to pay for an order with Visa and MasterCard
                    payment
                    cards?</h3>
                <ul class="about_faq-sub">
                    <li>Forms of payment: Offline payment</li>
                    <li>Step 1: You go to the payment location</li>
                    <li> Step 2: Provide 16 credit card numbers by swiping the card into
                        the reader and providing the amount of Quarter customer wants to pay
                        Note: To ensure that you provide the correct 16 credit card numbers, the store staff
                        will swipe your card into the card reader. There won't be any payment orders
                        done via card at this step. All payment transactions will be made in cash</li>
                    <li> Step 3: Pay cash at the store's checkout counter</li>
                    <li> Step 4: You receive a receipt and check all payment information.
                        Request correction believe if there is a mistake</li>
                </ul>
            </div>
            <div class="about_faq-content">
                <h3 class="about_faq-title">Is it possible to pay by credit card?</h3>
                <ul class="about_faq-sub">
                    <li>Forms of payment: Offline payment</li>
                    <li>Step 1: You go to the payment location</li>
                    <li> Step 2: Provide 16 credit card numbers by swiping the card into
                        the reader and providing the amount of Quarter customer wants to pay
                        Note: To ensure that you provide the correct 16 credit card numbers, the store staff
                        will swipe your card into the card reader. There won't be any payment orders
                        done via card at this step. All payment transactions will be made in cash</li>
                    <li> Step 3: Pay cash at the store's checkout counter</li>
                    <li> Step 4: You receive a receipt and check all payment information.
                        Request correction believe if there is a mistake</li>
                </ul>

            </div>
            <div class="about_faq-content">
                <h3 class="about_faq-title">What payment methods exist in your company?</h3>
                <ul class="about_faq-sub">
                    <li>1. Cash</li>
                    <li>2. Checks</li>
                    <li>3. Debit cards</li>
                    <li>4. Credit cards</li>
                </ul>
            </div>
            <div class="about_faq-content">
                <h3 class="about_faq-title">Can I return the product after purchase?</h3>
                <ul class="about_faq-sub ">
                    <p style="font-weight: bold; font-size: 2rem; padding-bottom: 12px;">Verify product
                        return request:</p>
                    <li>When a customer brings an item to the store and requests an exchange or refund, the
                        salesperson will need to verify the
                        claim. They will have to confirm that this product was purchased from your store.
                        The
                        most common proof is a receipt.</li>

                    <li>For some products, there are additional conditions. For example, with video games,
                        the
                        original packaging must be
                        intact. Clothing items may require their tags and labels and should be free from
                        traces
                        of wear or stains.</li>

                    <li>Chaitan's return policy explains the product return conditions and how customers can
                        request a return easily</li>
                    <li>Chaitan's return policy explains the product return conditions and how customers can
                        request a return easily.</li>

                    <li>In some cases, a customer can request a return without a receipt. They may still
                        show
                        some proof like a bank statement
                        or confirmation email. Some businesses may refuse a return request in this case.
                    </li>
                    <li>However, your country's consumer rights
                        laws may require you to accept returns of defective products without a receipt.</li>

                    <li>If the customer is eligible for a return or exchange, the cashier will create a
                        return
                        request in the system.</li>
                </ul>
            </div>
            <div class="about_faq-content">
                <h3 class="about_faq-title">How do I use a promotional code?</h3>
                <ul class="about_faq-sub">
                    <li> If the screenshots below look familiar, follow the steps to apply a promo code to a
                        purchase.</li>
                    <li>Log into the site with your username and password.</li>
                    <li>Go to the Online Store/Checkout.</li>
                    <li>Select items to purchase, and add them to your shopping cart.</li>
                    <li>Enter the promo code in the "PROMOTION CODE" field.</li>
                    <li>Click Apply.</li>
                </ul>
            </div>
        </div>
    </div>
</main>