<?php
class Category extends Controller
{
    private $cate;

    function __construct()
    {
        $this->cate = $this->model('ModelCate');
    }

    function listCate()
    {
        $keyw_s = "";
        if (isset($_POST['search']) && ($_POST['search']) != "") {
            $keyw_s = $_POST['keyw_s'];
        }
        $cates = $this->cate->getAll($keyw_s);
        return $this->view('admin', [
            'page' => 'category/list',
            'title' => 'Category',
            'cates' => $cates,
            'message' => '',
            'css' => ['main'],
            'js' => [
                'ajax',
                'search'
            ]
        ]);
    }

    function cateAdd()
    {
        return $this->view('admin', [
            'page' => 'category/add',
            'title' => 'Category: Add',
            'css' => ['main'],
        ]);
    }

    function handleAddCate()
    {
        $message = '';
        $type = '';

        if (isset($_POST['addcate']) && $_POST['addcate']  != '') {
            $namecate = $_POST['catename'];
            $date = date('Y-m-d H:i:s');
            $cates = $this->cate->getAll();
            $check = 0;

            foreach ($cates as $cate) {
                if ($namecate == $cate['name']) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }

            if ($check === 0) {
                $status = $this->cate->insertCate($namecate, $date);
                if ($status) {
                    $message = 'Add category success';
                    $type = 'success';
                    $_SESSION['message'] = $message;
                    header('Location: ' . _WEB_ROOT . '/category/listCate');
                    return;
                } else {
                    $message = 'Add category failed';
                    $type = 'danger';
                }
            } else {
                $message = 'The category already exists!';
                $type = 'danger';
            }

            unset($_POST['addcate']);
        }
        $this->view('admin', [
            'page' =>  'category/add',
            'css' => ['main'],
            'message' => $message,
            'type' => $type
        ]);
    }

    function handleUpdateCate($id)
    {
        $message = '';
        $type = '';
        $cate = $this->cate->selectOneCate($id);

        if (isset($_POST['updatecate']) && $_POST['updatecate']  != '') {
            $namecate = $_POST['catename'];
            $date = date('Y-m-d H:i:s');
            $cates = $this->cate->getAll();
            $check = 0;

            foreach ($cates as $cate) {
                if ($namecate == $cate['name']) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }
            $header = 0;
            if ($check === 0) {
                $status = $this->cate->updateCate($id, $namecate, $date);
                if ($status) {
                    $header = 1;
                    $message = 'Update category success';
                    $type = 'success';
                } else {
                    $header = 0;
                    $message = 'Update category failed';
                    $type = 'danger';
                }
            } else {
                $header = 0;
                $message = 'The category already exists!';
                $type = 'danger';
            }

            if ($header === 0) {
                return  $this->view('admin', [
                    'page' =>  'category/update',
                    'title' => 'Category: Update',
                    'css' => ['main'],
                    'cate' => $cate,
                    'message' => $message,
                    'type' => $type
                ]);
            } else {
                $_SESSION['message'] = $message;
                header('Location: ' . _WEB_ROOT . '/category/listCate');
            }
        } else {
            if (!empty($cate)) {
                $this->view('admin', [
                    'page' =>  'category/update',
                    'title' => 'Category: Update',
                    'css' => ['main'],
                    'cate' => $cate,
                    'type' => $type
                ]);
            }
        }
    }

    function handleDeleteCate($id)
    {
        $cate = $this->cate->deleteCate($id);
        $message = "";
        if (isset($_SESSION['message'])) {
            $_SESSION['message'] = "";
        }
        if ($cate) {
            echo -1;
        } else {
            echo -2;
        }
    }
}
