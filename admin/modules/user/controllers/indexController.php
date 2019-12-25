<?php

    function construct()
    {
        load_model("index");
    }
    function indexAction()
    {
        $username = $_SESSION["username"];
        
        global $error, $fullname, $email, $phone, $address;
        if(isset($_POST["btn-submit"]))
        {
           if(!empty($_POST["display-name"]))
           {
                $fullname = $_POST["display-name"];
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
               $error["email"] ="Email not empty";
           }

           if(!empty($_POST["tel"]))
           {
               $phone = $_POST["tel"];
           }
           else
           {
               $error["phone"] ="Phone not empty";
           }

           if(!empty($_POST["address"]))
           {
               $address = $_POST["address"];
           }
           else
           {
               $error["address"] ="address not empty";
           }

           if(empty($error))
           {
               $data = array(
                   "fullname" => $fullname,
                   "email" => $email,
                   "phone" => $phone,
                   "address" => $address
               );
               updateUser($username, $data);
           }
        }
        $data["user"]  = getUser($username);
        load_view("index", $data);
    }

    function adduserAction()
    {
        load("helper", "validation");
        global $error, $username, $displayName, $phone, $address, $email, $password;
        if(isset($_POST["btn-submit"]))
        {
           if(!empty($_POST["display_name"]))
           {
               $displayName = $_POST["display_name"];
           }
           else
           {
               $error["displayName"] = "Display Name not empty";
           }

           if(!empty($_POST["username"]))
           {
               if(checkUsername($_POST["username"]))
               {
                   $username = $_POST["username"];
               }
               else
               {
                   $error["username"] = "Username không đúng định dạng";
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
                   $error["password"] = "Password không đúng định dạng";
               }
           }
           else
           {
            $error["password"] = "Password not empty";
           }

           if(!empty($_POST["email"]))
           {
               $email = $_POST["email"];
           }
           else
           {
               $error["email"] = "Email not empty";
           }
           
           if(!empty($_POST["address"]))
           {
               $address = $_POST["address"];
           }
           else
           {
               $error["address"] = "Address not empty";
           }

           if(!empty($_POST["phone"]))
           {
               $phone = $_POST["phone"];
           }
           else
           {
               $error["phone"] = "Phone not empty";
           }

           
            if(empty($error))
            {
            if(checkUser($username, $email))
            {
                $error["user"] = "User đã tồn tại";
            }
            else
            {
                $data = array(
                    "fullname" => $displayName,
                    "username" => $username,
                    "password" => $password,
                    "phone" => $phone,
                    "email" => $email,
                    "address" => $address
                );
                addUser($data);
                
            }
        }
        }
        load_view("add");
    }

    function loginAction()
    {
        load("helper", "validation");
        load("helper", "url");
        global $error, $username, $password;
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
                    $error["username"] = "Username không đúng định dạng";
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
                    $error["password"] = "Password không đúng định dạng";
                }
            }
            else
            {
                $error["password"] = "Password not empty";
            }
        }
        if(empty($error))
        {
            $baseUrl = base_url();
            if(checkLogin($username, $password))
            {
                $_SESSION["isLogin"] = true;
                $_SESSION["username"] = $username;
                header("location: {$baseUrl}");
            }
        }
        load_view("login");
    }
    function changepassAction()
    {
        load("helper","validation");
        global $error, $username, $password, $repassword;
        if(isset($_POST["btn-submit"]))
        {
            if(!empty($_POST["username"]))
            {
                if(checkUsername($_POST["username"]))
                {
                    $username = $_POST["username"];
                }
                else
                {
                    $error["username"] = "Username không dúng định dạng";
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
                    $error["password"] = "Password không đúng định dạng";
                }
            }
            else
            {
                $error["password"] = "Password not empty";
            }

            if(!empty($_POST["repassword"]))
            {
                if(checkPassword($_POST["repassword"]))
                {
                    $repassword = md5($_POST["repassword"]);
                }
                else
                {
                    $error["repassword"] = "Re-password không đúng định dạng";
                }
            
            }
            else
            {
                $error["repassword"] = "Re-password not empty";
            }

            if($repassword != $password)
            {
                $error["pass"] = "Mật khẩu không trùng nhau";
            }

            if(empty($error))
            {
               if(checkUpdatePass($username))
               {
                   updatePassword($username, $password);
            
               }
               else
               {
                   $error["username"] = "Tài khoản không tồn tại";
               }

            }

        }
        load_view("changepass");
    }
    function logOutAction()
    {
        unset($_SESSION["isLogin"]);
        unset($_SESSION["username"]);
    }

    function showInfoAction()
    {
        $result["listUser"] = getListUser();
        load_view("showinfo",$result);
    }

    function deleteAction()
    {
        $uid =  (int)$_POST["uid"];
        delete($uid);
        echo json_encode(array("result" => "ajax success")); 
    }


?>