<?php
class ModelProduct extends DB
{
    function getAll($filter = [])
    {
        if (isset($filter['cate_id']) && $filter['cate_id'] > 0) {
            $sql = 'SELECT * FROM product WHERE cate_id = ' . $filter['cate_id'];
        } else if (isset($filter['filter_price']) && $filter['filter_price'] > -1) {
            $sql = 'SELECT * FROM `product` WHERE price BETWEEN 0 AND ' . $filter['filter_price'];
        } else if (isset($filter['key_w']) && !empty($filter['key_w'])) {
            if (isset($filter['type']) && !empty($filter['type'])) {
                if ($filter['type'] === 'find_product') {
                    $sql = 'SELECT * FROM `product` p WHERE p.name LIKE "%' . $filter['key_w'] . '%"';
                } else {
                    $sql = "SELECT * FROM `product` p JOIN ( SELECT p.id as p_id FROM `product` p JOIN category c ON p.cate_id = c.id WHERE c.name LIKE '%" . $filter['key_w'] . "%') result ON p.id = result.p_id;";
                }
            } else if (isset($filter['key_w']) && !empty($filter['key_w']) && isset($filter['limit']))
                $sql = 'SELECT * FROM product WHERE name like "%' . $filter['key_w'] . '%" LIMIT ' . $filter['limit'];
        } else if (isset($filter['page']) && $filter['page'] >= 0 && isset($filter['per_page'])) {
            $offset = (int) $filter['page'] * (int) $filter['per_page'];
            $sql = 'SELECT * FROM `product` LIMIT ' . $filter['per_page'] . ' OFFSET ' . $offset;
        } else {
            $sql = 'SELECT * FROM product LIMIT ' .  $filter['limit'];
        }

        if (isset($sql) && !empty($sql))
            return $this->pdo_query($sql);
        else {
            echo "Can't found data";
            exit;
        }
    }

    function count()
    {
        $sql = 'SELECT COUNT(*) as count FROM `product`';
        return $this->pdo_query_value($sql);
    }

    function insertProduct($name, $image, $cate_id, $price, $description)
    {
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO product(name,img, cate_id, price, description, created_at) VALUES ('$name', '$image', '$cate_id', '$price', '$description', '$date')";
        return $this->pdo_execute_lastInsertID($sql);
    }

    function addImageProduct($product_id, $image, $created_at)
    {
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO img_product(product_id,img, created_at) VALUES ('$product_id', '$image','$date')";
        return $this->pdo_execute($sql);
    }

    function selectOneProduct($id)
    {
        $sql = 'SELECT * FROM product WHERE id = ' . $id;
        if ($this->pdo_query_one($sql)) {
            return $this->pdo_query_one($sql);
        } else {
            return [];
        }
    }

    function selectProductImg($id)
    {
        $sql = 'SELECT * FROM img_product WHERE product_id = ' . $id;
        if ($this->pdo_query($sql)) {
            return $this->pdo_query($sql);
        } else {
            return [];
        }
    }

    function updateProduct($id, $name, $image, $cate_id, $price, $description)
    {
        $date = date('Y-m-d H:i:s');

        if (empty($image)) {
            $sql = "UPDATE product SET name='$name', cate_id='$cate_id', price='$price', description='$description',updated_at='$date' WHERE id = $id";
        } else {
            $sql = "UPDATE product SET name='$name', img='$image', cate_id='$cate_id', price='$price', description='$description',updated_at='$date' WHERE id = $id";
        }
        return $this->pdo_execute($sql);
    }

    function updateImageProduct($product_id, $image, $created_at)
    {
        $date = date('Y-m-d H:i:s');
        if (empty($image)) {
            $sql = "UPDATE img_product SET updated_at='$date' WHERE product_id='$product_id'";
        }
        $sql = "UPDATE img_product SET img='$image',updated_at='$date' WHERE product_id='$product_id'";
        return $this->pdo_execute($sql);
    }

    function deleteProductImg($id)
    {
        $sql = "DELETE FROM img_product WHERE product_id = " . $id;
        return $this->pdo_execute($sql);
    }

    function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE id = " . $id;
        return $this->pdo_execute($sql);
    }
}
