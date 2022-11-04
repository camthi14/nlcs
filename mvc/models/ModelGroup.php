<?php
class ModelGroup extends DB
{
    function getAll($filter = [])
    {
        if (isset($filter['key_w']) && !empty($filter['key_w'])) {
            $sql = 'SELECT * FROM `groupUsers` p WHERE p.name LIKE "%' . $filter['key_w'] . '%"';
        }else if (isset($filter['page']) && $filter['page'] >= 0 && isset($filter['per_page'])) {
            $offset = (int) $filter['page'] * (int) $filter['per_page'];
            $sql = 'SELECT * FROM `groupUsers` LIMIT ' . $filter['per_page'] . ' OFFSET ' . $offset;
        }else{
            $sql = 'SELECT * FROM `groupUsers`';
        }
        
        return $this->pdo_query($sql);
    }

    function insertGroup($name, $created_at)
    {
        $sql = "INSERT INTO groupUsers(name,created_at) VALUES ('$name', '$created_at')";
        return $this->pdo_execute($sql);
    }

    function selectOneGroupUser($id)
    {
        $sql = "SELECT * FROM groupUsers WHERE id = " . $id;
        if ($this->pdo_query_one($sql)) {
            return $this->pdo_query_one($sql);
        } else {
            return [];
        }
    }

    function updateGroup($id, $name, $update_at)
    {
        $sql = "UPDATE groupUsers SET name='$name', updated_at	='$update_at' WHERE id = $id";
        return $this->pdo_execute($sql);
    }

    function deleteGroup($id)
    {
        $sql = "DELETE FROM groupUsers WHERE id = " . $id;
        return $this->pdo_execute($sql);
    }

    function count() {
        $sql = 'SELECT COUNT(*) FROM groupUsers';
        return $this->pdo_query_value($sql);
    }
}
