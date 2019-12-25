<?php

    function checkLogin($username, $password)
    {
        if(!empty($username && !empty($password)))
        {
            $check = db_num_rows("SELECT * FROM user WHERE username = '{$username}' OR email = '{$password}'");
            if($check > 0)
            {
                return true;
            }
            return false;
        }
    }

    function checkUser($username, $email)
    {
        if(!empty($username) && !empty($email))
        {
            $check = db_num_rows("SELECT * FROM user WHERE username = '{$username}' OR email = '{$email}'");
            if($check > 0 )
            {
                return true;
            }
            return false;
        }
        return true;
    }
    
    function checkUpdatePass($username)
    {
        $check = db_num_rows("SELECT * FROM user WHERE username = '{$username}'");
        if($check  > 0)
        {
            return true;
        }
        return false;
    }
    function updatePassword($username, $password)
    {
        db_update("user", array("password" => $password), "username = '{$username}'");
    };
    function addUser($data)
    {
        db_insert("user", $data);
    }

    function getUser($username)
    {
       $result =  db_fetch_array("SELECT * FROM user WHERE username ='{$username}'");
       return $result;
    }

    function updateUser($username, $data)
    {
        db_update("user",$data,"username = '{$username}'");

    }
    function getListUser()
    {
        $result = db_fetch_array("SELECT * FROM user");
        return $result;
    }

    function delete($uid)
    {
        db_delete("user", "user_id = '{$uid}'" );
    }
?>
