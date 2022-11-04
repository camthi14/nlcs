<?php
class Product extends Controller
{
    private ModelProduct $product;
    private ModelCate $cate;

    function __construct()
    {
        $this->product = $this->model('ModelProduct');
        $this->cate = $this->model('ModelCate');
    }

    function index()
    {
        $filter_price = -1;
        $keywords = '';
        $type = '';
        $id = 0;
        $per_page = 4;
        $page = 0;

        if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
            if ($_POST['price_filter']) {
                $filter_price = (int) $_POST['price_filter'];
            }
        } else {
            if (isset($_GET['search'])) {
                $keywords = $_GET['search'];

                if (isset($_GET['type_search']))
                    $type = $_GET['type_search'];
            } else {
                $keywords = '';
            }

            if (isset($_GET['cat_id']))
                $id = $_GET['cat_id'];
        }
        
        //pagination
        if (isset($_GET['action']) && !empty($_GET['action'])) {
            if (strtolower($_GET['action']) == 'prev' && isset($_GET['page'])) {
                $page = $_GET['page'] - 1;
                $this->redirect('/product?page=' . $page);
            }

            if (strtolower($_GET['action']) == 'next' && isset($_GET['page'])) {
                $page = $_GET['page'] + 1;
                $this->redirect('/product?page=' . $page);
            }
        }

        if (isset($_GET['page'])) {
            $page = (int) $_GET['page'] - 1;
        }

        $products = $this->product->getAll([
            'type' => $type,
            'filter_price' => $filter_price,
            'page' => $page,
            'per_page' => $per_page,
            'key_w' => $keywords,
            'limit' => 15
        ]);
        $findCate = $this->cate->findCateById($id);
        $cats = $this->cate->getAll();

        return $this->view('client', [
            'page' => 'product',
            'title' => 'Product',
            'css' => ['main', 'product'],
            'products' => count($findCate) > 0 ? $findCate : $products,
            'total_page' => ceil((int) $this->product->count() / $per_page),
            'cats' => $cats,
            'products' => $products,
        ]);
    }

    function listProduct()
    {
        $keyw_s = "";
        $cate_id = 0;
        $per_page = 3;
        $page = 0;
        
        if (isset($_GET['action']) && !empty($_GET['action'])) {
            if (strtolower($_GET['action']) == 'prev' && isset($_GET['page'])) {
                $page = $_GET['page'] - 1;
                $this->redirect('/admin/groupUser?page=' . $page);
            }

            if (strtolower($_GET['action']) == 'next' && isset($_GET['page'])) {
                $page = $_GET['page'] + 1;
                $this->redirect('/admin/groupUser?page=' . $page);
            }
        }

        if (isset($_GET['page'])) {
            $page = (int) $_GET['page'] - 1;
        }

        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $keyw_s = $_POST['keyw_s'];
            $page = 0;
        }

        if (isset($_POST['category']) && $_POST['category'] !== 'Select') {
            $cate_id = $_POST['category'];
            $page = 0;
        }

        $products = $this->product->getAll([
            'page' => $page,
            'per_page' => $per_page,
            'key_w' => $keyw_s,
            'cate_id' => $cate_id,
            'limit' => 15
        ]);
        $cates = $this->cate->getAll();

        return $this->view('admin', [
            'page' => 'product/list',
            'title' => 'Product',
            'products' => $products,
            'cates' => $cates,
            'total_page' => ceil((int) $this->product->count() / $per_page),
            'css' => ['main', 'imgUploadAdd'],
            'js' => [
                'ajax',
                'search'
            ]
        ]);
    }

    function productAdd()
    {
        $cates = $this->cate->getAll();

        return $this->view('admin', [
            'page' => 'product/add',
            'title' => 'Product: Add',
            'cates' => $cates,
            'css' => ['main', 'imgUploadAdd'],
            'js' => ['uploadImg']
        ]);
    }

    function handleAddProduct()
    {
        $message = '';
        $type = '';
        $products = $this->product->getAll(-1, '');
        $cates = $this->cate->getAll();


        if (isset($_POST['addproduct']) && $_POST['addproduct'] != "") {
            $name = '';
            $image = '';
            $images = '';
            $cate_id = '';
            $price = '';
            $description = '';
            $date = date('Y-m-d H:i:s');
            $array_imgs = array();

            if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['description']) || empty($_FILES['image']) || empty($_FILES['images'])) {
                $message = 'Please enter full field';
                $type = 'danger';
            } else {
                $name = $_POST['name'];
                $cate_id = $_POST['cate_id'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $image = $this->processImg($_FILES['image']['name'], $_FILES['image']['tmp_name'], 'product');
                $images = $_FILES['images']['name'];

                foreach ($products as $product) {
                    if ($name == $product['name']) {
                        $check = 1;
                        break;
                    } else {
                        $check = 0;
                    }
                }

                if ($check === 0) {
                    for ($i = 0; $i < count($images); $i++) {
                        $img = $this->processImg($images[$i], $_FILES['images']['tmp_name'][$i], 'product');
                        array_push($array_imgs, $img);
                    }

                    $status = $this->product->insertProduct($name, $image, $cate_id, $price, $description);

                    if (count($array_imgs) > 0)
                        foreach ($array_imgs as $name) {
                            $this->product->addImageProduct($status, $name, $date);
                        }

                    if ($status) {
                        $message = 'Add product success';
                        $type = 'success';
                        $_SESSION['message'] = $message;
                        header('Location: ' . _WEB_ROOT . '/product/listProduct');
                    } else {
                        $message = 'Add product failed';
                        $type = 'danger';
                    }
                } else {
                    $message = 'The category already exists!';
                    $type = 'danger';
                }
            }

            unset($_POST['addproduct']);
        }

        $this->view('admin', [
            'page' =>  'product/add',
            'title' => 'Product: Add',
            'message' => $message,
            'cates' => $cates,
            'type' => $type,
            'css' => ['main', 'imgUploadAdd'],
            'js' => ['uploadImg']
        ]);
    }

    function handleUpdateProduct($id)
    {
        $product = $this->product->selectOneProduct($id);
        $productImg = $this->product->selectProductImg($id);
        $cates = $this->cate->getAll();
        $message = '';
        $type = '';

        if (isset($_POST['updateproduct']) && $_POST['updateproduct'] != "") {
            $name = '';
            $price = '';
            $description = '';

            $image = isset($_FILES['image']) ? $this->processImg($_FILES['image']['name'], $_FILES['image']['tmp_name'], 'product') : '';
            $images = $_FILES['images']['name'];
            $cate_id = $_POST['cate_id'];
            $date = date('Y-m-d H:i:s');
            $array_imgs = array();

            if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['description'])) {
                $message = 'Please enter full field';
                $type = 'danger';
            } else {
                $name = $_POST['name'];
                $cate_id = $_POST['cate_id'];
                $price = $_POST['price'];
                $description = $_POST['description'];

                if (!empty($images[0])) {
                    for ($i = 0; $i < count($images); $i++) {
                        $img = $this->processImg($images[$i], $_FILES['images']['tmp_name'][$i], 'product');
                        array_push($array_imgs, $img);
                    }
                }

                $status = $this->product->updateProduct($id, $name, $image, $cate_id, $price, $description);

                if (count($array_imgs) > 0) {
                    $this->product->deleteProductImg($id);
                    foreach ($array_imgs as $name)
                        $this->product->addImageProduct($id, $name, $date);
                }

                if ($status) {
                    $message = 'Update product success';
                    $type = 'success';
                    $_SESSION['message'] = $message;
                    header('Location: ' . _WEB_ROOT . '/product/listProduct');
                } else {
                    $message = 'Update product failed';
                    $type = 'danger';
                }
            }
        }

        if (!empty($product)) {
            $this->view('admin', [
                'page' =>  'product/update',
                'title' => 'Product: Update',
                'product' => $product,
                'productImg' => $productImg,
                'type' => $type,
                'message' => $message,
                'cates' => $cates,
                'css' => ['main', 'imgUploadAdd'],
                'js' => ['uploadImg']
            ]);
        }
    }

    function handleDeleteProduct($id)
    {
        $this->product->deleteProductImg($id);
        $product = $this->product->deleteProduct($id);

        if ($product) {
            echo -1;
        } else {
            echo -2;
        }
    }

    function detail($id)
    {

        $product = $this->product->selectOneProduct($id);
        $products = $this->product->getAll(['limit' => 10]);

        $this->view('client', [
            'page' => 'detail_product',
            'title' => 'Product - Detail',
            'product' => $product,
            'products' => $products,
            'css' => ['main', 'product'],
            'js' => ['slider']
        ]);
    }
}
