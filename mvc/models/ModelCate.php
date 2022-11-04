<?php
 
class ModelCate extends DB{
    function getAll($keyw_s = ""){
        if($keyw_s != ""){
            $sql = 'SELECT * FROM category WHERE name like "%'.$keyw_s.'%"';
        }else{
            $sql = 'SELECT * FROM category';
        }
        return $this->pdo_query($sql);
    }
    
    function insertCate($name,$created_at){
        $sql = "INSERT INTO category(name,created_at) VALUES ('$name', '$created_at')";
        return $this->pdo_execute($sql);
    }
    
    function selectOneCate($id){
        $sql = 'SELECT * FROM category WHERE id = '.$id;
        if($this->pdo_query_one($sql)){
            return $this->pdo_query_one($sql);
        }else{
            return [];
        }
    }
    
    function updateCate($id, $name,$update_at){
        $sql = "UPDATE category SET name='$name', updated_at='$update_at' WHERE id = $id";
        return $this->pdo_execute($sql);
    }
    
    function deleteCate($id){
        $sql = "DELETE FROM category WHERE id = ".$id;
        return $this->pdo_execute($sql);
    }

    function count() {
        $sql = 'SELECT COUNT(*) as count FROM `category`';
        return $this->pdo_query_value($sql);
    }

    public function findCateById($id)
    {
        $sql = 'SELECT * FROM `product` p JOIN (
                        SELECT p.id FROM `category` c JOIN `product` p ON c.id = p.cate_id WHERE c.id = ' . $id . ') as t ON p.id = t.id';
        return $this->pdo_query($sql);
    }
}