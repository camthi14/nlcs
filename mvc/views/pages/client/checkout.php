<main>
    <div class="container">
        <div class="content_about">
            <?php if (isset($_SESSION['error_address'])) : ?>
                <div class="alert alert-danger h1" role="alert">
                    <?= $_SESSION['error_address'] ?>
                </div>
                <?php unset($_SESSION['error_address']) ?>
            <?php endif ?>

            <form action="<?= _WEB_ROOT . "/checkout/submit" ?>" method="post">
                <div class="wp-checkout">
                    <div class="wp-checkout--left">
                        <div class="wp-checkout--left__address">
                            <h1>Receive address</h1>
                            <?php if (isset($data['user_info'])) : ?>
                                <div class="wp-checkout--left__address-content">
                                    <p class="name">
                                        <span>Your Name:&nbsp;</span><span><?= htmlspecialchars($data['user_info']['name']) ?></span>
                                    </p>
                                    <p class="phone">
                                        <span>Your Phone:&nbsp;</span><span><?= htmlspecialchars($data['user_info']['phone']) ?></span>
                                    </p>
                                    <p class="address">
                                        <span>Your Address:&nbsp;</span><span><?= htmlspecialchars($data['user_info']['address']) ?></span>
                                    </p>
                                    <a href="<?= _WEB_ROOT . "/address/add" ?>" class="link">Change Address</a>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="wp-checkout--right">
                        <div class="wp-checkout--right__checkout">

                            <div class="wp-checkout--right__checkout-header">
                                <h2>Thông tin đơn hàng</h2>
                            </div>
                            <ul class="wp-checkout--right__checkout-list">
                                <div class="font-weight-bold d-flex justify-content-between h1 py-4">
                                    <h1>Product</h1>
                                    <p>Total</p>
                                </div>
                                <?php if (isset($data['list_buy'])) : ?>
                                    <?php foreach ($data['list_buy'] as $cart) : ?>
                                        <li class="wp-checkout--right__checkout-list_item">
                                            <h1><?= htmlspecialchars($cart['name']) ?> <strong><?= " x" . htmlspecialchars($cart['quantity']) ?></strong></h1>
                                            <p><?= '$' . htmlspecialchars($cart['sub_total']) ?></p>
                                        </li>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </ul>
                            <div class="wp-checkout--right__checkout-footer">
                                <?php if (isset($data['list_info'])) : ?>
                                    <span>Total</span>
                                    <span><?= '$' . htmlspecialchars($data['list_info']['total']) ?></span>
                                <?php endif ?>
                            </div>

                            <div class="wp-checkout--right__checkout-button">
                                <button href="#" class="btn wp-checkout--right__checkout-button_link">Proceed to checkout</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</main>