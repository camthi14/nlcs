<?php
$query = $_SERVER['REDIRECT_QUERY_STRING'];
$query_arr = explode('/', $query);

if (isset($query_arr[0]))
    $arr = explode('=', $query_arr[0]);

if (isset($arr[1]))
    $query_string = $arr[1];

$new_query_string = explode('&', $query_string);

$page = 1;

if (isset($arr[2]))
    $page = $arr[2];

if (isset($new_query_string[0])) {
    $query_string = $new_query_string[0] . '?page=' . $page;
}

?>

<main>
    <div class="products">
        <div class=" bg_top">
            <div class="bg_top-content ">
                <h1 class="bg_top-title">Product</h1>
                <div class="bg_top-info">
                    <a href="<?= _WEB_ROOT . '/' ?>" class="bg_top-link">Home</a>
                    <i class="fa-solid fa-chevron-down bg_top-chevron"></i>
                    <p class="bg_top-sub">Product</p>
                </div>
            </div>
        </div>
        <div class="products_main">
            <div class="row">
                <div class="col-lg-4 products_main-left">
                    <div class="products_left-content">
                        <div class="products_left-name">
                            <img src="http://chaitan.like-themes.com/wp-content/uploads/2018/06/theme-icon.png" alt="">
                            <h3>Search</h3>
                            <div class="line"></div>
                        </div>


                        <form action="<?= _WEB_ROOT . '/product' ?>" method="get" class="">
                            <!-- products_left-search -->

                            <div class="products_left-search">
                                <input type="text" name="search" class="products_left-input" required>

                                <button type="submit"><i class="fa-solid fa-magnifying-glass "></i></button>
                            </div>


                            <div class="products_left-input">
                                <div>
                                    <input type="radio" name="type_search" id="find_product" value="find_product" checked>
                                    <label for="find_product">Find product</label>
                                </div>

                                <div>
                                    <input type="radio" name="type_search" id="find_category" value="find_category">
                                    <label for="find_category">Find category</label>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="products_left-content">
                        <div class="products_left-name">
                            <img src="http://chaitan.like-themes.com/wp-content/uploads/2018/06/theme-icon.png" alt="">
                            <h3>Categories</h3>
                            <div class="line"></div>
                        </div>
                        <ul class="products_categories-list">
                            <?php if (isset($data['cats'])) : ?>
                                <?php foreach ($data['cats'] as $cate) : ?>
                                    <li class="products_categories-item">
                                        <a href="<?= _WEB_ROOT . '/product?cat_id=' . $cate['id'] ?>" class="products_categories-link"><?= $cate['name'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif ?>
                        </ul>
                    </div>
                    <div class="products_left-content">
                        <div class="products_left-name">
                            <img src="http://chaitan.like-themes.com/wp-content/uploads/2018/06/theme-icon.png" alt="">
                            <h3>Filter</h3>
                            <div class="line"></div>
                        </div>
                        <div class="products_left-filter">
                            <small>
                                Current Range:
                                <div><span id="third"></span>&nbsp;$</div>
                            </small>

                            <form action="<?= _WEB_ROOT . '/product' ?>" method="post">
                                <input id="progress" class="progress" name='price_filter' type="range" value="0" step="1" min="0" max="50">
                                <button type='submit' class="btn btn-dark bg-dark mt-3">Search</button>
                            </form>

                        </div>
                    </div>
                    <div class="products_left-content">
                        <div class="products_left-name">
                            <img src="http://chaitan.like-themes.com/wp-content/uploads/2018/06/theme-icon.png" alt="">
                            <h3>Product tags</h3>
                            <div class="line"></div>
                        </div>
                        <ul class="products_tags-list">
                            <li class="products_tags-item">
                                <a href="" class="products_tags-link">
                                    #
                                    <span>black</span>
                                </a>
                            </li>
                            <li class="products_tags-item">
                                <a href="" class="products_tags-link">
                                    #
                                    <span>green</span>
                                </a>
                            </li>
                            <li class="products_tags-item">
                                <a href="" class="products_tags-link">
                                    #
                                    <span>organic</span>
                                </a>
                            </li>
                            <li class="products_tags-item">
                                <a href="" class="products_tags-link">
                                    #
                                    <span>sweet</span>
                                </a>
                            </li>
                            <li class="products_tags-item">
                                <a href="" class="products_tags-link">
                                    #
                                    <span>tea</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-12 col-lg-8 products_main-right">
                    <div class="products_right-top">
                        <h3 class="top-heading">Showing all 10 results</h3>

                        <select id="classify">
                            <option value="menu_order" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </div>
                    <div class="row">
                        <?php if (!empty($data['products']) && is_array($data['products'])) : ?>
                            <?php foreach ($data['products'] as $product) : ?>
                                <div class="col-12 col-lg-6 products_right-item">
                                    <a href="" class="products_right-link">
                                        <div class="products_right-hover">
                                            <div class="products_right-img">
                                                <img src="<?= _PATH_IMG_Product . $product['img'] ?>" alt="">
                                            </div>
                                            <div class="item-title"><?= htmlspecialchars($product['name']) ?></div>
                                        </div>
                                    </a>
                                    <div class="item-sub"><?= htmlspecialchars($product['description']) ?></div>
                                    <div class="item-price">$<?= htmlspecialchars($product['price']) ?></div>
                                    <div class="products_btn-more">
                                        <div class="products_btn-hover">
                                            <a href="<?= _WEB_ROOT . '/product/detail/' . $product['id'] ?>">
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
                            <?php endforeach ?>
                        <?php else : ?>
                            <div class="alert alert-danger ml-10 fs-1 h1" id="hidden_alert">Không có sản phẩm được tìm kiếm</div>
                        <?php endif ?>
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination d-flex justify-content-center mb-5">
                            <li class="page-item fs-3 <?= !isset($_GET['page']) || $_GET['page'] == 1 ? 'disabled' : null ?>">
                                <a class="page-link" href="<?= _WEB_ROOT . '/product/' . $query_string . '&action=prev' ?>" aria-label="Previous" id="pagination">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>

                            <?php if (isset($data['total_page'])) : ?>
                                <?php for ($i = 1; $i <= $data['total_page']; $i++) : ?>
                                    <li class="page-item fs-3 <?= (!isset($_GET['page']) && $i == 1) || (isset($_GET['page']) && $_GET['page'] == $i) ? 'active' : null ?>"><a class="page-link text-dark" href="<?= _WEB_ROOT . '/product?page=' . $i ?>"><?= $i ?></a></li>
                                <?php endfor ?>
                            <?php endif ?>

                            <li class="page-item fs-3 <?= isset($_GET['page']) && $_GET['page'] == $data['total_page'] ? 'disabled' : null ?>">
                                <a class="page-link" href="<?= _WEB_ROOT . '/product/' . $query_string . '&action=next' ?>" aria-label="Next" id="pagination">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</main>