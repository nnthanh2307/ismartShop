<?php 

    function getProductByID($productID)
    {
        return db_fetch_row("SELECT * FROM product WHERE id = '{$productID}'");
    }

    function getProductByCat($order='',$where, $filter='')
    {
        return db_fetch_array("select * from product WHERE product_status = '1' AND category_id IN (select category_id from product_category WHERE parrent_id IN (select category_id from product_category WHERE category_name = '{$where}')) {$filter} {$order} LIMIT 0,50");
    }
    function getProductChild($order='', $where,$filter='')
    {
        return db_fetch_array("SELECT * FROM product WHERE product_status = '1' AND category_id IN (SELECT category_id FROM product_category WHERE category_name='{$where}') {$filter} $order");
    }
    function getProduct($order ='', $where='', $limit='LIMIT 0,50')
    {
        return db_fetch_array("SELECT * FROM product $where $order $limit");
    }
    function getAllCat()
    {
        return db_fetch_array("SELECT * FROM product_category WHERE category_status = '1'");
    }
    function getParent($parent)
    {
        return db_fetch_row("SELECT * FROM product_category WHERE category_id = '{$parent}'");
    }
    
?>