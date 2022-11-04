<main>
    <div class="products_cart">
        <div class="bg_top">
            <div class="bg_top-content">
                <h1 class="bg_top-title">Cart</h1>
                <div class="bg_top-info">
                    <a href="index.html" class="bg_top-link">Home</a>
                    <i class="fa-solid fa-chevron-down bg_top-chevron"></i>
                    <p class="bg_top-sub">Your shopping cart</p>
                </div>
            </div>
        </div>
        <div class="pages_cart">
            <div class="container">
                <div class="content_about">
                    <form action="" method="post">
                        <div class="table-responsive">
                            <table class="shop_table table">
                                <thead>
                                    <tr class="cart-title text-center">
                                        <th colspan="2" class="product-thumbnail">
                                            Product name
                                        </th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($data['list_cart']) && count($data['list_cart']) > 0) : ?>
                                        <?php foreach ($data['list_cart'] as $cart) : ?>
                                            <tr class="cart_item text-center">
                                                <td colspan="2" data-label="Product Name" class="product-thumbnail">
                                                    <a href="#" class="d-flex align-items-center">
                                                        <img src="<?= _PATH_IMG_Product . $cart['img'] ?>" alt="" />
                                                        <p class="product-name-thumb"><?= $cart['name'] ?></p>
                                                    </a>
                                                </td>

                                                <td data-label="Quantity" class="product-price " data-title="Price">
                                                    <span class="amount">$<?= $cart['price'] ?></span>
                                                </td>

                                                <td data-label="Quantity" class="product-quantity" data-title="Quantity">
                                                    <div class="body-amount">
                                                        <input style="width: 100px; outline:none;border:none;" id="num_order" data-id="<?= $cart['id'] ?>" type="number" value="<?= $cart['quantity'] ?>" min="1">
                                                    </div>
                                                </td>

                                                <td data-label="Sub Total" class="product-subtotal" data-title="Total">
                                                    <span class="amount amount_sub_total_<?= $cart['id'] ?>">$<?= $cart['sub_total'] ?></span>
                                                </td>

                                                <td class="product-remove">
                                                    <span class="de_product"></span>
                                                    <a href="<?= _WEB_ROOT . "/cart/delete/" . $cart['id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr class="cart_item text-center">
                                            <td data-label="Product Name" class="product-thumbnail text-center" colspan="6">
                                                There are no products in the cart.
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart_totals">
                            <div class="cart-update">
                                <a class="button btn-cart" href="<?= _WEB_ROOT . "/cart/deleteAll" ?>">Delete All</a>
                                <div class="continue-shopping1">
                                    <a href="<?= _WEB_ROOT . '/product' ?>">Continue Shopping</a>
                                </div>
                            </div>
                            <div class="cart-check">
                                <h2 class="cart-title">Cart Totals</h2>
                                <div class="total-checkout">
                                    <div class="row">
                                        <div class="col-lg-6 cart-label">
                                            <span>Total</span>
                                        </div>
                                        <?php if (isset($data['info_cart'])) : ?>
                                            <div class="col-lg-6 cart-amount"><span class="cart_total">$<?= $data['info_cart']['total'] ?></span></div>
                                        <?php endif; ?>
                                    </div>

                                </div>


                                <div class="wc-proceed-to-checkout">
                                    <a href="<?= _WEB_ROOT . '/checkout/handleRedirect' ?>">Proceed to checkout</a>
                                </div>
                                <p class="notice-currency">
                                    " Chaitan - Tea Shopify Theme processes all orders in
                                    USD. While the content of your cart is currently
                                    displayed in USD , the checkout will use USD at the
                                    most current exchange rate. "
                                </p>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>