<?php
    get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="product-name">Tên sản phẩm</label> <?php echo error("product_name") ?>
                        <input type="text" name="product_name" id="product-name">
                        <label for="product-code">Mã sản phẩm</label> <?php echo error("product_code") ?>
                        <input type="text" name="product_code" id="product-code">
                        <label for="price">Giá sản phẩm</label>  <?php echo error("price") ?>
                        <input type="number" name="price" id="price">
                        <label for="showprice">Giá hiển thị</label>  <?php echo error("showprice") ?>
                        <input type="number" name="showprice" id="showprice">
                        <label for="desc">Mô tả ngắn</label>  <?php echo error("desc") ?>
                        <textarea name="desc" id="desc"></textarea>
                        <label for="detail">Chi tiết</label>  <?php echo error("detail") ?>
                        <textarea name="detail" id="detail" class="ckeditor"></textarea>
                        <label>Hình ảnh</label>  <?php echo error("linkimage") ?>
                        <input type="text" name="linkimage" id="linkimage">
                        <div id="uploadFile">
                            <input type="file" name="file" id="file">
                            <span class="btn btn-info" style="padding: 10px; border-radius: 4px " id="uploadimage">upload anh</span>
                            <div id= "showimage">
                                <img src="public/images/img-thumb.png">
                            </div>
                        </div>
                        <label>Danh mục sản phẩm</label>  <?php echo error("parrent") ?>
                        <select name="parrent">
                            <option value="">-- Chọn danh mục --</option>
                            <?php dequy1($listProductCat); ?>
                        </select>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="">-- Trạng thái --</option>
                            <option value="0">Chờ duyệt</option>
                            <option value="1">Đã đăng</option>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>