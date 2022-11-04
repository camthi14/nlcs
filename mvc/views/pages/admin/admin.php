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
    <div class="container">
        <div class="row g-2 product">
            <?php if (isset($data['count'])) : ?>
                <div class="col-lg-3 col-sm-6 product_content">
                    <div class="card card-product " style="background-color: #19a185;">
                        <div class="card-body">
                            <p class="amount"><?= $data['count']['order'] ?></p>
                            <h2 class="card_name">Order</h2>
                        </div>
                        <div class="card_icon"><i class="fas fa-shopping-cart"></i></div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 product_content">
                    <div class="card card-product " style="background-color: #605ca8;">
                        <div class="card-body">
                            <p class="amount"><?= $data['count']['product'] ?></p>
                            <h2 class="card_name">Product</h2>
                        </div>
                        <div class="card_icon"><i class="fas fa-shopping-bag"></i></div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 product_content">
                    <div class="card card-product " style="background-color: #de524a;">
                        <div class="card-body">
                            <p class="amount"><?= $data['count']['cat'] ?></p>
                            <h2 class="card_name">Category</h2>
                        </div>
                        <div class="card_icon"><i class="fas fa-shapes"></i></div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 product_content">
                    <div class="card card-product " style="background-color: #f1b740;">
                        <div class="card-body">
                            <p class="amount"><?= $data['count']['user'] ?></p>
                            <h2 class="card_name">User</h2>
                        </div>
                        <div class="card_icon"><i class="fas fa-users"></i></div>
                    </div>
                </div>
            <?php endif ?>
        </div>
        <div class="g-2">
            <div class="table-responsive ">
                <h1>LATEST ORDER</h1>

                <table class="shop_table table">
                    <thead>
                        <tr class="cart-title">
                            <th>STT</th>
                            <th>Customer</th>
                            <th>Detail</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($data['bill'])) : ?>
                            <?php foreach ($data['bill'] as $item) : ?>
                                <form action="<?= _WEB_ROOT . '/admin/updateStatus'  ?>" method="post">
                                    <tr>
                                        <td>
                                            <?= $item['id'] ?>
                                            <input type="text" name="id" value="<?= $item['id'] ?>" hidden>
                                        </td>

                                        <td>
                                            <div>
                                                <p><?= $item['name'] ?></p>
                                                <p><?= $item['phone'] ?></p>
                                                <p><?= $item['address'] ?></p>
                                            </div>
                                        </td>

                                        <td><a href="#" data-action="<?= _WEB_ROOT . '/admin/getDetailBill?id=' . $item['id'] ?>" id="show_detail" class="text-success" data-toggle="modal" data-target="#exampleModal">Detail Bill</a></td>

                                        <td>
                                            <p class="<?= $item['status'] == 'confirm' ? 'text-warning'
                                                            : ($item['status'] == 'transport' ? 'text-primary'
                                                                : ($item['status'] == 'failed' ? 'text-danger' : 'text-success')) ?>">
                                                <?= $item['status'] ?>
                                            </p>
                                            <input type="text" name="status" value="<?= $item['status'] ?>" hidden>
                                        </td>

                                        <td>
                                            <p><?= $item['purchased_at'] ?></p>
                                        </td>

                                        <td>
                                            <button type="submit" class="btn <?= $item['status'] == 'receive' ? 'text-success' : 'text-danger' ?>" <?= $item['status'] == 'receive' ? 'disabled' : null ?>>
                                                <?= $item['status'] == 'receive' ? 'Success' : 'Confirm' ?>
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>

            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination d-flex justify-content-end py-3">
                    <li class="page-item <?= !isset($_GET['page']) || $_GET['page'] == 1 ? 'disabled' : null ?>">
                        <a class="page-link " href="<?= _WEB_ROOT . '/' . $query_string . '&action=prev' ?>" aria-label="Previous" id="pagination">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                    <?php if (isset($data['total_page'])) : ?>
                        <?php for ($i = 1; $i <= $data['total_page']; $i++) : ?>
                            <li class="page-item <?= (!isset($_GET['page']) && $i == 1) || (isset($_GET['page']) && $_GET['page'] == $i) ? 'active' : null ?>"><a class="page-link" href="<?= _WEB_ROOT . '/admin?page=' . $i ?>"><?= $i ?></a></li>
                        <?php endfor ?>
                    <?php endif ?>

                    <li class="page-item <?= isset($_GET['page']) && $_GET['page'] == $data['total_page'] ? 'disabled' : null ?>">
                        <a class="page-link" href="<?= _WEB_ROOT . '/' . $query_string . '&action=next' ?>" aria-label="Next" id="pagination">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Info Bill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 class="text-uppercase text-bold mb-2">Information order</h1>

                <ul class="detail-bill--content__list mb-4" id="show_bill"></ul>

                <h1 class="text-uppercase text-bold mb-2">Order products</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Money</th>
                        </tr>
                    </thead>
                    <tbody id="show_info_product"></tbody>
                </table>

                <h1 class="text-uppercase text-bold mb-3">Order value</h1>

                <ul class="list-item clearfix">
                    <li class="border-bottom p-1">
                        <span>Total amount: &nbsp;</span>
                        <span id="quantity"></span>
                    </li>
                    <li class="text-danger text-bold p-1">
                        <span>Total order: &nbsp;</span>
                        <span id="total_bill"></span>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bg-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>