<?php
    get_header();
    // echo "<pre>";
    // print_r($allCat);
    // echo "</pre>";
   

?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href=""><?php  echo !empty($parent["category_name"])? $parent["category_name"]: '' ; ?></a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo empty($_GET["cat"])?"":$_GET["cat"] ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php echo isset($_GET["cat"])? $_GET["cat"]: "Tất cả sản phẩm" ?></h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị <?php echo count($listProduct) ?> trên 50 sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select" id ="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="4">Giá thấp lên cao</option>
                                </select>
                                <input type="submit" name = submit value = "Lọc">
                             
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                    <?php 
                        if(!empty($listProduct) && is_array($listProduct))
                        {
                            foreach ($listProduct as $item)
                            {
                    ?>
                            <li>
                                <a href="?mod=product&action=detail&productid=<?php echo $item["id"] ?>" title="" class="thumb">
                                    <img src="<?php echo $item["image"] ?>">
                                </a>
                               
                                <a href="?mod=product&action=detail&productid=<?php echo $item["id"] ?>" title="" class="product-name"><?php echo $item["product_name"] ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency_format($item["price_show"]) ?></span>
                                    <span class="old"><?php echo currency_format($item["price"]) ?></span>
                                </div>
                                <div class="action clearfix">
                                    <p pid = <?php echo $item["id"] ?> href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</p>
                                    <a href="?mod=cart&action=ordernow&productid=<?php echo $item["id"] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>    
                    <?php
                            }
                        }
                    ?>
                    </ul>
                </div>
            </div>
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
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Bộ lọc</h3>
                </div>
                <div class="section-detail">
                   
                        <div class="filter_price">
                            <table>
                                <thead>
                                    <tr>
                                        <td colspan="2">Giá</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="radio" name="r-price" value="1"></td>
                                        <td>Dưới 500.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-price" value="2"></td>
                                        <td>500.000đ - 1.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-price" value="3"></td>
                                        <td>1.000.000đ - 5.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-price" value="4"></td>
                                        <td>5.000.000đ - 10.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-price" value="5"></td>
                                        <td>Trên 10.000.000đ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                     <?php 
                        if(empty($_GET["cat"]))
                        {
                    ?>
                           <table class="filter_brand">
                            <thead>
                                <tr>
                                    <td colspan="2">Hãng</td>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                foreach($allCat as $item)
                                {
                                    if($item["parrent_id"] != 0)
                                    {
                            ?>
                                 <tr>
                                        <td><input type="checkbox" name="r-brand" value=<?php echo $item["category_name"] ?>></td>
                                        <td><a href="?mod=product&action=index&cat=<?php echo $item["category_name"] ?> &child=1"><?php echo $item["category_name"] ?></a></td>
                                    </tr>
                            <?php
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    <?php
                        }
                     ?>
         
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_product" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>