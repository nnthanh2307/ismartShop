<?php 
    get_header();
    global $active, $non;
    foreach($listSlider as $item)
    {
        if($item["slider_status"] == 1)
        {
            $active ++;
        }
        else
        {
            $non ++;
        }
    }
?>
<div id="main-content-wp" class="list-product-page list-slider">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách slider</h3>
                    <a href="?mod=slider&action=addslider" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all1"><span href="">Tất cả <span class="count">(<?php echo count($listSlider) ?>)</span></span> |</li>
                            <li class="publish1"><span href="">Đã đăng <span class="count">(<?php echo $active ?>)</span></span> |</li>
                            <li class="pending1"><span href="">Chờ xét duyệt<span class="count">(<?php echo $non > 0 ? "$non": "0" ?>)</span></span></li>
                           
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="search" id="search">
                            <input type="submit" name="btn-search" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Link</span></td>
                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody id="content1">

                            <?php 
                            $i = 1;
                                if(is_array($listSlider) && !empty($listSlider))
                                {
                                    foreach($listSlider as $item)
                                    {   
                            ?>
                                <tr id = "item-<?php echo $item["id"] ?>">
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $i ?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $item["slider_img"] ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $item["slug"] ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="?mod=slider&action=update&id=<?php echo $item["id"] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><span href="" title="Xóa" item="<?php echo $item["id"] ?>" class="sliderdelete"><i class="fa fa-trash" aria-hidden="true"></i></span></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $item["slider_order"] ?></span></td>
                                    <td><span pid="<?php echo $item["id"] ?>" ul ="?mod=slider&action=updatestatus" class="tbody-text status <?php echo $item["slider_status"] == 1? "active": "hiden" ?>"><?php echo $item["slider_status"] == 1? "Hiển thị": "Không" ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["slider_created"] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["slider_time"]?></span></td>
                                </tr>
                            <?php
                                $i++;
                                    }
                                }
                            ?>  
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <ul id="list-paging" class="fl-right">
                        <li>
                           <p url="?mod=slider&action=pagslider" id ="prevslider" class = "btn btn-success " style = "cursor: pointer">Previous</p>
                        </li>
                        <li>
                        <p url="?mod=slider&action=pagslider" id = "nextslider" class = "btn btn-success" style = "cursor: pointer">Next</p>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();
?>