<?php
    get_header()
?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mod=cart" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
            <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>  
            <?php
                            if(!empty($_SESSION["cart"]["buy"]) && is_array($_SESSION["cart"]["buy"]))
                            {
                        ?>
               
                        <?php
                                foreach($listOrder as $item)
                                {
                        ?>
                             <tr>
                                <td><?php echo $item["productCode"] ?></td>
                                <td>
                                    <a href="" title="" class="thumb">
                                        <img src="<?php echo $item["productImage"] ?>" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo $item["url"] ?>" title="" class="name-product"><?php echo $item["productName"] ?></a>
                                </td>
                                <td><?php echo currency_format($item["price"]) ?></td>
                                <td>
                                    <input pid = "<?php echo $item["productID"] ?>" type="number" min = "1" max = "10" name="num-order" value="<?php echo $item["qty"] ?>" class="num-order">
                                </td>
                                <td id = "subTotal-<?php echo $item["productID"] ?>"><?php echo currency_format($item["subTotal"]) ?></td>
                                <td>
                                    <p pid = "<?php echo $item["productID"] ?>" title="Xoá sản phẩm" class="del-product"><i class="fa fa-trash-o"></i></p>
                                </td>
                            </tr>
                        <?php
                                }
                        ?>    
                            
                    </tbody>
                    <?php
                            }
                        ?>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span><?php echo currency_format($_SESSION["cart"]["info"]["total"]) ?></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <a href="?mod=cart&action=checkout" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
           
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Hiện tại có <span><?php echo !empty($_SESSION["cart"]["buy"])?count($_SESSION["cart"]["buy"]):"0" ?></span> sản phẩm trong giỏ. <?php echo !empty($_SESSION["cart"]["buy"])?"Nhấn vào <span> \"Thanh Toán\"</span> để đặt hàng sản phẩm đã chọn":"" ?></p>
                <a href="?page=home" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="?mod=cart&action=delete" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
</div>

<?php 
    get_footer();
?>