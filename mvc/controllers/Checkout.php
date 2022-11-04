<?php
class Checkout extends Controller
{
    private ModelUsers $user;
    private ModelCart $cart;


    function __construct()
    {
        $this->user = $this->model('ModelUsers');
        $this->cart = $this->model('ModelCart');
    }

    function index()
    {
        $list_buy = array();
        $list_info = array();
        $user = array();

        if (isset($_SESSION['cart']['buy']) || isset($_SESSION['cart']['info'])) {
            $list_buy = $_SESSION['cart']['buy'];
            $list_info = $_SESSION['cart']['info'];
        }

        if (isset($_SESSION['user'])) {
            $user = $this->user->selectOneUserId($_SESSION['user']['id']);
        }

        return $this->view('client', [
            'page' => 'checkout',
            'title' => 'Check out',
            'css' => ['main', 'product'],
            'user_info' => $user,
            'list_buy' =>  $list_buy,
            'list_info' => $list_info
        ]);
    }

    function handleRedirect(){

        if((!isset($_SESSION['cart']['buy']) )|| !isset($_SESSION['user'])){
            echo 'Giỏ hàng trống hoặc user chưa đăng nhập';
            $this->redirect('cart');
            exit;
        }
        $this->redirect('checkout');
    }

    function submit() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_SESSION['user']) && isset($_SESSION['cart']['buy'])) {
                $user_id = $_SESSION['user']['id'];

                $user = $this->user->selectOneUserId($user_id);

                if(empty($user['address'])) {
                    $_SESSION['error_address'] = "Address is not found, please choose change address";
                    $this->redirect("checkout");
                    exit;
                }

                $cart_buy = $_SESSION['cart']['buy'];

                foreach($cart_buy as $item) {
                    $this->cart->insert($item['quantity'], $item['id'], $user_id, 1);
                }

                unset($_SESSION['cart']);
                $this->redirect("alert/checkoutSuccess");
            }
        }
    }
}
