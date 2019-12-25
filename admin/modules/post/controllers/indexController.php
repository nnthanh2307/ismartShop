<?php
    function construct()
    {
        load_model("index");
        load("helper","validation");
        load("helper", "dequy");
    }
    function indexAction()
    {
        $data["listPost"] = getListPost();
        load_view("listpost",$data);
    }
    function addAction()
    {
        global $error,$title, $slug, $desc, $detail, $parrent, $linkimage;
        load("lib","submitform");

        if(isset($_POST["btn-submit"]))
        {
            $title = checkInput("title");
            $slug = checkInput("slug");
            $desc = checkInput("desc");
            $detail = checkInput("detail");
            $linkimage = checkInput("linkimage"); 
            if(empty($error))
            {
               
                $data=array(
                    "post_title" => $title,
                    "slug" => $slug,
                    "post_desc" => $desc,
                    "post_detail" => $detail,
                    "image" => $linkimage,
                    "post_cat" => $_POST["postcat"],
                    "post_creat" => $_SESSION["username"]
                );
                addpost($data);
                header("location: ?mod=post&action=listpost");
            }

        }
        $data["listPostCat"] = getListCat();
        load_view("addpost",$data);
    }

    function uploadimageAction()
    {
       load("lib","ajaximage");
       uploadAjax();
    }

    function listpostAction()
    {
        $data["listPost"] = getListPost();
        load_view("listpost",$data);
    }
    function addpostcatAction()
    {
        load("lib","submitform");
        // print_r( $_SESSION);
        global $error, $category, $slug, $parrent;

        if(isset($_POST["btn-submit"]))
        {
            $category = checkInput("category");
            $slug = checkInput("slug");
            $parrent = $_POST["parrent"];

            if(empty($error))
            {
                $data = array(
                    "title" => $category,
                    "slug" => $slug,
                    "parrent_id" => $parrent,
                    "ccreated_at" => $_SESSION["username"],
                );
                addPostCat($data);
                header("location: ?mod=post&action=listpostcat");
               
            }
        }
        load_view("addpostcat",array("listPostCat" => getListCat()));
    }
    function listpostcatAction()
    {
        $data["listpostcat"] = getListCat();
        load_view("listpostcat", $data);
    }
    function updatecatAction()
    {
        load("lib","submitform");
        $catId = $_GET["catid"];
        $data["cat"] = getCatById($catId);
        $data["listPostCat"] = getListCat();

        global $error, $category, $slug, $parrent;
        if(isset($_POST["btn-submit"]))
        {
            $category = checkInput("category");
            $slug = checkInput("slug");
            $parrent = $_POST["parrent"];

            if(empty($error))
            {
                $array = array(
                    "title" => $category,
                    "slug" => $slug,
                    "parrent_id" => $parrent,
                    "ccreated_at" => $_SESSION["username"],
                    // "created_time" => time()
                );
                updateCat($array, $data["cat"]["cat_id"]);
                header("location: ?mod=post&action=listpostcat");
            }
        }
        $data["cat"] = getCatById($catId);
        $data["listPostCat"] = getListCat();
        
        load_view("updatecat",$data);
    }
    function updatepostAction()
    {
        load("lib","submitform");
        $postId = $_GET["postid"];
        $data["post"] = getPostById($postId);
        $data["listPostCat"] = getListCat();

        global $error,$title, $slug, $desc, $detail, $parrent, $linkimage;
 
        if(isset($_POST["btn-submit"]))
        {
            $title = checkInput("title");
            $slug = checkInput("slug");
            $desc = checkInput("desc");
            $linkimage = checkInput("linkimage");
            if(empty($_POST["detail"]))
            {
                $detail = $data["post"]["post_detail"];
            }
            else
            {
                $detail = $_POST["detail"];
            }

            if(empty($error))
            {
               
                $array=array(
                    "post_title" => $title,
                    "slug" => $slug,
                    "post_desc" => $desc,
                    "post_detail" => $detail,
                    "image" => $linkimage,
                    "post_cat" => $_POST["postcat"],
                    // "post_creat" => $_SESSION["username"]
                );
                updatePost($data["post"]["post_id"], $array);
                header("location: ?mod=post&action=listpost");
            }

        }

        load_view("updatepost",$data);
    }
    function deletepostAction()
    {
        $id = $_POST["id"];
        deletePost($id);
        echo "success";

    }
    function deletecatAction()
    {
        $id = $_POST["id"];
        deleteCat($id);
        echo "success";
    }
    function catstatusAction()
    {
        $id = $_POST["id"];
        $status = $_POST["status"];
        catStatus($id, $status);
    }
    function poststatusAction()
    {
        $id = $_POST["id"];
        $status = $_POST["status"];
        postStatus($id, $status);
    }

    function pagpostAction()
    {
        $page = !empty($_POST["page"]) ? $_POST["page"] : 1;
        $where = !empty($_POST["where"])? $_POST["where"] : '1';
     
        $numPerPage = 10;
        $start = ($page - 1 )*$numPerPage;
        $data =  getPostPag($start, $numPerPage, $where);
        global $result;
        $i = 1;
        foreach($data as $item)
        {
            $result .= "<tr id='item-{$item['post_id']}'>
            <td><input type='checkbox' name='checkItem' class='checkItem'></td>
            <td><span class='tbody-text'>$i</h3></span>
            <td class='clearfix'>
                <div class='tb-title fl-left'>
                    <a title='Chỉnh sửa' href='?mod=post&action=updatepost&postid={$item['post_id']}' title=''>{$item['post_title']}</a>
                </div>
                <ul class='list-operation fl-right'>
                    <li><p title='Xóa' class='postdelete'  item ='{$item['post_id']}'><i class='fa fa-trash' aria-hidden='true'></i></p></li>
                </ul>
            </td>
            <td><span  class='tbody-text'>{$item['title']}</span></td>
            <td><span title = 'Trạng thái hiển thị' ul='?mod=post&action=poststatus' pid = '{$item['post_id']}' class='status tbody-text";
            $result.= $item["post_status"] == 1 ? " active" : " hiden";
            $result.= "'>";
            $result.= $item["post_status"] == 1 ? "Hiển thị" : "Không";
            $result.= "</span></td>
                <td><span class='tbody-text'>{$item['post_creat']}</span></td>
                <td><span class='tbody-text'>{$item['created_time']}</span></td>
                </tr>";
        $i++;
        }
        echo $result;
    }
?>