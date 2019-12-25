<?php

    function getOrder($like='')
    {
        return db_fetch_array("SELECT * FROM table_order WHERE order_id LIKE '%{$like}%' OR full_name LIKE '%{$like}%'");
    }
    function getProduct($orderID)
    {
        return db_fetch_array("SELECT * FROM order_detail INNER JOIN product on order_detail.product_id = product.id WHERE order_id = '{$orderID}'");
    }
    function getUser($orderID)
    {
        return db_fetch_row("SELECT * FROM table_order WHERE order_id = '{$orderID}'");
    }
    function updateStatus($status, $orderID)
    {
        db_update("table_order",array("order_status" => $status), "order_id = '{$orderID}'");
    }
    function getNum($num)
    {
        return db_num_rows("SELECT * FROM table_order WHERE order_status = '{$num}'");
    }
    function deleteOrder($orderID)
    {
        db_delete("order_detail","order_id = '{$orderID}'");
        db_delete("table_order","order_id = '{$orderID}'");
    }
?>