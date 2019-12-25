<?php
    get_header();
    echo "<pre>";
    echo "</pre>";
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <?php 
                        if(!empty($slider) && is_array($slider))
                        {
                            foreach($slider as $item)
                            {
                    ?>
                        <div class="item">
                            <a href=""><img src="../project/admin/<?php echo $item["slider_img"] ?>" alt=""></a>
                        </div>
                    <?php
                    }
                        }
                    ?>

                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm mới nhất</h3>
                </div>
                <div class="section-detail">
                <ul class="list-item">
                    <?php
                        if(!empty($listNew) && is_array($listNew))
                        {
                            foreach($listNew as $newItem)
                            {
                    ?>
                        
                        <li>
                            <a href="?mod=product&action=detail&productid=<?php echo $newItem["id"] ?>" title="" class="thumb">
                                <img src="<?php echo $newItem["image"] ?>">
                            </a>
                            <a href="?mod=product&action=detail&productid=<?php echo $newItem["id"] ?>" title="" class="product-name"><?php echo $newItem["product_name"] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($newItem["price_show"]) ?></span>
                                <span class="old"><?php echo currency_format($newItem["price"]) ?></span>
                            </div>
                            <div class="action clearfix">
                                <p pid = <?php echo $newItem["id"] ?> title="" class="add-cart fl-left">Thêm giỏ hàng</p>
                                <a href="?mod=cart&action=ordernow&productid=<?php echo $newItem["id"] ?>" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                   
                    <?php
                            }
                        }
                    ?>
                     </ul>
                </div>
            </div>
           <?php
                if(!empty($productCat) && is_array($productCat))
                {
                    foreach($productCat as $item)
                    {
            ?>
                 <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><a href="?mod=product&action=index&cat=<?php echo $item["category_name"] ?>"><?php echo $item["category_name"] ?></a></h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                <?php
                    foreach($product[$item["category_name"]] as $productItem)
                    {
                ?>
                    
                  
                        <li>
                            <a href="?mod=product&action=detail&productid=<?php echo $productItem["id"] ?>" title="" class="thumb">
                                <img src="<?php echo $productItem["image"] ?>">
                            </a>
                            <a href="?mod=product&action=detail&productid=<?php echo $productItem["id"] ?>" title="" class="product-name"><?php echo $productItem["product_name"] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($productItem["price_show"]) ?></span>
                                <span class="old"><?php echo currency_format($productItem["price"]) ?></span>
                            </div>
                            <div class="action clearfix">
                                <p pid ="<?php echo $productItem["id"] ?>" href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</p>
                                <a href="?mod=cart&action=ordernow&productid=<?php echo $productItem["id"] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                   
                <?php
                    }
                ?>
                 </ul>
                </div>
                
            </div>
            <?php
            
                    }
                }
           ?>
           
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                   
                        <?php showCategories($allCat); ?>
                  
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                    <?php
                        if(!empty($bestSell) && is_array($bestSell))
                        {
                            foreach($bestSell as $item)
                            {
                        ?>
                            <li class="clearfix">
                                <a href="?page=detail_product" title="" class="thumb fl-left">
                                    <img src="<?php echo $item["image"] ?>" alt="">
                                </a>
                                <div class="info fl-right">
                                    <a href="?page=detail_product" title="" class="product-name"><?php echo $item["product_name"] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($item["price_show"]) ?></span>
                                        <span class="old"><?php echo currency_format($item["price"]) ?></span>
                                    </div>
                                    <a href="?mod=cart&action=ordernow&productid=<?php echo $item["id"] ?>" title="" class="buy-now">Mua ngay</a>
                                </div>
                            </li>
                        <?php
                            }
                        }
                    ?>
                       
                       
                    </ul>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    get_footer();
?>