<?php
    function getSlider($like='')
    {
        return db_fetch_array("SELECT * FROM slider WHERE slider_name LIKE '%{$like}%'");
    }
    function getProduct($like='')
    {
        return db_fetch_array("SELECT * FROM product WHERE product_name LIKE '%{$like}%'");
    }
?>