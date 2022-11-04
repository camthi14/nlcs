<?php
class About extends Controller
{
    private ModelUsers $user;

    function __construct()
    {
        $this->user = $this->model('ModelUsers');

    }

    function index()
    {
        $user = $this->user->getUserGuest();
        return $this->view('client', [
            'page' => 'about',
            'title' => 'About - World Tea Company ',
            'css' => ['main', 'about'],
            'user' => $user
        ]);
    }
}