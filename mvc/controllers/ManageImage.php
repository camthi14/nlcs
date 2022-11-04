<?php

class ManageImage extends Controller
{
    private $manageImg;

    function __construct()
    {
        $this->manageImg = $this->model('ModelImg');
    }

    function index()
    {
        $limit = 3;
        $page = 0;

        if (isset($_GET['action']) && !empty($_GET['action'])) {
            if (strtolower($_GET['action']) == 'prev' && isset($_GET['page'])) {
                $page = $_GET['page'] - 1;
                $this->redirect('manageImage/listImg?page=' . $page);
            }

            if (strtolower($_GET['action']) == 'next' && isset($_GET['page'])) {
                $page = $_GET['page'] + 1;
                $this->redirect('manageImage/listImg?page=' . $page);
            }
        }

        if (isset($_GET['page'])) {
            $page = (int) $_GET['page'] - 1;
        }

        $manageImgs = $this->manageImg->getAll($page, $limit);

        return $this->view('admin', [
            'page' => 'manageImg/list',
            'title' => 'ManageImage',
            'manageImgs' => $manageImgs,
            'total_page' => ceil((int) $this->manageImg->count() / $limit),
            'message' => '',
            'css' => ['main', 'imgUploadAdd'],
            'js' => [
                'ajax',
                'search'
            ]
        ]);
    }

    function ImageAdd()
    {
       

        $manageImgs = $this->manageImg->getAll();

        return $this->view('admin', [
            'page' => 'manageImg/add',
            'title' => 'ManageImage: Add',
            'manageImgs' => $manageImgs,
            'css' => ['main', 'imgUploadAdd'],
            'js' => ['uploadImg']
        ]);
    }

    function handleAddImg()
    {
        $message = '';
        $type = '';

        if (isset($_POST['addImg']) && $_POST['addImg'] != "") {
            $image = "";
            $key_image = "";
            $status = "";
            $page = "";

            $title_one = "";
            $title_two = "";
            $description = "";

            $array_imgs = array();
            $images = array();
            

            if (!isset($_POST['page']) || !isset($_POST['key_image']) || !isset($_FILES['image'])) {
                $message = "Require value page, key image, image";
                $type = "danger";
            } else {
                if (isset($_FILES['image']))
                    $image = $this->processImg($_FILES['image']['name'], $_FILES['image']['tmp_name'], 'manageImg');

                if (isset($_POST['key_image']))
                    $key_image = $_POST['key_image'];
                
                if(strpos($key_image, 'slider') || strpos($key_image, 'slide')) {
                    if(empty($_POST['title_one']) || empty($_POST['title_two']) || empty($_POST['description'])) {
                        $message = "Require value: title one, title two, description";
                        $type = 'danger';

                        $this->view('admin', [
                            'page' =>  'manageImg/add',
                            'message' => $message,
                            'type' => $type,
                            'css' => ['main', 'imgUploadAdd'],
                            'js' => ['uploadImg']
                        ]);

                        exit;
                    }else {
                        $title_one = $_POST['title_one'];
                        $title_two = $_POST['title_two'];
                        $description = $_POST['description'];
                    }
                }

                if (isset($_POST['page']))
                    $page = $_POST['page'];

                if (isset($_FILES['images']))
                    $images = $_FILES['images']['name'];

                for ($i = 0; $i < count($images); $i++) {
                    $img = $this->processImg($images[$i], $_FILES['images']['tmp_name'][$i], 'manageImg');
                    array_push($array_imgs, $img);
                }

                if (count($array_imgs) === 0)
                    $status = $this->manageImg->insertManageImg($image, $key_image, $page, $title_one, $title_two, $description);
                else
                    foreach ($array_imgs as $img)
                        $status = $this->manageImg->insertManageImg($img, $key_image, $page, $title_one, $title_two, $description);

                if (!empty($status)) {
                    $message = 'Add Image success';
                    $type = 'success';
                    $_SESSION['message'] = $message;
                    header('Location: ' . _WEB_ROOT . '/manageImage/listImag');
                } else {
                    $message = 'Add Image failed';
                    $type = 'danger';
                }
            }
        }

        unset($_POST['addImg']);

        $this->view('admin', [
            'page' =>  'manageImg/add',
            'message' => $message,
            'type' => $type,
            'css' => ['main', 'imgUploadAdd'],
            'js' => ['uploadImg']
        ]);
    }

    function handleUpdateImg($id)
    {
        $img = $this->manageImg->selectImg($id);

        if (isset($_POST['update_img']) && $_POST['update_img'] != "") {
            $image = $img['image'];
            $page = $_POST['page'];
            $key_image = $_POST['key_image'];

            $title_one = $_POST['title_one'];
            $title_two = $_POST['title_two'];
            $description = $_POST['description'];

            if (!empty($_FILES['image']['name']))
                $image = $this->processImg($_FILES['image']['name'], $_FILES['image']['tmp_name'], 'manageImg');

            $status = $this->manageImg->updateImg($id, $page, $image, $key_image, $title_one, $title_two, $description);

            if ($status) {
                $message = 'Update image success';
                $type = 'success';
                $_SESSION['message'] = $message;
                header('Location: ' . _WEB_ROOT . '/manageImage/listImg');
            } else {
                $message = 'Update image failed';
                $type = 'danger';
            }
        } else {
            if (!empty($img)) {
                $this->view('admin', [
                    'page' =>  'manageImg/update',
                    'title' => 'ManageImage: Update',
                    'img' => $img,
                    'css' => ['main', 'imgUploadAdd'],
                    'js' => ['uploadImg']
                ]);
            }
        }
    }

    function handleDeleteImg($id)
    {
        $img = $this->manageImg->deleteImg($id);

        if ($img) {
            echo -1;
        } else {
            echo -2;
        }
    }
}
