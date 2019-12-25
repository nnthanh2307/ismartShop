<?php get_header() ?>

<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Thêm tài khoản</h3>
           
        </div>
    </div>

    <div class="wrap clearfix">

    <?php get_sidebar("admin") ?> 
    
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                <?php echo error("user") ?>
                    <form method="POST">
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="display_name" id="display-name">   <?php echo error("displayName") ?>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username1">    <?php echo error("username") ?>
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" id="password">   <?php echo error("password") ?>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">    <?php echo error("email") ?>
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="phone" id="tel">
                        <label for="address">Địa chỉ</label> <?php echo error("address") ?>
                        <textarea name="address" id="address"></textarea>
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm người dùng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>