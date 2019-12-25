<?php
    get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">      
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST"> 
                        <label for="title">Tiêu đề</label> <?php echo error("title") ?>
                        <input type="text" name="title" id="title" value = "<?php echo $page["page_title"] ?>">
                        <label for="slug">Slug ( Friendly_url )</label> <?php echo error("slug") ?>
                        <input type="text" name="slug" id="slug" value = "<?php echo $page["page_slug"] ?>">
                        <label for="desc">Mô tả</label> <?php echo error("desc") ?>
                        <textarea name="desc" id="desc" class="ckeditor"></textarea>
                        <label>Hình ảnh</label> <?php echo error("linkimage") ?>
                        <input type="text" name="linkimage" id="linkimage" value = "<?php echo $page["page_image"] ?>">
                        <div id="uploadFile">
                            <input type="file" name="file" id="file">
                            <span class="btn btn-info" style="padding: 10px; border-radius: 4px " id="uploadimage">upload anh</span>
                            <div id= "showimage">
                                <img src="public/images/img-thumb.png">
                            </div>
                        </div>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>