<?php

class User extends Controller
{
    private $users;
    private $groups;

    public function __construct()
    {
        $this->users = $this->model('ModelUsers');
        $this->groups = $this->model('ModelGroup');
    }

    public function listUser()
    {
        $keyw_s = "";
        $id_group = 0;
        $per_page = 3;
        $page = 0;

        if (isset($_POST['groupUser']) && $_POST['groupUser'] !== 'Select') {
            $id_group = $_POST['groupUser'];
        }

        if (isset($_GET['action']) && !empty($_GET['action'])) {
            if (strtolower($_GET['action']) == 'prev' && isset($_GET['page'])) {
                $page = $_GET['page'] - 1;
                $this->redirect('/user/listUser?page=' . $page);
            }

            if (strtolower($_GET['action']) == 'next' && isset($_GET['page'])) {
                $page = $_GET['page'] + 1;
                $this->redirect('/user/listUser?page=' . $page);
            }
        }

        if (isset($_GET['page'])) {
            $page = (int) $_GET['page'] - 1;
        }

        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $keyw_s = $_POST['keyw_s'];
        }
        
        $users = $this->users->getAll([
            'key_w' => $keyw_s,
            'group_id' => $id_group,
            'page' => $page,
            'per_page' => $per_page
        ]);

        $groups = $this->groups->getAll();

        return $this->view('admin', [
            'page' => 'users/list',
            'title' => 'User',
            'users' => $users,
            'groups' => $groups,
            'total_page' => ceil((int) $this->users->count() / $per_page),
            'css' => ['main', 'imgUploadAdd'],
            'js' => [
                'ajax',
                'search'
            ]
        ]);
    }

    public function usersAdd()
    {
        $groups = $this->groups->getAll();

        return $this->view('admin', [
            'page' => 'users/add',
            'title' => 'User: Add',
            'groups' => $groups,
            'css' => ['main', 'imgUploadAdd'],
            'js' => ['uploadImg']
        ]);
    }

    public function handleAddUsers()
    {
        $message = '';
        $type = '';
        
        if (isset($_POST['addusers']) && $_POST['addusers'] != "") {
            $username = $_POST['username'];
            $avatar = $this->processImg($_FILES['avatar']['name'], $_FILES['avatar']['tmp_name'], 'avt');
            $groupUser = $_POST['groupUser'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $pass_cf = $_POST['pass_cf'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $description = $_POST['description'];

            if ($pass === $pass_cf) {
                $pass = password_hash($pass, PASSWORD_DEFAULT);
            } else {
                $message = 'Password incorrect!';
                $type = 'danger';
            }

            $users = $this->users->getAll();
            $check = 0;

            foreach ($users as $user) {
                if ($username == $user['name']) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }

            $date = date('Y-m-d H:i:s');

            if ($check === 0) {
                $status = $this->users->insertAll($username, $avatar, $groupUser, $email, $pass, $phone, $address, $description);

                if ($status) {
                    $message = 'Add user success';
                    $type = 'success';
                    $_SESSION['message'] = $message;
                    header('Location: ' . _WEB_ROOT . '/user/listUser');
                } else {
                    $message = 'Add user failed';
                    $type = 'danger';
                }
            } else {
                $message = 'The user already exists!';
                $type = 'danger';
            }
            unset($_POST['addgroup']);
        }

        $this->view('admin', [
            'page' =>  'users/add',
            'message' => $message,
            'type' => $type,
            'css' => ['main', 'imgUploadAdd'],
            'js' => ['uploadImg']
        ]);
    }

    public function handleUpdateUsers($id)
    {
        $user = $this->users->selectOneUserId($id);
        $groups = $this->groups->getAll();

        if (isset($_POST['updateusers']) && $_POST['updateusers'] != "") {
            $username = $_POST['username'];
            $avatar = $this->processImg($_FILES['avatar']['name'], $_FILES['avatar']['tmp_name'], 'avt');;
            $groupUser = $_POST['groupUser'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $pass_cf = $_POST['pass_cf'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $description = $_POST['description'];

            if ($pass != '') {
                if ($pass === $pass_cf) {
                    $pass = password_hash($pass, PASSWORD_DEFAULT);
                } else {
                    $message = 'Password incorrect!';
                    $type = 'danger';
                }
            }

            $users = $this->users->getAll($id);
            $check = 0;

            foreach ($users as $user) {

                if ($username == $user['name']) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }

            $date = date('Y-m-d H:i:s');

            if ($check === 0) {
                $status = $this->users->updateUser($id, $username, $avatar, $groupUser, $email, $pass, $phone, $address, $description, $date);

                if ($status) {
                    $message = 'Update user success';
                    $type = 'success';
                    $_SESSION['message'] = $message;
                    header('Location: ' . _WEB_ROOT . '/user/listUser');
                } else {
                    $message = 'Update user fail';
                    $type = 'danger';
                }
            } else {
                $message = 'The user already exists!';
                $type = 'danger';
            }
        } else {
            if (!empty($user)) {
                $this->view('admin', [
                    'page' =>  'users/update',
                    'title' => 'User: Update',
                    'user' => $user,
                    'groups' => $groups,
                    'css' => ['main', 'imgUploadAdd'],
                    'js' => ['uploadImg']
                ]);
            }
        }
    }

    public function handleDeleteUsers($id)
    {
        $users = $this->users->deleteUser($id);
        if ($users) {
            echo -1;
        } else {
            echo -2;
        }
    }

    public function handleRegister()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cf_password = $_POST['cf_password'];
        $users = $this->users->getAll();
        $checkIsMail = false;
        $message = '';
        $created_at = date('Y-m-d H:i:s');

        if (!empty($users)) {
            foreach ($users as $user) {
                if ($user['email'] ==  $email) {
                    $checkIsMail = true;
                    break;
                }
            }
        } else {
            $checkIsMail = false;
        }

        $checkLogin = 0;

        if ($checkIsMail) {
            $checkLogin = 0;
            $message = 'Email already exists!';
        } else {
            if ($password === $cf_password) {

                $password = password_hash($password, PASSWORD_DEFAULT);
                $status = $this->users->insert($email, $email, $password, $created_at);

                if ($status) {
                    $message = 'You have successfully registered!';
                    $checkLogin = 1;

                } else {
                    $message = 'The system is having problems!';
                    $checkLogin = 0;
                }
            } else {
                $message = 'Password incorrect!';
                $checkLogin = 0;
            }
            
        }

        echo json_encode(['check' => $checkLogin, 'msg' => $message]);
    }

    public function handleLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->users->selectOneUser($email);
        $message = '';
        $checkLogin = 0;

        if (!empty($user)) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                $checkLogin = 1;
            } else {
                $checkLogin = 0;
                $message = 'Password incorrect!';
            }
        } else {
            $checkLogin = 0;
            $message = 'Email does not exist!';
        }

        echo json_encode(['check' => $checkLogin, 'msg' => $message, 'role' => $user['group_id'], 'link' => _WEB_ROOT]);
    }

    public function handleLogout()
    {
        unset($_SESSION['user']);
        header('Location: ' . _WEB_ROOT . '');
    }
}
