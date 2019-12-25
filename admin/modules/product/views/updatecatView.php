<?php
    get_header();
    // echo "<pre>";
    // print_r($listProductCat);
    // echo "</pre>";

    // function dequy1($listProductCat, $parrent_id = 0, $char = '')
    // {
    //     foreach($listProductCat as $key => $item)
    //     {
    //         if($item["parrent_id"] == $parrent_id)
    //         {
    //             echo " <option value='{$item["category_id"]}'>";
    //             echo $char.$item["category_name"];
    //             echo "</option>";
    //             unset($listProductCat[$key]);
    //             dequy1($listProductCat, $item["category_id"], $char.'--/');
    //         }
    //     }

    // }
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa danh mục sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                    <?php echo error("productcat"); ?>
                        <label for="category">Tên danh mục</label> <?php echo error("category"); ?>
                        <input type="text" name="category" id="category" value = "<?php echo $cat["category_name"] ?>" >
                        <label for="title">Slug ( Friendly_url )</label> <?php echo error("slug"); ?>
                        <input type="text" name="slug" id="slug"  value = "<?php echo $cat["slug"]?>">
                        <label>Danh mục cha</label>
                        <select name="parrent">
                            <option value="<?php echo $cat["parrent_id"] ?>"></option>
                            <option value="">--Chọn danh mục--</option>
                            <?php dequy1($listProductCat) ?>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>