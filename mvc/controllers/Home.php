<?php
class Home extends Controller
{
    private ModelHome $home;
    private ModelProduct $product;
    private ModelBlog $blog;
    private ModelUsers $user;

    function __construct()
    {
        $this->home = $this->model("ModelHome");
        $this->product = $this->model("ModelProduct");
        $this->blog = $this->model("ModelBlog");
        $this->user = $this->model('ModelUsers');
    }

    function index()
    {
        $slider = $this->home->getSlider();
        $user = $this->user->getUserGuest(3);
        $about = $this->home->getAbout();
        $qualityCeylon = $this->home->getQualityCeylon();
        $product = $this->product->getAll(['limit' => 3]);
        $blog = $this->blog->getAll(['limit' => 3]);

        return $this->view('client', [
            'page' => 'home',
            'title' => 'Home',
            'css' => ['main'],
            'slider' => $slider,
            'user' => $user,
            'about' => $about,
            'qualityCeylon' => $qualityCeylon,
            'product' => $product,
            'blog' => $blog,
            'js' => [
                'slider',
            ]
        ]);
    }
}