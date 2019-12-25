<?php
    function sliderexist($title, $slug)
    {    
        $check = db_num_rows("SELECT * FROM slider WHERE slider_name ='{$title}' OR slug='{$slug}'");
        if($check > 0)
        {
            return true;
        }
        return false;
    }
    function addSlider($data)
    {
        db_insert("slider",$data);
    }

    function getSlider($search='',$limit = 'LIMIT 0,5')
    {
        return db_fetch_array("SELECT * FROM slider WHERE slider_name LIKE '%{$search}%' OR slug LIKE '%{$search}%' $limit");
    }

    function getSliderID($id)
    {
        return db_fetch_row("SELECT * FROM slider WHERE id = '{$id}'");
    }
    function updateSlider($id,$data)
    {
        db_update("slider", $data, "id = '{$id}'");
    }
    function updateStatus($id, $status)
    {
        db_update("slider",array("slider_status" => $status), "id = '{$id}'");
    }
    function getSliderPag($start, $numPerPage, $where="'1'")
    {
        return db_fetch_array("SELECT * FROM slider WHERE $where LIMIT $start, $numPerPage");
    }
    function deleteSlider($id)
    {
        db_delete("slider","id = '{$id}'");
    }
?>