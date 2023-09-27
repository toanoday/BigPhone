<?php 
    session_start();
    unset ($_SESSION['user_id']);
    unset ($_SESSION['username']);
    unset ($_SESSION['is_fullname']);
    unset ($_SESSION['is_login']);
    unset ($_SESSION['rule_user']);
    redirect();
?>