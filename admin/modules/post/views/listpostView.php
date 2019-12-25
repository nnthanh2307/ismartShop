<?php 
    get_header();
    global $active, $none;
    foreach($listPost as $item)
    {
        $item["post_status"] == 1? $active ++ : $none ++;
    }
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách bài viết</h3>
                    <a href="?mod=post&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all2"><span href="">Tất cả <span class="count">(<?php echo count($listPost) ?>)</span></span> |</li>
                            <li class="publish2"><span href="">Đã đăng <span class="count">(<?php echo $active > 0 ? $active: 0 ?>)</span></span> |</li>
                            <li class="pending2"><span href="">Chờ xét duyệt<span class="count">(<?php echo $none > 0 ? $none: 0 ?>)</span></span></li>
                        </ul>
                    </div>  
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody id = "content1">
                                <?php 
                                    $i = 1;
                                    if(is_array($listPost) && !empty($listPost));
                                    {
                                       
                                        foreach($listPost as $item)
                                        {             
                                ?>
                                  <tr id="item-<?php echo $item["post_id"] ?>">
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $i ?></h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a title="Chỉnh sửa" href="?mod=post&action=updatepost&postid=<?php echo $item["post_id"] ?>" title=""><?php echo $item["post_title"] ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><p title="Xóa" class="postdelete"  item ='<?php echo $item["post_id"] ?>'><i class="fa fa-trash" aria-hidden="true"></i></p></li>
                                        </ul>
                                    </td>
                                    <td><span  class="tbody-text"><?php echo $item["title"] ?></span></td>
                                    <td><span title = "Trạng thái hiển thị" ul='?mod=post&action=poststatus' pid = "<?php echo $item["post_id"] ?>"class="status tbody-text <?php echo $item["post_status"] == 1 ? "active" : " hiden" ?>"><?php echo $item["post_status"] == 1 ? "Hiển thị" : "Không"  ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["post_creat"] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["created_time"] ?></span></td>
                                </tr>
                                <?php
                                $i++; 
                                }
                                    }
                                ?>
                              
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <ul id="list-paging" class="fl-right">
                        <li>
                           <p url="?mod=post&action=pagpost" id ="postprev" class = "btn btn-success " style = "cursor: pointer">Previous</p>
                        </li>
                        <li>
                        <p url="?mod=post&action=pagpost" id = "postnext" class = "btn btn-success" style = "cursor: pointer">Next</p>
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