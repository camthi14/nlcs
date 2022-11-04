<?php

class Cart extends Controller
{
    private ModelCart $cart;
    private ModelProduct $product;

    public function __construct()
    {
        $this->cart = $this->model("ModelCart");
        $this->product = $this->model("ModelProduct");
    }

    function index()
    {
        // unset($_SESSION['cart']);
        $list_cart = $this->get_list_buy_cart();
        $info_cart = $this->get_info_cart();

        $this->view('client', [
            'page' => 'cart',
            'title' => 'Cart',
            'css' => ['main', 'product'],
            'js' => ['cart'],
            'list_cart' => $list_cart,
            'info_cart' => $info_cart,
        ]);
    }

    function update_quantity()
    {
        if (!isset($_POST['id']) || !isset($_POST['quantity']))
            exit(json_encode(['message' => 'MISSING PARAMS id or quantity', 'error' => true]));

        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $product = $this->product->selectOneProduct($id);

        if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
            $_SESSION['cart']['buy'][$id]['quantity'] = $quantity;

            $sub_total = $quantity * $product['price'];

            $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;

            $this->update_info_cart();

            $total = $this->get_total_cart();

            $data = array(
                'sub_total' => $sub_total,
                'total' => $total,
            );

            echo json_encode($data);
        }
    }

    function delete($id)
    {
        if (isset($_SESSION['cart']['buy'][$id])) {
            unset($_SESSION['cart']['buy'][$id]);
            $this->update_info_cart();
        }

        $this->redirect("cart");
    }

    function deleteAll()
    {
        if (isset($_SESSION['cart']))
            unset($_SESSION['cart']);

        $this->redirect("cart");
    }

    function show($id, $quantity_input = 1)
    {
        $this->add_to_cart($id, $quantity_input);
        $this->redirect("cart");
    }

    private function add_to_cart($id, $quantity_input = 1)
    {
        // unset($_SESSION['user_not_login']);

        if (!isset($_SESSION['user'])) {
            $_SESSION['user_not_login'] = true;
            $this->redirect("product");
            exit;
        }

        $product = $this->product->selectOneProduct($id);
        $product['quantity'] = 1;

        if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy']))
            $product['quantity'] = $_SESSION['cart']['buy'][$id]['quantity'] + $quantity_input;

        $product['sub_total'] = $product['quantity'] * $product['price'];
        $_SESSION['cart']['buy'][$id] = $product;

        $this->update_info_cart();
    }

    private function update_info_cart()
    {
        if (isset($_SESSION['cart'])) {
            $num_order = 0;
            $total = 0;

            foreach ($_SESSION['cart']['buy'] as $row) {
                $num_order += $row['quantity'];
                $total += $row['sub_total'];
            }

            $_SESSION['cart']['info'] = array(
                'num_order' => $num_order,
                'total' => $total,
            );
        }
    }

    private function get_list_buy_cart()
    {
        if (isset($_SESSION['cart']))
            return $_SESSION['cart']['buy'];

        return [];
    }

    private function get_info_cart()
    {
        if (isset($_SESSION['cart']))
            return $_SESSION['cart']['info'];

        return array(
            'num_order' => 0,
            'total' => 0,
        );
    }
    private function get_total_cart()
    {
        if (isset($_SESSION['cart']))
            return $_SESSION['cart']['info']['total'];

        return 0;
    }
}
