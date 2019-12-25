<?php 
    get_header();




?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="category">Tên danh mục</label> <?php echo error("category") ?>
                        <input type="text" name="category" id="category" >
                        <label for="title">Slug ( Friendly_url )</label> <?php echo error("slug") ?>
                        <input type="text" name="slug" id="slug">
                        <label>Danh mục cha</label>
                        <select name="parrent">
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