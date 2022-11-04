<?php
$query = $_SERVER['REDIRECT_QUERY_STRING'];
$query_arr = explode('/', $query);
$query_two = $query_arr[1]; // Product | Product?page=1, ?page=2, ...

$arr = explode('&', $query_two);

$query_string = $arr[0];

if (isset($arr[1]))
    $query_string = $arr[0] . '?' . $arr[1];
?>

<div class="container">
    <div class="flex gap-3 mb-3 justify-between">
        <a href="<?php echo _WEB_ROOT . '/product/productAdd' ?>" class="btn bg-[#252c30] hover:bg-slate-700 text-white">Add Product</a>
        <form action="" method="post" class="items-center flex justify-end flex-1 h-10 form_s mb-0">
            <div class="flex justify-end gap-2 w-4/5">
                <select name="category" id="" class="custom-select select_gr py-2 px-3 w-1/5 h-[44px] rounded-lg" required>
                    <option>Select</option>
                    <?php foreach ($data['cates'] as $cate) { ?>
                        <option value="<?php echo $cate['id'] ?>"><?php echo $cate['name'] ?></option>
                    <?php } ?>
                </select>
                <div class="flex">
                    <input type="text" class="keyw_s text-sm py-2 px-3 text-lg border-0 outline-0 rounded-l-lg" id="" placeholder="Search name.." name="keyw_s">
                    <input type="hidden" name="search" value="search">
                    <button class="w-20  flex items-center text-sm py-2 px-3 text-lg justify-center bg-[#252c30] hover:bg-slate-700 rounded-r-lg">
                        <i class="fas fa-search text-white"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <?php if (isset($_SESSION['message']) && $_SESSION['message'] != '') { ?>

        <div id="toast-success" class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal"><?php echo $_SESSION['message'] ?></div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

    <?php unset($_SESSION['message']);
    } ?>

    <div class="text-center d-flex justify-content-center">
        <div class="loader "></div>
    </div>
    <table class="table table-bordered border-primary table_s">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Created_at</th>
                <th width="10%" scope="col">Edit</th>
                <th width="10%" scope=" col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($data['products'])) {
                foreach ($data['products'] as $product) {
            ?>
                    <tr>
                        <td><?php echo $product['id'] ?></td>
                        <td>
                            <p class="cut-text"><?php echo $product['name']; ?></p>
                        </td>
                        <td>
                            <p class="flex justify-center items-center h-full"><img class="w-20 h-full" src="<?php echo _PATH_IMG_Product . $product['img'] ?>" alt=""></p>
                        </td>
                        <td>
                            <p class="cut-text"><?php echo getNameCate($product['cate_id'])['name'] ?></p>
                        </td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $product['created_at'] ?></td>
                        <td><a href="<?php echo _WEB_ROOT . '/product/handleUpdateProduct/' . $product['id'] ?>" style="font-size: 24px;" class="text-pink-900 d-block text-center hover:text-pink-900"><i class="transition-all duration-300 hover:scale-110 hover:cursor-pointer far fa-edit"></i></a></td>
                        <td><a href="<?php echo _WEB_ROOT . '/product/handleDeleteProduct/' . $product['id'] ?>" style="font-size: 24px; " class="delete_handle text-danger d-block text-center"><i class="transition-all duration-300 hover:scale-110 hover:cursor-pointer fas fa-trash-alt"></i></a></td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan='7' class=" text-center">No data</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination d-flex justify-content-end pb-3">
            <li class="page-item <?= !isset($_GET['page']) || $_GET['page'] == 1 ? 'disabled' : null ?>">
                <a class="page-link " href="<?= _WEB_ROOT . '/product/' . $query_string . '&action=prev' ?>" aria-label="Previous" id="pagination">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>

            <?php if (isset($data['total_page'])) : ?>
                <?php for ($i = 1; $i <= $data['total_page']; $i++) : ?>
                    <li class="page-item <?= (!isset($_GET['page']) && $i == 1) || (isset($_GET['page']) && $_GET['page'] == $i) ? 'active' : null ?>"><a class="page-link" href="<?= _WEB_ROOT . '/product/listProduct?page=' . $i ?>"><?= $i ?></a></li>
                <?php endfor ?>
            <?php endif ?>

            <li class="page-item <?= isset($_GET['page']) && $_GET['page'] == $data['total_page'] ? 'disabled' : null ?>">
                <a class="page-link" href="<?= _WEB_ROOT . '/product/' . $query_string . '&action=next' ?>" aria-label="Next" id="pagination">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>

</div>