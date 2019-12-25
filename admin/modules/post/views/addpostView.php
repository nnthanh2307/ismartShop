<?php get_header() ?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tiêu đề</label> <?php echo error("title") ?>
                        <input type="text" name="title" id="title"> 
                        <label for="slug">Slug ( Friendly_url )</label> <?php echo error("slug") ?>
                        <input type="text" name="slug" id="slug">
                        <label for="desc">Mô tả ngắn</label> <?php echo error("desc") ?>
                        <input type="text" name="desc" id="desc">
                        <label for="detail">Chi tiết bài viết</label> <?php echo error("detail") ?>
                        <textarea name="detail" id="detail" class="ckeditor"></textarea>
                        <label>Link or File</label> <?php echo error("linkimage") ?>
                        <input type="text" name="linkimage" id="linkimage">
                       
                        <div id="uploadFile">
                            <input type="file" name="file" id="file">
                            <p id="uploadimage">upload anh</p>
                            <div id= "showimage">
                                <img src="public/images/img-thumb.png">
                            </div>
                        </div>
                        <label>Danh mục cha</label>
                        <select name="postcat">
                            <option value="">-- Chọn danh mục --</option>
                            <?php dequy($listPostCat) ?>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>