<?php 
    get_header();
    function dequy2($listPostCat, $parrent_id = 0, $char = '')
    {
        foreach($listPostCat as $key => $item)
        {
            if($item["parrent_id"] == $parrent_id)
            {
                echo "<tr id ='item-{$item["cat_id"]}'><td><span class='tbody-text'>{$item["cat_id"]}</h3></span> </td>
                <td class='clearfix'>
                    <div class='tb-title fl-left'>
                        <a href='?mod=post&action=updatecat&catid={$item["cat_id"]}' title=''>";
                echo $char.$item["title"];
                echo "</a>
                </div> 
                <ul class='list-operation fl-right'>
                   
                    <li><p title='Xóa' class='delete' item='{$item["cat_id"]}'><i class='fa fa-trash' aria-hidden='true'></i></p></li>
                </ul>
            </td>";
                echo "<td><span class='tbody-text'>{$item["parrent_id"]}</span></td>";
                
                echo "<td><span class='tbody-text";
                echo $item["status"] == 1?" active": " hiden";
                echo " status' ul='?mod=post&action=catstatus' pid='{$item["cat_id"]}'>";
                echo $item["status"] == 1 ? 'Hiển thị' : 'Không' ;
                echo "</span></td>
                <td><span class='tbody-text'>{$item["ccreated_at"]}</span></td>
                <td><span class='tbody-text'>{$item["ccreated_time"]}</span></td>";


            echo "</tr>";
                unset($listPostCat[$key]);
                dequy2($listPostCat, $item["cat_id"], $char.'- - ');
            }
        }

    }

?>

<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="?mod=post&action=addpostcat" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><span href="">Tất cả <span class="count">(0)</span></span> |</li>
                            <li class="publish"><span href="">Đã đăng <span class="count">(0)</span></span> |</li>
                            <li class="pending"><span href="">Chờ xét duyệt<span class="count">(0)</span></span></li>
    
                        </ul>
                    </div>  
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <!-- <td><input type="checkbox" name="checkAll" id="checkAll"></td> -->
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php dequy2($listpostcat) ?>
                            </tbody>
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