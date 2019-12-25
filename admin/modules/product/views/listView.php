<?php
    get_header();
    global $active, $none;
    foreach($product as $item)
    {
        $item["product_status"] == 1? $active ++ : $none ++;
    }
?>

<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="?mod=product&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="thanh"><?php echo error("search") ?></div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><span href="">Tất cả <span class="count">(<?php echo count($product) ?>)</span></span> |</li>
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
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody id = "content1">

                            <?php 
                            $i = 1;
                                if(!empty($product) && is_array($product))
                                {
                                    foreach($product as $item)
                                {
                            ?>
                                <tr id="product-<?php echo $item["code"]?>">
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $i ?></h3></span>
                                    <td><span class="tbody-text"><?php echo $item["code"] ?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $item["image"] ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $item["product_name"] ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="?mod=product&action=update&id=<?php echo $item["id"] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><p title="Xóa" url="?mod=product&action=deleteproduct" code= "<?php echo $item["code"] ?>" class="delete1"><i class="fa fa-trash" aria-hidden="true"></i></p></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo currency_format($item["price"]) ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["category_name"] ?></span></td>
                                    <td><span pid="<?php echo $item["id"] ?>" ul ="?mod=product&action=productstatus" class="tbody-text status <?php echo $item["product_status"] == 1? "active" :""?>"><?php echo $item["product_status"] == 1? 'Hiển thị' : 'Không'?></span></td>
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
                    <ul id="list-paging" class="fl-right">
                        <li>
                           <p url="?mod=product&action=pagproduct" id ="prev" class = "btn btn-success " style = "cursor: pointer">Previous</p>
                        </li>
                        <li>
                        <p url="?mod=product&action=pagproduct" id = "next" class = "btn btn-success" style = "cursor: pointer">Next</p>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>