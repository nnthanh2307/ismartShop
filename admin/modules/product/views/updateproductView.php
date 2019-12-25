<?php
    get_header();

    //    echo "<pre>";
    // print_r($product);
    // echo "</pre>";
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật sản phẩm | <?php echo $product["product_name"] ?></h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name" value="<?php echo $product["product_name"] ?>">
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product_code" id="product-code" value="<?php echo $product["code"] ?>">
                        <label for="price">Giá sản phẩm</label>
                        <input type="number" name="price" id="price" value="<?php echo $product["price"] ?>">
                        <label for="showprice">Giá hiển thị</label>
                        <input type="number" name="showprice" id="showprice" value="<?php echo $product["price_show"] ?>">
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc"></textarea>
                        <label for="detail">Chi tiết</label>
                        <textarea name="detail" id="detail" class="ckeditor"></textarea>
                        <label>Hình ảnh</label>
                        <input type="text" name="linkimage" id="linkimage" value="<?php echo $product["image"] ?>">
                        <div id="uploadFile">
                            <input type="file" name="file" id="file">
                            <span class="btn btn-info" style="padding: 10px; border-radius: 4px " id="uploadimage">upload anh</span>
                            <div id= "showimage">
                                <img src="<?php echo $product["imgage"] ?>">
                            </div>
                        </div>
                        <label>Danh mục sản phẩm</label>
                        <select name="parrent">
                            <option value="<?php echo $product["category_id"] ?>"><?php echo $product["category_name"] ?></option>
                            <?php dequy1($listProductCat); ?>
                        </select>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="<?php echo $product["product_status"] ?>"><?php echo $product["product_status"]==1? "Đã đăng" : "Chờ duyệt" ?></option>
                            <option value="0">Chờ duyệt</option>
                            <option value="1">Đã đăng</option>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>