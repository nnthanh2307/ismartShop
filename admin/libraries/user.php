<?php
  global $error, $username, $password, $repassword, $fullname, $email, $data;
if(isset($_POST["submit"]))
{
    if(!empty($_POST["username"]))
    {
       if(checkUsername($_POST["username"]))
       {
           $username = $_POST["username"];
           
       }
       else
       {
           $error["username"] = "username bao gồm chữ và số có độ dài từ 6-32 ký tự";
       }
    }
    else
    {
        $error["username"] = "Username not empty";
    }

    if(!empty($_POST["password"]))
    {
       if(checkPassword($_POST["password"]))
       {
           $password = md5($_POST["password"]);
       }
       else
       {
           $error["password"] = "Bạn cần nhập lại password.";
       }
    }
    else
    {
        $error["password"] = "Password not empty.";
    }

    if(!empty($_POST["repassword"]))
    {
       if(checkPassword($_POST["repassword"]))
       {
           $repassword = md5($_POST["repassword"]);
       }
       else
       {
           $error["repassword"] = "Bạn cần nhập lại password.";
       }
    }
    else
    {
        $error["repassword"] = "Password not empty.";
    }

    if($password !== $repassword)
    {
        $error["password"] = "Password khong trung nhau";
    }

    if(!empty($_POST["fullname"]))
    {
        $fullname = $_POST["fullname"];
    }
    else
    {
        $error["fullname"] = "Fullname not empty";
    }
    if(!empty($_POST["email"]))
    {
        $email = $_POST["email"];
    }
    else
    {
        $error["email"] = "Email not empty";   
    }

    if(empty($error))
    {
        $token = md5($username.time());
    
        if(!userExists($username, $email))
        {
            $data = array(
                "fullname" => $fullname,
                "username" => $username,
                "password" => $password,
                "email" => $email,
                "token" => $token
            );

            $linkActive = base_url("?mod=user&controller=index&action=active&token={$token}");
            $content = "<p>Chào {$fullname}! Bạn vui lòng click vào đường link này để active tài khoản: {$linkActive}</p>";
            sendMail($email,$fullname,"Kích hoạt tài khoản", $content);
            addUser($data);
        }
        else
        {
            $error["account"] ="Username or email exists";
        }
    }
}

?>