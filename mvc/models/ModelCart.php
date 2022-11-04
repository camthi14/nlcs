<?php

class ModelCart extends DB
{
    public function insert($quantity, $product_id, $user_id, $status_id)
    {
        $sql = "INSERT INTO cart (quantity, product_id, user_id, status_id) VALUES ('$quantity', '$product_id', '$user_id', '$status_id')";
        return $this->pdo_execute_lastInsertID($sql);
    }

    function count()
    {
        $sql = 'SELECT COUNT(*) as count FROM `cart`';
        return $this->pdo_query_value($sql);
    }


    public function getAll($page = 0, $limit = 4)
    {
        $offset = $page * $limit;
        $sql = 'SELECT c.purchased_at, c.id, u.name, u.phone, u.address, s.name as status FROM `cart` c JOIN `users` u On c.user_id = u.id JOIN `statuses` s ON c.status_id = s.id ORDER BY c.updated_at DESC LIMIT ' . $limit . ' OFFSET ' . $offset;
        return $this->pdo_query($sql);
    }

    public function getInfoOrder()
    {
        $sql = "SELECT c.id, c.purchased_at, p.name as product_name, p.price, s.name as status, c.quantity  FROM `cart` c JOIN `statuses` s ON c.status_id = s.id JOIN `product` p ON c.product_id = p.id ORDER BY c.updated_at DESC";
        return $this->pdo_query_one($sql);
    }

    public function updateStatus($id, $status_id)
    {
        $sql = "UPDATE cart SET status_id='$status_id' WHERE id=$id";
        return $this->pdo_execute($sql);
    }

    public function getDetailBill($id)
    {
        $sql = "SELECT c.id as id_cart, p.id as id_product, p.name, p.img, p.price, u.address, c.quantity  FROM `cart` c JOIN `users` u ON c.user_id = u.id JOIN `product` p ON c.product_id = p.id WHERE c.id=$id";
        return $this->pdo_query_one($sql);
    }

    public function getAllStatus()
    {
        $sql = 'SELECT id, name FROM `statuses`';
        return $this->pdo_query($sql);
    }

    public function findBillByIdStatus($id = 0, $user_id, $name_search)
    {
        if ($id > 0) {
            $sql = 'SELECT c.id id_cart, p.name product_name, p.price, c.quantity, s.name status_name, c.purchased_at FROM `cart` c JOIN `product` p ON c.product_id = p.id JOIN `statuses` s ON c.status_id = s.id JOIN `users` u ON c.user_id = u.id WHERE status_id = ' . $id . ' AND u.id = ' . $user_id . '  ORDER BY c.purchased_at DESC';
        } else {
            $sql = 'SELECT c.id id_cart, p.name product_name, p.price, c.quantity, s.name status_name, c.purchased_at FROM `cart` c JOIN `product` p ON c.product_id = p.id JOIN `statuses` s ON c.status_id = s.id JOIN `users` u ON c.user_id = u.id WHERE u.id = ' . $user_id . '  ORDER BY c.purchased_at DESC';
        }

        if (isset($name_search) && !empty($name_search)) {
            $sql = 'SELECT c.id id_cart, p.name product_name, p.price, c.quantity, s.name status_name, c.purchased_at FROM `cart` c JOIN `product` p ON c.product_id = p.id JOIN `statuses` s ON c.status_id = s.id JOIN `users` u ON c.user_id = u.id WHERE u.id = ' . $user_id . ' AND p.name LIKE "%' . $name_search . '%" ORDER BY c.purchased_at DESC';
        }

        return $this->pdo_query($sql);
    }
}
