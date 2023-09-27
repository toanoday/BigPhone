<?php 
if (isset($_SESSION['user_id'])) {
    $list_product_in_cart = get_list_product_in_cart($_SESSION['user_id']);
    $num = get_num_pro_in_cart();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> BigPhone </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/custom.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="public/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner" id="header-top">
                            <ul class="header_social">
                                <li class="social_item">
                                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                                </li>
                                <li class="social_item">
                                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li class="social_item">
                                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                                </li>
                                <li class="social_item">
                                    <a href=""><i class="fa-brands fa-tiktok"></i></a>
                                </li>
                            </ul>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="?" title="">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="?mod=product&act=main" title="">Sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="?mod=blog&act=main" title="">Blog</a>
                                    </li>
                                    <li>
                                        <a href="?mod=about&act=main" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="?mod=blog&act=detail" title="">Liên hệ</a>
                                    </li>
                                    <li>
                                        <?php if (is_login()) { ?>
                                            <div class="show_user">
                                            <i class="fa-solid fa-user"></i>
                                            <p><?php if (is_login()) user_login(); ?></p>
                                            </div>
                                            <?php if (!is_admin()) { ?>
                                                <ul class="menuuser_sub">
                                                    <li class="menuuser_sub_item">
                                                        <a class="menuuser_sub_link" href="?mod=account&act=detail" title="">Thông tin user</a>
                                                    </li>
                                                    <li class="menuuser_sub_item">
                                                        <a class="menuuser_sub_link" href="?mod=cart&act=list_product" title="">Đơn mua</a>
                                                    </li>
                                                    <li class="menuuser_sub_item">
                                                        <a class="menuuser_sub_link" href="?mod=account&act=logout" title="">Đăng xuất</a>
                                                    </li>
                                                </ul>
                                            <?php } else { ?>
                                                <ul class="menuuser_sub">
                                                    <li class="menuuser_sub_item">
                                                        <a class="menuuser_sub_link" href="?mod=account&act=detail" title="">Thông tin user</a>
                                                    </li>
                                                    <li class="menuuser_sub_item">
                                                        <a class="menuuser_sub_link" href="admin" title="">Quản lý cửa hàng</a>
                                                    </li>
                                                    <li class="menuuser_sub_item">
                                                        <a class="menuuser_sub_link" href="?mod=account&act=logout" title="">Đăng xuất</a>
                                                    </li>
                                                </ul>
                                            <?php }?>
                                        <?php
                                        }
                                        else { ?>
                                            <div class="show_user">
                                            <a style="color: black; " class="menuuser_sub_link" href="?mod=account&act=login" title="">Đăng nhập</a>
                                        <?php
                                        }
                                        ?>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="?" title="" id="logo" class="fl-left"><img src="public/images/BigPhone-2.png"></a>
                            <div id="search-wp" class="fl-left">
                                <form method="POST" action="?mod=product&act=search">
                                    <input type="text" name="info" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                    <button type="submit" id="sm-s" name="btn-search">Tìm kiếm</button>
                                </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">024 3765 5121</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="?mod=cart&act=main" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">2</span>
                                </a>

                                <!-- // Giỏ hàng  -->
                                <div id="cart-wp" class="fl-right">
                                    <?php if (isset($_SESSION['user_id'])) {?> 
                                        <div id="btn-cart">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <span id="num"><?= $num; ?></span>
                                        </div>
                                        <div id="dropdown">
                                            <p class="desc">Có <span><?= $num; ?> sản phẩm</span> trong giỏ hàng</p>
                                            <ul class="list-cart">
                                            <?php
                                                foreach($list_product_in_cart as $item){
                                                ?>
                                                <li class="clearfix">
                                                    <a href="" title="" class="thumb fl-left">
                                                        <img src="<?php echo $item['pro_image'] ?>" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="" title="" class="product-name"><?php echo $item['pro_name'] ?></a>
                                                        <p class="price"><?php echo currency_format($item['promotional_price']>0 ? $item['promotional_price']:$item['original_price']); ?></p>
                                                        <p class="qty">Số lượng: <span><?php echo $item['quantity'] ?></span></p>
                                                    </div>
                                                </li>
                                                <?php }?>
                                            </ul>
                                            <div class="total-price clearfix">
                                                <p class="title fl-left">Tổng:</p>
                                                <p class="price fl-right"><?= currency_format(get_total_cart()); ?></p>
                                            </div>
                                            <dic class="action-cart clearfix">
                                                <a href="?mod=cart&act=main" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                                <a href="?mod=cart&act=checkout" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                            </dic>
                                        </div>
                                    <?php } else {?>
                                        <div id="btn-cart">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <span id="num">0</span>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="head-top-1" class="clearfix-1">
                        <div class="wp-inner-1" id="header-top-1">
                            <div id="main-menu-wp-1" class="fl-right-1">
                                <ul id="main-menu-1" class="clearfix-1">
                                    <li>
                                        <a href="?mod=product&act=main&cat_id=1" title="Điện thoại">
                                            <i class="fas fa-mobile-alt"></i> Điện thoại
                                        </a>
                                    </li>
                                    <li>
                                        <a href="?mod=product&act=main&cat_id=2" title="Máy tính bảng">
                                            <i class="fas fa-tablet-alt"></i> Máy tính bảng
                                        </a>
                                    </li>
                                    <li>
                                        <a href="?mod=product&act=main&cat_id=0" title="Laptop">
                                            <i class="fas fa-laptop"></i> Laptop
                                        </a>
                                    </li>
                                    <li>
                                        <a href="?mod=product&act=main&cat_id=11" title="PC">
                                            <i class="fas fa-desktop"></i> PC
                                        </a>
                                    </li>
                                    <li>
                                        <a href="?mod=product&act=main&cat_id=4" title="Phụ kiện">
                                            <i class="fas fa-headphones"></i> Phụ kiện
                                        </a>
                                    </li>
                                    <li>
                                        <a href="?mod=product&act=main&cat_id=10" title="Smart TV">
                                            <i class="fas fa-tv"></i> Smart TV
                                        </a>
                                    </li>
                                    <li>
                                        <a href="?mod=product&act=main&cat_id=8" title="Smartwatch">
                                            <i class="fas fa-clock"></i> Smartwatch
                                        </a>
                                    </li>
                                    <li>
                                        <a href="?mod=product&act=main&cat_id=9" title="Smart Home">
                                            <i class="fas fa-home"></i> Smart Home
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>







                </div>