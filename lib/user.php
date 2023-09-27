<?php 
function is_login() { 
    if (isset($_SESSION['is_login'])) 
        return true;
    return false;
}

// trả về username
function user_login() {
    if (!empty($_SESSION['username'])) {
        echo $_SESSION['username'];
        return $_SESSION['username'];
    }
    return false;
}


function get_info_user_ordered()
{
    global $con;
    $sql = "SELECT * FROM tbl_user WHERE user_id = {$_SESSION['user_id']}";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $info = mysqli_fetch_assoc($result);
    }
    return $info;
}

function update_info_user($email, $sdt, $address)
{
    global $con;
    $sql = "UPDATE tbl_user set email = '$email', phone_num = '$sdt', address = '$address'
    WHERE user_id = {$_SESSION['user_id']}";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        return false;
    }
    return true;
}
?>

