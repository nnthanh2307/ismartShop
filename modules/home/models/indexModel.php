<?php 

    function getSlider()
    {
        return db_fetch_array("SELECT * FROM slider WHERE slider_status = '1' ORDER BY slider_order ASC ");
    }

    function getProductCat()
    {
        return db_fetch_array("SELECT * fROM product_category WHERE parrent_id = 0 AND category_status = '1'");
    }

    function getProductByCat($where)
    {
        return db_fetch_array("select * from product WHERE product_status = '1' AND category_id IN (select category_id from product_category WHERE parrent_id IN (select category_id from product_category WHERE category_name = '{$where}')) ORDER BY product_time DESC LIMIT 0,8");
    }

    function getProductNew()
    {
        return db_fetch_array("SELECT * FROM product ORDER BY product_time DESC LIMIT 0,8");
    }

    function getAllCat()
    {
        return db_fetch_array("SELECT * FROM product_category WHERE category_status = '1'");
    }
    
    function searchProduct($search)
    {
        return db_fetch_array("SELECT * FROM product WHERE product_name LIKE '%{$search}%' AND product_status='1' ");
    }

    function bestsell()
    {
        return db_fetch_array("SELECT * FROM product ORDER BY num_order DESC  LIMIT 0,8");
    }
?>