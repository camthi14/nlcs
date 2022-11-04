<?php
class Controller
{
    public function model($model)
    {
        require_once './mvc/models/' . $model . '.php';
        return new $model;
    }

    public function view($view, $data = [])
    {
        if (file_exists('./mvc/views/' . $view . '.php'))
            return require_once './mvc/views/' . $view . '.php';

        exit("VIEW NOT FOUND!");
    }

    public function getLayoutBlock($fileName, $data = [], $folder = "client")
    {
        if (file_exists("./mvc/views/block/$folder/$fileName.php"))
            return require_once "./mvc/views/block/$folder/$fileName.php";

        exit("GET LAYOUT $fileName BLOCK NOT FOUND!");
    }

    public function getLayoutPage($fileName, $data = [], $folder = "client")
    {
        if (file_exists("./mvc/views/pages/$folder/$fileName.php"))
            return require_once "./mvc/views/pages/$folder/$fileName.php";

        exit("GET LAYOUT PAGE NOT FOUND!");
    }

    public function getJs($fileName = '', $folder = 'client')
    {
        echo _PUBLIC . "/$folder/assets/js/$fileName.js";
    }

    public function getCss($fileName = '', $folder = 'client')
    {
        echo _PUBLIC . "/$folder/assets/css/$fileName.css";
    }

    public function processImg($file_name, $tmp_name, $folder)
    {
        if (!empty($file_name) && !empty($folder) && !empty($tmp_name)) {
            $date = new DateTimeImmutable();

            $fileNameArr = explode(".", $file_name);

            if (isset($fileNameArr[1])) {
                $img = rand(0, $date->getTimestamp()) . "." . $fileNameArr[1];
                $target_file = _UPLOAD . "/$folder/" .  basename($img);

                if (move_uploaded_file($tmp_name, $target_file))
                    return $img;
            }

            return "";
        }

        return "";
    }

    public function redirect($url = "")
    {
        if (!empty($url)) {
            header("Location: " . _WEB_ROOT . "/$url");
        }
    }
}
