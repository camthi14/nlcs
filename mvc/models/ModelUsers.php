<?php
class ModelUsers extends DB
{
    function getAll($filter = [])
    {
        $sql = 'SELECT * FROM users WHERE 1';

        if (isset($filter['key_w']) && !empty($filter['key_w'])) {
            $sql .= ' AND name like "%' . $filter['key_w'] . '%"';
        }else if (isset($filter['id']) &&$filter['id'] > 0) {
            $sql .= ' AND id <> ' . $filter['id'];
        }else if (isset($filter['group_id']) && $filter['group_id'] > 0) {
            $sql .= ' AND group_id = ' . $filter['group_id'];
        }else if(isset($filter['page']) && $filter['page'] >= 0 && isset($filter['per_page'])) {
            $offset = (int) $filter['page'] * (int) $filter['per_page'];
            $sql = 'SELECT * FROM `users` LIMIT ' . $filter['per_page'] . ' OFFSET ' . $offset;
        }

        return $this->pdo_query($sql);
    }

    function count()
    {
        $sql = 'SELECT COUNT(*) as count FROM `users`';
        return $this->pdo_query_value($sql);
    }

    function getUserGuest($limit = 10)
    {
        $sql = "SELECT u.id, u.name, description, g.name as group_name, avt FROM `users` u JOIN `groupusers` g ON u.group_id = g.id WHERE g.name NOT LIKE '%admin' AND g.name NOT LIKE '%client' LIMIT " . $limit;
        return $this->pdo_query($sql);
    }

    function insert($name, $email, $password, $created_at)
    {
        $insertUser = "INSERT INTO users(name,email, password,group_id ,created_at) VALUES ('$name', '$email','$password',2 ,'$created_at')";
        return $this->pdo_execute($insertUser);
    }

    function insertUser($name, $created_at)
    {
        $sql = "INSERT INTO users(name,created_at) VALUES (`$name`, `$created_at`)";
        return $this->pdo_execute($sql);
    }

    function insertAll($name, $avt, $group_id, $email, $password, $phone, $address, $description)
    {
        $date = date('Y-m-d H:i:s');
        $description1 = htmlspecialchars($description, ENT_QUOTES);
        $sql = "INSERT INTO users(name, avt, group_id, email, password, phone, address, description, created_at) VALUES ('$name', '$avt', '$group_id', '$email', '$password', '$phone', '$address', '$description1', '$date')";
        return $this->pdo_execute($sql);
    }

    function selectOneUser($email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";

        if ($this->pdo_query_one($sql)) {
            return $this->pdo_query_one($sql);
        } else {
            return [];
        }
    }

    function selectOneUserId($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";

        if ($this->pdo_query_one($sql)) {
            return $this->pdo_query_one($sql);
        } else {
            return [];
        }
    }

    function checkUserGroup($group_id)
    {
        $sql = "SELECT * FROM users WHERE group_id = '$group_id'";

        if ($this->pdo_query($sql)) {
            return $this->pdo_query($sql);
        } else {
            return [];
        }
    }

    function updateUser($id, $name, $avt, $group_id, $email, $pass, $phone, $address, $description, $updated_at)
    {
        $description1 = $this->passValue($description);
        if (!empty($pass) && empty($avt)) {
            $sql = "UPDATE users SET name='$name', group_id='$group_id', email='$email', password='$pass', phone='$phone', address='$address', description='$description1', updated_at	='$updated_at' WHERE id = $id";
        } else if (empty($pass) && !empty($avt)) {
            $sql = "UPDATE users SET name='$name', avt='$avt', group_id='$group_id', email='$email', phone='$phone', address='$address', description='$description1', updated_at	='$updated_at' WHERE id = $id";
        } else if (empty($pass) && empty($avt)) {
            $sql = "UPDATE users SET name='$name', group_id='$group_id', email='$email', phone='$phone', address='$address', description='$description1', updated_at	='$updated_at' WHERE id = $id";
        } else {
            $sql = "UPDATE users SET name='$name', avt='$avt', group_id='$group_id', email='$email', password='$pass', phone='$phone', address='$address', description='$description1', updated_at='$updated_at' WHERE id = $id";
        }
        return $this->pdo_execute($sql);
    }

    function updateAddress($id, $address)
    {
        $sql = "UPDATE users SET address='" . $this->passValue($address) . "' WHERE id=$id";
        return $this->pdo_execute($sql);
    }

    function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = " . $id;
        return $this->pdo_execute($sql);
    }

    function passValue($value = '')
    {
        if (!empty($value)) {
            return htmlspecialchars($value, ENT_QUOTES);
        }
        return "";
    }
}
