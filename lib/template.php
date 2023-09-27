<?php 
function get_component($com) {
    $path = "inc/{$com}.php";
    if (file_exists($path)) {
        require $path;
    } else {
        echo "{$path} không tồn tại";
    }
}
?>