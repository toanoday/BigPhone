<?php 
function is_admin() {
    if ($_SESSION['rule_user'] == 1) {
        return true; 
    }
    return false;
}

?>