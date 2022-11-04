<?php

class ModelImg extends DB
{
    function getAll($page = 0, $limit = 4)
    {
        $offset = $page * $limit;

        $sql = 'SELECT * FROM `images` LIMIT ' . $limit . ' OFFSET ' . $offset;

        return $this->pdo_query($sql);
    }

    function count()
    {
        $sql = 'SELECT COUNT(*) FROM images';
        return $this->pdo_query_value($sql);
    }

    function insertManageImg($image, $key_image, $page, $title_one, $title_two, $description)
    {
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO images(image, key_image, page, title_one, title_two, description, created_at) 
            VALUES ('$image', '$key_image', '$page', '$title_one', '$title_two', '$description', '$date')";
        return $this->pdo_execute_lastInsertID($sql);
    }

    function deleteImg($id)
    {
        $sql = "DELETE FROM images WHERE id = " . $id;
        return $this->pdo_execute($sql);
    }

    function selectImg($id)
    {
        $sql = 'SELECT * FROM images WHERE id = ' . $id;
        if ($this->pdo_query_one($sql)) {
            return $this->pdo_query_one($sql);
        } else {
            return [];
        }
    }

    function updateImg($id, $page, $image, $key_image, $title_one, $title_two, $description)
    {
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE images SET page='$page', image='$image', key_image='{$key_image}', title_one='{$title_one}', title_two='{$title_two}', description='{$description}', updated_at='{$date}' WHERE id = {$id}";
        return $this->pdo_execute($sql);
    }
}
