<?php
        function dequy($listPostCat, $parrent_id = 0, $char = '')
        {
            foreach($listPostCat as $key => $item)
            {
                if($item["parrent_id"] == $parrent_id)
                {
                    echo " <option value='{$item["cat_id"]}'>";
                    echo $char.$item["title"];
                    echo "</option>";
                    unset($listPostCat[$key]);
                    dequy($listPostCat, $item["cat_id"], $char.'--/');
                }
            }
    
        }

        function dequy1($listProductCat, $parrent_id = 0, $char = '')
        {
            foreach($listProductCat as $key => $item)
            {
                if($item["parrent_id"] == $parrent_id)
                {
                    echo " <option value='{$item["category_id"]}'>";
                    echo $char.$item["category_name"];
                    echo "</option>";
                    unset($listProductCat[$key]);
                    dequy1($listProductCat, $item["category_id"], $char.'--/');
                }
            }
    
        }
?>