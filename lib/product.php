<?php
function get_list_product_by_catid($cat_id) {
    global $con;
    $sql = "SELECT * FROM tbl_product WHERE cat_id = {$cat_id} AND status_pro = 0";
    $result = mysqli_query($con, $sql);
    $list_product = array();
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            $list_product[] = $row;
        }
    }
    return $list_product;
}

function get_list_product() {
    global $con;
    $sql = "SELECT * FROM tbl_product WHERE status_pro = 0";
    $result = mysqli_query($con, $sql);
    $list_product = array();
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            $list_product[] = $row;
        }
    }
    return $list_product;
}

function get_category_by_catid($cat_id) {
    global $con;
    $sql = "SELECT cat_name FROM tbl_category WHERE cat_id = {$cat_id} AND status_pro = 0";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $row = mysqli_fetch_array($result);
        if ($row) {
            return $row["cat_name"];
        }
    }
    return ""; // Trả về một thông báo nếu danh mục không được tìm thấy
}

function get_product_info_by_proid($pro_id) {
    global $con;
    $sql = "SELECT * FROM tbl_product WHERE pro_id = {$pro_id} AND status_pro = 0";
    $result = mysqli_query($con, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $info = mysqli_fetch_array($result);
        return $info;
    }
    return null; // Trả về null nếu sản phẩm không được tìm thấy
}

function get_list_outstanding_product() {
    global $con;
    $sql = "WITH tab AS (
        SELECT pro_id, SUM(quantity) sl FROM `tbl_orderdetail` GROUP BY pro_id
    )
    SELECT tbl_product.*, tab.sl FROM tbl_product
    INNER JOIN tab ON tbl_product.pro_id = tab.pro_id WHERE status_pro = 0 ORDER BY sl DESC";
    $result = mysqli_query($con, $sql);
    $list_otd_p = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $list_otd_p[] = $row;
        }
    }
    return $list_otd_p;
}

function filter_product() {
    global $con;
    $sql = "";

    if (isset($_GET["cat_id"])) {
        if (isset($_POST['select']) && $_POST['select'] != 0) {
            $cat_id =  $_GET["cat_id"];
            switch ($_POST['select']) {
                case 1:
                    $sql  = "SELECT * FROM tbl_product WHERE cat_id = $cat_id ORDER BY pro_name ASC";
                    break;
                case 2:
                    $sql  = "SELECT * FROM tbl_product WHERE cat_id = $cat_id ORDER BY pro_name DESC";
                    break;
                case 3:
                    $sql  = "SELECT * FROM tbl_product WHERE cat_id = $cat_id ORDER BY original_price DESC";
                    break;
                case 4:
                    $sql  = "SELECT * FROM tbl_product WHERE cat_id = $cat_id ORDER BY original_price ASC";
                    break;
            }
        }
    } else {
        if (isset($_POST['select']) && $_POST['select'] != 0) {
            switch ($_POST['select']) {
                case 1:
                    $sql  = "SELECT * FROM tbl_product ORDER BY pro_name ASC";
                    break;
                case 2:
                    $sql  = "SELECT * FROM tbl_product ORDER BY pro_name DESC";
                    break;
                case 3:
                    $sql  = "SELECT * FROM tbl_product ORDER BY original_price DESC";
                    break;
                case 4:
                    $sql  = "SELECT * FROM tbl_product ORDER BY original_price ASC";
                    break;
            }
        }
    }

    $result = mysqli_query($con, $sql);
    $list_sp = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $list_sp[] = $row;
        }
    }
    return $list_sp;
}

function get_list_product_by_seach($info) {
    global $con;
    $sql = "SELECT * FROM tbl_product WHERE pro_name LIKE '%$info%' AND status_pro = 0";
    $result = mysqli_query($con, $sql);
    $list_sp = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $list_sp[] = $row;
        }
    }
    return $list_sp;
}

function check_product($quantity) {
    return $quantity > 0;
}
?>
