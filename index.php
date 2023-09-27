<?php
session_start();
ob_start();
require "db/connect.php";
require "lib/data.php";
require "lib/product.php";
require "lib/cart.php";
require "lib/format_price.php";
require "lib/template.php";
require "lib/url.php";
require "lib/is_admin.php";
require "lib/user.php";
require "lib/show_error.php";

$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home';
$act = isset($_GET['act']) ? $_GET['act'] : 'main';

$path = "modules/{$mod}/{$act}.php";
if(file_exists($path)){
    require $path;
}
else require "inc/404.php";
?>

