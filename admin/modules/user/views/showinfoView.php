<?php
    get_header();
?>

<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Nhóm quản trị</h3>
        </div>
    </div>
    <div class="wrap clearfix">

    <?php get_sidebar("admin") ?>

        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách quản trị viên</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Username</span></td>
                                    <td><span class="thead-text">Full Name</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Phone</span></td>
                                    <td><span class="thead-text">Role</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody id ='noidung'>
                                <?php
                                    if(is_array($listUser))
                                     {
                                         foreach($listUser as $item)
                                         {
                                    ?>
                                <tr id="<?php echo "user".$item["user_id"] ?>">
                                    <td><span class="tbody-text"><?php echo $item["user_id"] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["username"] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["fullname"] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["email"] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["phone"] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item["role"] ?></span></td>
                                    <td>
                                        <span class="tbody-text"><?php echo $item["created_date"] ?></span>
                                        <ul class="list-operation fl-right">
                                            <li><span uid ="<?php echo $item["user_id"] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></span></li>
                                        </ul>
                                    </td>
                                   
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
