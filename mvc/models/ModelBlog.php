<?php

class ModelBlog extends DB
{

    function getAll($filter = [])
    {
        
        if (isset($filter['key_w']) && !empty($filter['key_w'])) {
            $sql = 'SELECT * FROM blog WHERE title_main like "%' . $filter['key_w'] . '%"';
        } else if (isset($filter['page']) && $filter['page'] >= 0 && isset($filter['per_page'])) {
            $offset = (int) $filter['page'] * (int) $filter['per_page'];
            $sql = 'SELECT * FROM `blog` LIMIT ' . $filter['per_page'] . ' OFFSET ' . $offset;
        } else
            $sql = 'SELECT * FROM blog LIMIT ' . $filter['limit'];

        return $this->pdo_query($sql);
    }

    function count()
    {
        $sql = 'SELECT COUNT(*) as count FROM `blog`';
        return $this->pdo_query_value($sql);
    }

    function insertBlog($image, $title_sub, $title_main, $interface, $grid_layout, $description)
    {
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO blog(image, title_sub, interface, title_main, grid_layout, description, created_at) VALUES ('$image', '$title_sub', '$interface', '$title_main', '$grid_layout', '$description', '$date')";
        return $this->pdo_execute_lastInsertID($sql);
    }

    function selectOneBlog($id)
    {
        $sql = 'SELECT * FROM blog WHERE id = ' . $id;
        if ($this->pdo_query_one($sql)) {
            return $this->pdo_query_one($sql);
        } else {
            return [];
        }
    }

    function updateBlog($id, $image, $title_sub, $title_main, $interface, $grid_layout, $description)
    {
        $date = date('Y-m-d H:i:s');
        if (empty($image)) {
            $sql = "UPDATE blog SET  interface='$interface', title_sub='$title_sub', title_main='$title_main', grid_layout='$grid_layout', description='$description',updated_at='$date' WHERE id = $id";
            return $this->pdo_execute($sql);
        }
        $sql = "UPDATE blog SET image='$image', interface='$interface', title_sub='$title_sub', title_main='$title_main', grid_layout='$grid_layout', description='$description',updated_at='$date' WHERE id = $id";
        return $this->pdo_execute($sql);
    }

    function deleteBlog($id)
    {
        $sql = "DELETE FROM blog WHERE id = " . $id;
        return $this->pdo_execute($sql);
    }
}
