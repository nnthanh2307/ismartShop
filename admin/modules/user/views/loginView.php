
<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="public/css/login.css">
    </head>
    <body>

        <div class="login">
            <h1>Đăng nhập</h1>
            <form action="" method="post">
                <input type="text" name = "username" placeholder="Username">
                <?php echo error("username") ?>
                <input type="password" name = "password" placeholder="Password">
                <p><?php echo error("password") ?></p>
                <input type="checkbox" name ="remember" > Ghi nhớ đăng nhập
                
                <input type="submit" name = "submit" value = "Đăng nhập">        
            <a href="index.php" class = "repass">Trở về trang chủ?</a>
        </div>
        
    </body>
</html>
