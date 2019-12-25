<?php
    get_header();
    $none = 0;
    $active = 0;
    foreach($listProduct as $item)
    {
        $item["product_status"] == '1' ? $active++ : $none++;
    }
    foreach ($listSlider as $item)
    {
        $item["slider_status"] == '1' ? $active++ : $none++;
    }
?>

<div id="main-content-wp" class="list-product-page list-slider">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách Media</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo count($listSlider) + count($listProduct) ?>)</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(<?php echo $active ?>)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt<span class="count">(<?php echo $none ?>)</span></a></li>
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="search" id="s">
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
                                    <td><span class="thead-text">Tên Hình ảnh</span></td>
                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                              $i = 1;
                                if(is_array($listSlider) && !empty($listSlider))
                                {
                                    foreach($listSlider as $item)
                                    {
                            ?>
                                   <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $i ?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $item["slider_img"] ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $item["slider_name"] ?></a>
                                        </div>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $i ?></span></td>
                                    <td><span class="tbody-text <?php echo $item["slider_status"] == 1?" active": "" ?>"><?php echo $item["slider_status"] == 1?"Hiển thị": "Không" ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["slider_created"] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["slider_time"] ?></span></td>
                                </tr>                          
                            <?php
                            $i++;
                                }
                                }
                            ?>
                             <?php
                                if(is_array($listProduct) && !empty($listProduct))
                                {
                                    foreach($listProduct as $item)
                                    {
                            ?>
                                   <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $i ?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $item["image"] ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $item["product_name"] ?></a>
                                        </div>

                                    </td>
                                    <td><span class="tbody-text"><?php echo $i ?></span></td>
                                    <td><span class="tbody-text <?php echo $item["product_status"] == 1?" active": "" ?>"><?php echo $item["product_status"] == 1?"Hiển thị": "Không" ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["product_created"] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["product_time"] ?></span></td>
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
                    <!-- <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    get_footer();
?>