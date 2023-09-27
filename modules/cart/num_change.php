<?php 

$item = get_product_info_by_proid($_POST['id']);
$price = getPrice($item);
$subtotal = currency_format($price * $_POST['num_order']);

update_num_order($_POST['num_order'], $_POST['id']);
$total = get_total_cart();

$total_format = currency_format($total);

$result = array(
    'subtotal' => $subtotal,
    'total_format' => $total_format,
    'total' => $total

);
echo json_encode($result);
?>