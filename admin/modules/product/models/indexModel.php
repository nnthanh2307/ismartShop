<?php

    function getAllProduct($search='',$limit='LIMIT 0,8')
    {
        return db_fetch_array("SELECT * FROM product INNER JOIN product_category ON product.category_id = product_category.category_id WHERE code LIKE '%{$search}%' OR product_name LIKE '%{$search}%' OR category_name LIKE '%{$search}%' ORDER BY product_name ASC $limit");
    }
    function getProductCat($search='')
    {
        return db_fetch_array("SELECT * FROM product_category WHERE category_name LIKE '%{$search}%' OR slug LIKE '%{$search}%'");

    }
    function checkCategory($category)
    {
        if(db_num_rows("SELECT * FROM product_category WHERE category_name= '{$category}'"))
        {
            return false;
        }
        return true;
    }
    function addProductCat($data)
    {
        db_insert("product_category", $data);
    }
    function deleteCategory($id)
    {
        db_delete("product_category","category_id = '{$id}'");
    }
    function getCatById($id)
    {
        return db_fetch_row("SELECT * FROM product_category WHERE category_id = '{$id}'");
    }
    function updateCat($id, $data)
    {
        db_update("product_category", array("category_status" => $data), "category_id = '{$id}'");
    }
    function insertProduct($data)
    {
        db_insert("product", $data);
    }

    function getProductById($id)
    {
        return db_fetch_row("SELECT * FROM product INNER JOIN product_category ON product.category_id = product_category.category_id WHERE id ='{$id}'");
    }
    function updateProduct($id, $data)
    {
        db_update("product", $data, "id = '{$id}'");
    }
    function deleteProduct($code)
    {
        db_delete("product", "code = '{$code}'");
    }
    function productStatus($id, $status)
    {
        db_update("product", array("product_status" => $status), "id = '{$id}'");
    }

    function getProductPag($start, $numPerPage, $where="1")
    {
        return db_fetch_array("SELECT * FROM product INNER JOIN product_category ON product.category_id = product_category.category_id WHERE $where ORDER BY product_name ASC LIMIT $start, $numPerPage");
    }

    
?>