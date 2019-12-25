<?php

    function getListPost($start=0, $num=6)
    {
        return db_fetch_array("SELECT * FROM post LIMIT $start, $num ");
    }

    function getPostByID($id)
    {
        return db_fetch_row("SELECT * FROM post WHERE post_id = '{$id}'");
    }
    function bestsell()
    {
        return db_fetch_array("SELECT * FROM product ORDER BY num_order DESC  LIMIT 0,8");
    }
?>