<?php
class Admin extends Controller
{
    private ModelGroup $group;
    private ModelUsers $users;
    private ModelCart $cart;
    private ModelProduct $product;
    private ModelCate $category;

    function __construct()
    {
        $this->group = $this->model('ModelGroup');
        $this->users = $this->model('ModelUsers');
        $this->cart = $this->model('ModelCart');
        $this->product = $this->model('ModelProduct');
        $this->category = $this->model('ModelCate');
    }

    function index()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['group_id'] === 1) {
            $data = $this->countTable();

            $per_page = 3;
            $page = 0;

            if (isset($_GET['action']) && !empty($_GET['action'])) {
                if (strtolower($_GET['action']) == 'prev' && isset($_GET['page'])) {
                    $page = $_GET['page'] - 1;
                    $this->redirect('admin?page=' . $page);
                }

                if (strtolower($_GET['action']) == 'next' && isset($_GET['page'])) {
                    $page = $_GET['page'] + 1;
                    $this->redirect('admin?page=' . $page);
                }
            }

            if (isset($_GET['page'])) {
                $page = (int) $_GET['page'] - 1;
            }

            return $this->view('admin', [
                'page' => 'admin',
                'title' => 'Admin',
                'css' => ['main'],
                'js' => ['admin'],
                'bill' => $this->cart->getAll($page, $per_page),
                'total_page' => ceil((int) $this->cart->count() / $per_page),
                'count' => $data,
            ]);
        } else {
            header('Location: ' . _WEB_ROOT . '');
        }
    }

    function groupUser()
    {
        $keyw_s = "";
        $per_page = 4;
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

        if (isset($_POST['search']) && ($_POST['search']) != "") {
            $keyw_s = $_POST['keyw_s'];
        }

        $groups = $this->group->getAll([
            'page' => $page,
            'per_page' => $per_page,
            'key_w' => $keyw_s
        ]);

        return $this->view('admin', [
            'page' => 'groupUser/list',
            'title' => 'Group User',
            'groups' => $groups,
            'total_page' => ceil((int) $this->group->count() / $per_page),
            'css' => ['main'],
            'js' => [
                'ajax',
                'search'
            ]
        ]);
    }

    function groupAdd()
    {
        return $this->view('admin', [
            'page' => 'groupUser/add',
            'title' => 'Group User: Add',
            'css' => ['main'],
        ]);
    }

    function handleAddGroup()
    {
        $message = '';
        $type = '';


        if (isset($_POST['addgroup']) && $_POST['addgroup'] != '') {
            if (!isset($_POST['groupname']) || empty($_POST['groupname'])) {
                $message = "Require value name user_group";
                $type = "danger";
            } else {
                $namegroup = $_POST['groupname'];
                $groups = $this->group->getAll();
                $check = 0;

                foreach ($groups as $group) {
                    if ($namegroup == $group['name']) {
                        $check = 1;
                        break;
                    } else {
                        $check = 0;
                    }
                }

                $date = date('Y-m-d H:i:s');
                if ($check === 0) {
                    $status = $this->group->insertGroup($namegroup, $date);
                    if ($status) {
                        $message = 'Add user group success';
                        $type = 'success';
                        $_SESSION['message'] = $message;
                        header('Location: ' . _WEB_ROOT . '/admin/groupUser');
                    } else {
                        $message = 'Add user group failed';
                        $type = 'danger';
                    }
                } else {
                    $message = 'The group already exists!';
                    $type = 'danger';
                }
                unset($_POST['addgroup']);
            }
        }
        $this->view('admin', [
            'page' =>  'groupUser/add',
             'title' => 'Group User: Add',
            'css' => ['main'],
            'message' => $message,
            'type' => $type
        ]);
    }

    function handleUpdateGroup($id)
    {
        $group = $this->group->selectOneGroupUser($id);
        if (isset($_POST['updategroup']) && $_POST['updategroup'] != '') {
            $namegroup = $_POST['groupname'];
            $groups = $this->group->getAll();
            $check = 0;

            foreach ($groups as $group) {
                if ($namegroup == $group['name']) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }

            $date = date('Y-m-d H:i:s');
            $header = 0;

            if ($check === 0) {
                $status = $this->group->updateGroup($id, $namegroup, $date);
                print_r($status);
                exit;
                if ($status) {
                    $header = 1;
                    $message = 'Update user group success';
                    $type = 'success';
                } else {
                    $header = 0;
                    $message = 'Update user group failed';
                    $type = 'danger';
                }
            } else {
                $header = 0;
                $message = 'The group already exists!';
                $type = 'danger';
            }

            if ($header === 0) {
                return  $this->view('admin', [
                    'page' =>  'groupUser/update',
                    'title' => 'Group User: Update',
                    'css' => ['main'],
                    'group' => $group,
                    'message' => $message
                ]);
            } else {
                $_SESSION['message'] = $message;
                header('Location: ' . _WEB_ROOT . '/admin/groupUser');
            }
        } else {
            if (!empty($group)) {
                $this->view('admin', [
                    'page' =>  'groupUser/update',
                    'title' => 'Group User: Update',
                    'css' => ['main'],
                    'group' => $group
                ]);
            }
        }
    }

    function handleDeleteGroup($id)
    {
        $users = $this->users->checkUserGroup($id);
        if (!empty($users)) {
            echo count($users);
        } else {
            $group = $this->group->deleteGroup($id);
            if ($group) {
                echo -1;
            } else {
                echo -2;
            }
        }
    }

    function updateStatus()
    {
        if (isset($_POST) && !empty($_POST)) {
            $status = $_POST['status'];
            $cart_id = $_POST['id'];

            if ($status == 'confirm') {
                $this->cart->updateStatus($cart_id, 2);
            } else if ($status == 'transport') {
                $this->cart->updateStatus($cart_id, 3);
            }
            $this->redirect("admin");
        }
    }

    public function getDetailBill()
    {
        if (isset($_GET['id'])) {
            $data = $this->cart->getDetailBill($_GET['id']);
            echo json_encode(['data' => $data, 'path_img' => _PATH_IMG_Product]);
        }
    }

    public function countTable()
    {
        $cat = $this->category->count();
        $product = $this->product->count();
        $cart = $this->cart->count();
        $users = $this->users->count();

        return ['cat' => $cat, 'product' => $product, 'order' => $cart, 'user' => $users];
    }
}
