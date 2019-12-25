<?php
    get_header();

    function dequy2($listProductCat, $parrent_id = 0, $char = '')
    {
        foreach($listProductCat as $key => $item)
        {
            if($item["parrent_id"] == $parrent_id)
            {
                echo "  <tr id='item-{$item['category_id']}'>
                <td><input type='checkbox' name='checkItem'class='checkItem'></td>
                <td><span class='tbody-text'>1</h3></span>";
                echo " <td class='clearfix'>
                <div class='tb-title fl-left'>
                    <a title ='Sửa danh mục' href='?mod=product&action=updatecat&catid={$item['category_id']}' title=''>{$char}{$item["category_name"]}</a>
                </div></td> ";
                echo " <td><span class='tbody-text'>{$item["category_id"]}</span></td>";
                echo " <td><span title='Thay đổi trạng thái hiển thị' ul='?mod=product&action=catstatus' class='tbody-text status";
                echo ($item["category_status"] == 1)? " active" : " hiden";
                echo"' pid ='{$item["category_id"]}'>";
                echo $item["category_status"] == 1 ? 'Hiển thị':'Không';
                echo "</span></td>";
                echo " <td><span class='tbody-text'>{$item["product_creat"]}</span></td>";
                echo " <td><span class='tbody-text'>{$item["product_time"]}</span></td>";
                echo "<td class = 'clearfix'>
                        <ul class='list-operation'>
                            <li><p href='' title='Xóa' class='productdelete' item='{$item["category_id"]}'><i class='fa fa-trash' aria-hidden='true'></i></p></li>
                        </ul>
                </td>";
                echo "</tr>";
                unset($listProductCat[$key]);
                dequy2($listProductCat, $item["category_id"], $char.'- - ');
            }
        }
    }

    global $active, $none;
    foreach($listProductCat as $item)
    { 
        $item["category_status"] == 1? $active ++: $none ++;
    }
?>

<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="?mod=product&action=addcat" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><span href="">Tất cả <span class="count">(<?php echo count($listProductCat) ?>)</span></span> |</li>
                            <li class="publish"><span href="">Đã đăng <span class="count">(<?php echo $active ?>)</span></span> |</li>
                            <li class="pending"><span href="">Chờ xét duyệt<span class="count">(<?php echo $none ?>)</span></span></li>
    
                        </ul>
                        <form action = "" method="POST" class="form-s fl-right">
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
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Xoá</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php dequy2($listProductCat) ?>
                            </tbody>
                       
                        </table>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>