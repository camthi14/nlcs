<?php
class InfoOrder extends Controller
{
    private ModelCart $cart;

    function __construct()
    {
        $this->cart = $this->model('ModelCart');
    }

    function index()
    {
        $statuses = $this->cart->getAllStatus();

        if (strtolower($_SERVER['REQUEST_METHOD']) == 'post' && isset($_SESSION['user'])) {
            $s_id = 0;
            $name_search = '';

            if (isset($_POST['s_id'])) {
                $s_id = (int) $_POST['s_id'];
            }

            if(isset($_POST['name_search'])) {
                $name_search = $_POST['name_search'];
            }

            $data = $this->cart->findBillByIdStatus($s_id, $_SESSION['user']['id'], $name_search);

            echo json_encode([
                'message' => 'GET DATA SUCCESS',
                'data' => $data,
            ]);

            exit;
        }

        return $this->view('client', [
            'page' => 'info_order',
            'title' => 'Info Order',
            'css' => ['main', 'account'],
            'js' => ['bill_info'],
            'statuses' => $statuses
        ]);
    }
}
