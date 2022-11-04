<?php
class Account extends Controller
{
    private ModelUsers $user;

    function __construct()
    {
        $this->user = $this->model('ModelUsers');
    }

    function index()
    {
        $user = array();

        if (isset($_SESSION['user']))
            $user = $this->user->selectOneUserId($_SESSION['user']['id']);

        return $this->view('client', [
            'page' => 'account_info',
            'title' => 'Account',
            'css' => ['main', 'account'],
            'user_info' => $user, 
        ]);
    }
}
