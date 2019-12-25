<?php
    function construct()
    {
        load_model('index');
        load('lib','submitform');
        load('helper','dequy');
        load('helper', 'validation');
        load('helper', 'format');
    }
    function indexAction()
    {
       $data["listPage"] = getListPage();
        load_view("listpage",$data);
    }
    function addAction()
    {
        global $error, $title, $slug, $desc, $pageImage;

        if(isset($_POST["btn-submit"]))
        {
            $title = checkInput("title");
            $slug = checkInput("slug");
            $desc = checkInput("desc");
            $pageImage = checkInput("linkimage");

            if(empty($error) && checkExist($title, $slug))
            {
                $data = array(
                    "page_title" => $title,
                    "page_slug" => $slug,
                    "page_desc" => $desc,
                    "page_image" => $pageImage,
                    "page_created" => $_SESSION["username"]
                );
                addPage($data);
                header("location: ?mod=page&action=index");
            }
            else
            {
                $error["page"] = "Trang đã tồn tại";
            }
        }
        load_view("addpage");
    }

    function updatepageAction()
    {
        $id = (int)$_GET["pageid"];
        $data["page"] = getPageByID($id);
        global $error, $title, $slug, $desc, $pageImage;

        if(isset($_POST["btn-submit"]))
        {
            $title = checkInput("title");
            $slug = checkInput("slug");
            if(empty($_POST["desc"]))
            {
                $desc = $data["page"]["page_desc"];
            }
            else
            {
                $desc = $_POST["desc"];
            }
        
            $pageImage = checkInput("linkimage");

            if(empty($error))
            {
                $result = array(
                    "page_title" => $title,
                    "page_slug" => $slug,
                    "page_desc" => $desc,
                    "page_image" => $pageImage,
                    "page_created" => $_SESSION["username"]
                );
                updatePage($id, $result);
                header("location: ?mod=page&action=index");
            }
            else
            {
                $error["page"] = "Trang đã tồn tại";
            }
        }
        load_view("updatepage", $data);
    }

    function pagestatusAction()
    {
        $id = $_POST["id"];
        $status = $_POST["status"];
        pageStatus($id, $status);
    }
?>