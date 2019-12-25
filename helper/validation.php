<?php
    function checkUsername($username)
    {
        $pregUsername = "/^[a-zA-Z0-9_\.]{6,32}$/";
        if(preg_match($pregUsername, $username))
        {
            return true;
        }
        return false;
    }
    function checkPassword($password)
    {
        $pregPassword = "/^([A-Z]){1}([\w!@#$%^&*()]){5,31}$/";
        if(preg_match($pregPassword, $password))
        {
            return  true;
        }
        return false;
    }

   
    function formError($value)
    {
        global $error;
        if(!empty($error[$value]))
        {
            return "<p class='error'> {$error[$value]} </p>";
        }
    }

    function error($value)
    {
        global $error;
        if(!empty($error[$value]))
        {
            return "<p class = 'error'>{$error[$value]}</p>";
        }
    }
    function returnValue($value)
    {
        return ${"{$value}"};
    }
?>