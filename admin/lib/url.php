<?php 
function redirect($url = "?page=home"){
    header("Location: {$url}");
}
?>