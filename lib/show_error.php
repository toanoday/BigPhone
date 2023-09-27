<?php 
    function display_error($error, $component) {
        if (isset($error[$component])) {
            $err = $error[$component];
            echo "<p class='error'>{$err}</p>";
        }
        return false;
    }
?>