<?php
define('_WEB_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/chaitan');

define('_PUBLIC', _WEB_ROOT . '/public');

define('_PUBLIC_CLIENT', _WEB_ROOT . '/public/client/assets');

define('_UPLOAD',  $_SERVER['DOCUMENT_ROOT'] . '/chaitan/upload');

define('_PATH_AVATAR', _WEB_ROOT . '/upload/avt/');

define('_PATH_IMG_Product', _WEB_ROOT . '/upload/product/');

define('_PATH_IMG_BLOG', _WEB_ROOT . '/upload/blog/');

define('_PATH_MANAGE_IMG', _WEB_ROOT . '/upload/manageImg/');

session_start();

date_default_timezone_set('Asia/Ho_Chi_Minh');

$script_tz = date_default_timezone_get();

require_once "./mvc/Bridge.php";

$myApp = new App();