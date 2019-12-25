

<?php get_header() ?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Chỉnh sửa bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" value = "<?php echo $post["post_title"] ?>">
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug"  value = "<?php echo $post["slug"] ?>">
                        <label for="desc">Mô tả ngắn</label>
                        <input type="text" name="desc" id="desc"  value = "<?php echo $post["post_desc"] ?>">
                        <label for="detail">Mô tả ngắn</label>
                        <textarea name="detail" id="detail" class="ckeditor"></textarea>
                        <label>Link or File</label>
                        <input type="text" name="linkimage" id="linkimage"  value = "<?php echo $post["image"] ?>">
                       
                        <div id="uploadFile">
                            <input type="file" name="file" id="file">
                            <p id="uploadimage">upload anh</p>
                            <div id= "showimage">
                                <img src="<?php echo $post["image"] ?>">
                            </div>
                        </div>
                        <label>Danh mục cha</label>
                        <select name="postcat">
                            <option value="<?php echo $post["post_cat"] ?>">-- Chọn danh mục --</option>
                           <?php dequy($listPostCat) ?>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>