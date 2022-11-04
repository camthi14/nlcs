<?php
class Blog extends Controller
{
    private ModelBlog $blog;

    function __construct()
    {
        $this->blog = $this->model('ModelBlog');
    }

    function index()
    {
        $blog = $this->blog->getAll(['limit' => 15]);

        return $this->view('client', [
            'page' => 'blog',
            'title' => 'Blog',
            'css' => ['main', 'blog'],
            'blog' =>$blog,
        ]);
    }

    function listBlog()
    {
        $keyw_s = "";
        $per_page = 3;
        $page = 0;

        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $keyw_s = $_POST['keyw_s'];
        }
        
        if (isset($_GET['action']) && !empty($_GET['action'])) {
            if (strtolower($_GET['action']) == 'prev' && isset($_GET['page'])) {
                $page = $_GET['page'] - 1;
                $this->redirect('blog/listBlog?page=' . $page);
            }

            if (strtolower($_GET['action']) == 'next' && isset($_GET['page'])) {
                $page = $_GET['page'] + 1;
                $this->redirect('blog/listBlog?page=' . $page);
            }
        }

        if (isset($_GET['page'])) {
            $page = (int) $_GET['page'] - 1;
        }


        $blog = $this->blog->getAll([
            'page' => $page,
            'per_page' => $per_page,
            'key_w' => $keyw_s
        ]);

        return $this->view('admin', [
            'page' => 'blog/list',
            'title' => 'Blog',
            'blog' => $blog,
            'total_page' => ceil((int) $this->blog->count() / $per_page),
            'css' => ['main', 'imgUploadAdd'],
            'js' => [
                'ajax',
                'search'
            ]
        ]);
    }

    function blogAdd()
    {
        $blog = $this->blog->getAll();

        return $this->view('admin', [
            'page' => 'blog/add',
            'title' => 'Blog: Add',
            'blog' => $blog,
            'css' => ['main', 'imgUploadAdd'],
            'js' => ['uploadImg']
        ]);
    }

    function handleAddBlog()
    {
        $message = '';
        $type = '';
        $status ='';

        if (isset($_POST['addBlog']) && $_POST['addBlog'] != "") {
            $image = $this->processImg($_FILES['image']['name'], $_FILES['image']['tmp_name'], 'blog');
            $title_sub = $_POST['title_sub'];
            $title_main = $_POST['title_main'];
            $interface = $_POST['interface'];
            $grid_layout = $_POST['grid_layout'];
            $description = $_POST['description'];

            $status = $this->blog->insertBlog($image, $title_sub, $title_main, $interface, $grid_layout, $description);

            if ($status) {
                $message = 'Add blog success';
                $type = 'success';
                $_SESSION['message'] = $message;
                header('Location: ' . _WEB_ROOT . '/blog/listBlog');
            } else {
                $message = 'Add blog failed';
                $type = 'danger';
            }
            unset($_POST['addBlog']);
        }
        $this->view('admin', [
            'page' =>  'blog/add',
            'message' => $message,
            'type' => $type,
            'css' => ['main', 'imgUploadAdd'],
            'js' => ['uploadImg']
        ]);
    }

    function handleUpdateBlog($id)
    {
        $message = '';
        $type = '';
        $status = '';

        $blog = $this->blog->selectOneBlog($id);
        
        if (isset($_POST['updateBlog']) && $_POST['updateBlog'] != "") {
            $image = $this->processImg($_FILES['image']['name'], $_FILES['image']['tmp_name'], 'blog');
            $title_sub = $_POST['title_sub'];
            $title_main = $_POST['title_main'];
            $interface = $_POST['interface'];
            $grid_layout = $_POST['grid_layout'];
            $description = $_POST['description'];

            $status = $this->blog->updateBlog($id, $image, $title_sub, $title_main, $interface, $grid_layout, $description);

            
            if ($status) {
                $message = 'Update blog success';
                $type = 'success';
                $_SESSION['message'] = $message;
                header('Location: ' . _WEB_ROOT . '/blog/listBlog');
            } else {
                $message = 'Update blog failed';
                $type = 'danger';
            }
        }
        $this->view('admin', [
            'page' =>  'blog/update',
            'title' => 'Blog: Update',
            'blog' => $blog,
            'css' => ['main', 'imgUploadAdd'],
            'js' => ['uploadImg'],
            'message' => $message,
            'type' => $type
        ]);
    }

    function handleDeleteBlog($id)
    {
        $blog = $this->blog->deleteBlog($id);

        if ($blog) {
            echo -1;
        } else {
            echo -2;
        }
    }
}