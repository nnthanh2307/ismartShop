<?php

    function checkInput($value)
    {
        global $error;
            if(!empty($_POST["{$value}"]))
        {
           return $_POST["{$value}"];
        }
        else
        {
            $error["{$value}"] = "{$value} not empty";
        }
    }
?>