<?php get_header() ?>

<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Thay đổi mật khẩu</h3>
        </div>
    </div>
    <div class="wrap clearfix">

    <?php get_sidebar("admin") ?> 
    
 
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                      
                        <label for="username1">Tên đăng nhập</label>
                        <input type="text" name="username" id="username1"> <?php echo error("username") ?>
                        <label for="password">Mật khẩu mới</label>
                        <input type="password" name="password" id="password">   <?php echo error("password") ?>
                        <label for="repassword">Nhập lại mật khẩu</label>
                        <input type="password" name="repassword" id="repassword">   <?php echo error("repassword") ?>
                       
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>