<?php
    get_header();
?>

<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm Slider</h3>
                </div>
                <?php echo error("slider") ?>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
               
                    <form method="POST">
                        <label for="title">Tên slider</label> <?php echo error("title") ?>
                        <input type="text" name="title" id="title">
                        <label for="slug">Slug</label> <?php echo error("slug") ?>
                        <input type="text" name="slug" id="slug">
                        <label for="desc">Mô tả</label> <?php echo error("desc") ?>
                        <textarea name="desc" id="desc" class="ckeditor"></textarea>
                        <label for="title">Thứ tự</label> 
                        <input type="text" name="num_order" id="num-order">
                        <label>Hình ảnh</label> <?php echo error("linkimage") ?>
                        <input type="text" name="linkimage" id="linkimage">
                        <div id="uploadFile">
                            <input type="file" name="file" id="file">
                            <span class="btn btn-info" style="padding: 10px; border-radius: 4px " id="uploadimage">upload anh</span>
                            <div id= "showimage">
                                <img src="public/images/img-thumb.png">
                            </div>
                        </div>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="">-- Chọn trạng thái --</option>
                            <option value="1">Hiện thị</option>
                            <option value="0">Chờ duyệt</option>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>