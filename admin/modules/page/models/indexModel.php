<?php
    function checkExist($title, $slug)
    {
        if(db_num_rows("SELECT * FROM page WHERE page_title = '{$title}' OR page_slug = '{$slug}'") > 0)
        {
            return false;
        }
        return true;
    }

    function addPage($data)
    {
        db_insert("page", $data);
    }

    function getListPage()
    {
        return db_fetch_array("SELECT * FROM page");
    }

    function getPageByID($id)
    {
        return db_fetch_row("SELECT * from page WHERE page_id ='{$id}'");
    }
    function updatePage($id, $data)
    {
        db_update("page", $data, "page_id = '{$id}'");
    }
    function pageStatus($id, $status)
    {
        db_update("page", array("page_status" => $status), "page_id ='{$id}'");
    }
?>