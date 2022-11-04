<?php
class Gallery extends Controller
{
    private ModelBlog $blog;

    function __construct()
    {
        $this->blog = $this->model('ModelBlog');
    }

    function index()
    {
        $blog = $this->blog->getAll(['limit' => 6]);

        return $this->view('client', [
            'page' => 'gallery',
            'title' => 'Gallery',
            'css' => ['main', 'gallery'],
            'blog' => $blog,

        ]);
    }
}