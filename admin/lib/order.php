<?php 
function get_detail_order()
{
    global $con;
    $sql = "with tab as (
        select order_id, sum(quantity) sl from tbl_orderdetail GROUP BY order_id
    )
    SELECT * from tab inner join 
    tbl_order on tab.order_id = tbl_order.order_id
    INNER JOIN tbl_user on tbl_order.user_id = tbl_user.user_id
    order by tbl_order.order_id
    ;";

    $result = mysqli_query($con, $sql);
    $list_order = array();
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($list_order, $row);
        }
    }
    return $list_order;
}
function get_detail_ordered_customer()
{
    global $con;
    $sql = "with tab as (
        select tbl_user.user_id, sum(tbl_orderdetail.quantity) sl 
        from tbl_orderdetail 
             inner join tbl_order on tbl_orderdetail.order_id = tbl_order.order_id
             inner join tbl_user on tbl_order.user_id = tbl_user.user_id
        GROUP by tbl_user.user_id
    )
    select DISTINCT tbl_user.fullname, tbl_user.phone_num, tbl_user.email, tbl_user.address, sl
    from tbl_user inner join tbl_order on tbl_user.user_id = tbl_order.user_id
        inner join tab on tab.user_id = tbl_user.user_id
    ;";

    $result = mysqli_query($con, $sql);
    $list_order = array();
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($list_order, $row);
        }
    }
    return $list_order;
}
?>