<main>
    <div class="products_detail">
        <div class="info_content">

            <div class="row">
                <?php if (isset($data['product'])) : ?>
                    <div class="info_content-item">
                        <div class="info_content-img col col-5">
                            <img src=" <?= _PATH_IMG_Product . $data['product']['img'] ?>" alt="">
                        </div>
                        <div class="content_body-item col col-7">
                            <div class="body-info">
                                <div class="body-header">
                                    <div class="item-star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>No view</p>
                                </div>

                                <h3 class="body-title"><?= $data['product']['name'] ?></h3>
                                <span class="body-price"><?= '$' . $data['product']['price'] ?></span>
                                <div class="body-sub">
                                    We feature carefully crafted tea blends that represent flavors from all
                                    across the
                                    globe. From our unique take on
                                    London’s traditional Earl Grey to the tropical flavors of our Hawaiian
                                    blend, our
                                    goal is to take the best ingredients
                                    from around the world and make a tea that tastes like none other. With
                                    teas based on
                                    locations like London, Maui, Nepal,
                                    Kyoto, and Tuscany, our shop guarantees our Location Collection will
                                    take your taste
                                    buds on a journey around the Globe.
                                </div>

                                <div class="body-quantity">
                                    <a href="<?= _WEB_ROOT . '/cart/show/' . $data['product']['id'] ?>">
                                        <span class="home_bg-btn btn_add-cart">
                                            <p>Add to cart</p>
                                        </span>
                                    </a>

                                    <div class="body-amount">
                                        <span>1</span>
                                        <div class="body-sign">
                                            <span class="btn-sign btn-plus"><i class="fa-solid fa-plus"></i></span>
                                            <span class="btn-sign btn-minus"><i class="fa-solid fa-minus"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
    
    <div class="advertisement-pro">
        <h3>Laster products</h3>
        <div class="laster_product owl-carousel owl-theme">
            <?php if (isset($data['products'])) : ?>
                <?php foreach ($data['products'] as $product) : ?>
                    <div class="laster_product-item">
                        <div class="products_right-item">
                            <a href="" class="products_right-link">
                                <div class="products_right-hover">
                                    <div class="products_right-img">
                                        <img src=" <?= _PATH_IMG_Product . $product['img'] ?>" alt="">
                                    </div>
                                    <div class="item-title"><?= $product['name'] ?></div>
                                </div>
                            </a>
                            <div class="products_btn-more">
                                <div class="products_btn-hover">
                                    <a href="<?= _WEB_ROOT . "/product/detail/" . $product['id'] ?>">
                                        <span class="home_bg-btn products-view">
                                            More info
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </span>
                                    </a>
                                    <a href="<?= _WEB_ROOT . '/cart/show/' . $product['id'] ?>">
                                        <span class="home_bg-btn products-add">
                                            <p>Add to cart</p>
                                            <i class="fa fa fa-shopping-bag "></i>
                                        </span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</main>