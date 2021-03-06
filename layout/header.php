<!DOCTYPE html>
<html>
    <head>
        <title>ISMART STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="public/js/pagging.js" type="text/javascript"></script>
        <script src="public/js/cart.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="?mod=home" title="">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="?mod=product" title="">Sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="?mod=news&action=index" title="">News</a>
                                    </li>
                                    <li>
                                        <a href="https://uet.vnu.edu.vn/" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="?page=detail_blog" title="">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="?mod=home" title="" id="logo" class="fl-left"><img src="public/images/logo.png"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="POST" action="?mod=home&action=search">
                                    <input type="text" name="search" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                    <button type="submit" id="sm-s">Tìm kiếm</button>
                                </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">0987.654.321</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="?mod=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">2</span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num"><?php echo !empty($_SESSION["cart"]["buy"])?count($_SESSION["cart"]["buy"]): "0" ?></span>
                                    </div>
                                    <div id="dropdown">
                                        <p class="desc">Có <span><?php echo !empty($_SESSION["cart"]["buy"])?count($_SESSION["cart"]["buy"]): "0" ?> sản phẩm</span> trong giỏ hàng</p>
                                        <ul class="list-cart">
                                            <?php 
                                                if(!empty($_SESSION["cart"]["buy"]) && is_array($_SESSION["cart"]["buy"]))
                                            {
                                            ?>
                                               
                                                <?php
                                                    foreach($_SESSION["cart"]["buy"] as $item)
                                                    {
                                                ?>
                                                 <li class="clearfix">
                                                    <a href="<?php echo $item["url"] ?>" title="" class="thumb fl-left">
                                                        <img src="<?php echo $item["productImage"] ?>" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="" title="" class="product-name"><?php echo $item["productName"] ?></a>
                                                        <p class="price"><?php echo currency_format($item["price"]) ?></p>
                                                        <p class="qty">Số lượng: <span><?php echo $item["qty"] ?></span></p>
                                                    </div>
                                                </li>
                                                <?php
                                                    }
                                                ?>
                                                
                                            <?php
                                            } 
                                            ?>  
                                            </ul>      
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right"><?php echo !empty($_SESSION["cart"]["buy"])?currency_format($_SESSION["cart"]["info"]["total"]):"0đ" ?></p>
                                        </div>
                                        <dic class="action-cart clearfix">
                                            <a href="?mod=cart" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="?mod=cart&action=checkout" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </dic>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>