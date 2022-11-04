<?php
class Address extends Controller
{
    private ModelUsers $user;

    function __construct()
    {
        $this->user = $this->model('ModelUsers');
    }

    function index()
    {
       
    }

    function add() {
        $address = '';
        $error = '';

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['address']))
                $address = $_POST['address'];
            else 
                $error = "Require all field";
            
            if(isset($_SESSION['user'])) {
                $user_id = $_SESSION['user']['id'];
                $this->user->updateAddress($user_id, $address);
                $this->redirect("checkout");
            }
        }

        return $this->view('client', [
            'page' => 'address_change',
            'title' => 'Address - Change',
            'css' => ['main', 'about', 'address'],
            'js' => ['address'],
            'error' => $error,
        ]);
    }
}
