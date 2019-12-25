<?php
    function construct()
    {
        load_model("index");
        load("helper","format");
    }
    function indexAction()
    {
        $data["bestSell"] = bestsell();
        $data["listPost"] = getListPost();
      
        load_view("index", $data);
    }
    function detailpostAction()
    {
        $id = $_GET["postid"];
        $data["post"] = getPostByID($id);

        load_view("detailpost", $data);
    }

    function pagpostAction()
    {
        $page = $_POST["page"];
        $numPerPage = 6;

        $start = ($page - 1)* $numPerPage;
        $data = getListPost($start, $numPerPage);
        global $result;
        foreach($data as $item)
        {
            $result.= " <li class='clearfix'>
            <a href='?mod=news&action=detailpost&postid={$item["post_id"]}' title='' class='thumb fl-left'>
                <img src='../project/admin/{$item["image"]}' alt=''>
            </a>
            <div class='info fl-right'>
                <a href='?mod=news&action=detailpost&postid={$item["post_id"]}' title='' class='title'>{$item["post_title"]}</a>
                <span class='create-date'>{$item["created_time"]}</span>
                <p class='desc'>{$item["post_desc"]}</p>
            </div>
        </li>";

        }
        echo $result;
    }
?>