<?php
    get_header();
    global $active, $none;
    foreach($listPage as $item)
    {
        $item["page_status"] == 1? $active++ : $none++;
    }
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">           
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách trang</h3>
                    <a href="?page=add_page" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>            
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all3"><span href="">Tất cả (<?php echo count($listPage) ?>)</span> |</li>
                            <li class="publish3"><span href="">Đã đăng (<?php echo $active > 0 ? "$active": 0?>)</span> |</li>
                            <li class="pending3"><span href="">Chờ xét duyệt (<?php echo $none > 0 ? "$none": 0?>)</span></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                 
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Slug</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                                if(!empty($listPage) && is_array($listPage))
                                {
                                    foreach($listPage as $item)
                                    {                   
                            ?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $i ?></h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $item["page_title"] ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="?mod=page&action=updatepage&pageid=<?php echo $item["page_id"] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><span title="Xóa" item ="<?php echo $item["page_id"] ?>" class="pagedelete"><i class="fa fa-trash" aria-hidden="true"></i></span></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $item["page_slug"] ?></span></td>
                                    <td><span ul ="?mod=page&action=pagestatus"  class="tbody-text status <?php echo $item["page_status"] == 1? " active" : " hiden" ?>"><?php echo $item["page_status"] == 1? "Hiển thị": "Không" ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["page_created"] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["page_time"] ?></span></td>
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
        </div>
    </div>
</div>
<?php 
    get_footer();
?>