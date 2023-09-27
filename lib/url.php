<?php 
function redirect($url = "?mod=home", $act = "main"){
    header("Location: {$url}&act={$act}");
}
?>