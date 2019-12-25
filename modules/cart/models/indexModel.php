<?php
    function getByID($id)
    {
        return db_fetch_row ("SELECT * FROM product WHERE id = '{$id}'");
    }
    function getCat($id)
    {
        return db_fetch_row("SELECT category_name from product_category WHERE category_id = '{$id}'");
    }

    function insertOrder($data)
    {
        db_insert("table_order", $data);
    }
    function inserDetail($data)
    {
        db_insert("order_detail",$data);
    }
    function updateNum($id, $num)
    {
        db_update("product", array("num_order" => $num), "id = '{$id}'");
    }
    function numOrder($id)
    {
        return db_fetch_row("SELECT num_order FROM product WHERE id = '{$id}'");
    }
?>