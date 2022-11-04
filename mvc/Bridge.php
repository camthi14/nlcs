<?php

function getNameGroup($group_id)
{
    $name = "";
    switch ($group_id) {
        case 1:
            $name = 'Admin';
            break;
        case 2:
            $name = 'Client';
            break;

        default:
            $name = 'Guest';
            break;
    }
    return $name;
}


require_once "./mvc/core/App.php";
require_once "./mvc/core/Controller.php";
require_once "./mvc/core/DB.php";
require_once "./mvc/helper/getNameCate.php";