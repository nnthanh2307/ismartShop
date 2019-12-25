<?php
    get_header(); 
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                  
                </div>
                <?php if(!empty($num)) echo "<p class='error'>Tìm thấy {$num} tìm kiếm cho \"{$search}\"</p>"; ?>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><span href="">Tất cả (<span class="span"> <?php echo count($listOrder) >= 0? count($listOrder) : '0' ?> </span>)</span> |</li>
                            <li class="pending"><span href="">Chờ duyệt (<span class ="span"><?php echo $num0 ?></span>)</span> |</li>
                            <li class="transport"><span href="">Đang vận chuyển (<span class ="span"><?php echo $num1 ?></span>)</span> |</li>
                            <li class="success"><span href="">Thành công(<span class ="span"><?php echo $num2 ?></span>)</span></li>
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="search" id="s">
                            <input type="submit" name="btn" value="Tìm kiếm">
                        </form>
                    </div>
                 
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã đơn hàng</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số sản phẩm</span></td>
                                    <td><span class="thead-text">Tổng giá</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Chi tiết</span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                if(!empty($listOrder))
                                {
                                    $i = 1;
                                    foreach($listOrder as $item)
                                    {
                            ?>
                             <tr id="item-<?php echo $item['order_id']?>">
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $i; ?></h3></span>
                                    <td><span class="tbody-text"><?php echo $item["order_id"] ?></h3></span>
                                    <td>
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $item["full_name"] ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                       
                                            <li><p item="<?php echo $item["order_id"] ?>" title="Xóa" class="odelete"><i class="fa fa-trash" aria-hidden="true"></i></p></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $item["num_order"] ?></span></td>
                                    <td><span class="tbody-text"><?php echo currency_format($item["total"]) ?></span></td>
                                    <td><span class="tbody-text"><?php if($item["order_status"] == 0 ) {echo "Chờ duyệt"; } else if($item["order_status"] == 1){echo "Vận chuyển";} else {echo "Thành công";} ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["order_time"] ?></span></td>
                                    <td><a href="?mod=checkout&action=detail&orderid=<?php echo $item["order_id"] ?>" title="" class="tbody-text">Chi tiết</a></td>
                                </tr>
                            <?php
                                    }
                                }
                            ?>
                               
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