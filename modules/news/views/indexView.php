<?php
    get_header();
?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">News</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item" id = "content1">

                    <?php
                        if(!empty($listPost) && is_array($listPost))
                        {
                            foreach($listPost as $item)
                            {
                    ?>
                          <li class="clearfix">
                            <a href="?mod=news&action=detailpost&postid=<?php echo $item["post_id"] ?>" title="" class="thumb fl-left">
                                <img src="../project/admin/<?php echo $item["image"] ?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?mod=news&action=detailpost&postid=<?php echo $item["post_id"] ?>" title="" class="title"><?php echo $item["post_title"] ?></a>
                                <span class="create-date"><?php echo $item["created_time"] ?></span>
                                <p class="desc"><?php echo $item["post_desc"] ?></p>
                            </div>
                        </li>
                    <?php
                        }
                        }
                    ?>
                      
                      
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span id = "prev" title="Trang trước">Prev</span>
                        </li>
                        <li>
                            <span id = "next" title="Trang sau">Next</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
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
                    <a href="?page=detail_blog_product" title="" class="thumb">
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