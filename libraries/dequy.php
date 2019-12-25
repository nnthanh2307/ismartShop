<?php

function showCategories($categories, $parent_id = 0, $char = '', $stt = 0)
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parrent_id'] == $parent_id)
        {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }
    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child)
    {
        if ($stt == 0){
            $class = "class='list-item'";
            $child = 0;

        }
        else if ($stt >= 1){
            $class = "class='sub-menu'";
            $child = 1;

        }
        
        echo "<ul {$class}>";
        foreach ($cate_child as $key => $item)
        {
            // Hiển thị tiêu đề chuyên mục
            echo "<li>
                    <a href='?mod=product&action=index&parent={$item['parrent_id']}&cat={$item["category_name"]}&child={$child}' title=''>{$item['category_name']}</a>";
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['category_id'], $char.'|---', ++$stt);
            echo '</li>';
        }
        echo '</ul>';
    }
}

?>