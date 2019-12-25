<?php
    function construct()
    {
        load_model("index");
        load('lib','submitform');
        load('helper','dequy');
        load('helper', 'validation');
        load('helper', 'format');
    }

    function indexAction()
    {

        $data["listSlider"] = getSlider();
        if(isset($_POST["btn-search"]))
        {
            $search = $_POST["search"];
            if(empty($search))
            {
                $data["listSlider"] = getSlider();
            }
            else
            {
                $data["listSlider"] = getSlider($search);
            }
        }

        load_view("listslider", $data);
    }
    
    function addsliderAction()
    {
        global $error, $title, $slug, $desc, $numOrder, $linkImg, $status;

        if(isset($_POST["btn-submit"]))
        {
            $title = checkInput("title");
            $slug = checkInput("slug");
            $desc = checkInput("desc");
            $numOrder = $_POST["num_order"];
            if(empty($_POST["status"]))
            {
                $status = 0;
            }
            else
            {
                $status = $_POST["status"];
            }
            $linkImg = checkInput("linkimage");

            if(empty($error))
            {
                $data = array(
                    "slider_name" => $title,
                    "slider_desc" => $desc,
                    "slug" => $slug,
                    "slider_order" => $numOrder,
                    "slider_status" => $status,
                    "slider_img" => $linkImg,
                    "slider_created" => $_SESSION["username"]
                );  
               if(sliderexist($title, $slug))
               {
                    $error["slider"] = "Slider đã tồn tại.";
               }
               else
               {
                    addSlider($data);
                    header("location: ?mod=slider&action=index");
               }
              
            }
        }
      
        load_view("addslider");
    }

    function updateAction()
    {
       
        $id = $_GET["id"];
        $data["slider"] = getSliderID($id);

        global $error, $title, $slug, $desc, $numOrder, $linkImg, $status;
        if(isset($_POST["btn-submit"]))
        {
            $title = checkInput("title");
            $slug = checkInput("slug");
            $numOrder = $_POST["num_order"];
            $linkImg = checkInput("linkimage");
            $status = $_POST["status"];
           if(empty($_POST["desc"]))
           {
               $desc = $data["slider"]["slider_desc"];
           }
           else
           {
               $desc = $_POST["desc"];
           }
          
           if(empty($error))
           {
                $data1 = array(
                    "slider_name" => $title,
                    "slider_desc" => $desc,
                    "slug" => $slug,
                    "slider_order" => $numOrder,
                    "slider_status" => $status,
                    "slider_img" => $linkImg
                );
          
                    updateSlider($id,$data1);
                    header("location: ?mod=slider&action=index");
           }
        }
        
        load_view("update", $data);
    }

    function updatestatusAction()
    {
        $id = $_POST["id"];
        $status = $_POST["status"];
        updateStatus($id, $status);
        echo "Update Success";

    }

    function pagsliderAction()
    {
        $page = !empty($_POST["page"]) ? $_POST["page"] : 1;
        $where = !empty($_POST["where"])? $_POST["where"] : '1';
        $numPerPage = 5;
        $start = ($page - 1 )*$numPerPage;
        $data = getSliderPag($start, $numPerPage, $where);
        global $result;
        $i =1;
        foreach($data as $item)
        {
            $result.="<tr>
            <td><input type='checkbox' name='checkItem' class='checkItem'></td>
            <td><span class='tbody-text'>{$i}</h3></span>
            <td>
                <div class='tbody-thumb'>
                    <img src='{$item['slider_img']}' alt=''>
                </div>
            </td>
            <td class='clearfix'>
                <div class='tb-title fl-left'>
                    <a href='' title=''>{$item['slug']}</a>
                </div>
                <ul class='list-operation fl-right'>
                    <li><a href='?mod=slider&action=update&id={$item['id']}' title='Sửa' class='edit'><i class='fa fa-pencil' aria-hidden='true'></i></a></li>
                    <li><span item={$item['id']} title='Xóa' class='sliderdelete'><i class='fa fa-trash' aria-hidden='true'></i></span></li>
                </ul>
            </td>
            <td><span class='tbody-text'>{$item['slider_order']}</span></td>";
            $result.="<td><span pid='{$item['id']}' ul ='?mod=slider&action=updatestatus' class='tbody-text status ";
            $result.=$item["slider_status"] == 1? "active": "hiden"; $result.="'>";
            $result.= $item["slider_status"] == 1? "Hiển thị": "Không";
            $result.= "</span></td>";
        $result.= "<td><span class='tbody-text'>{$item['slider_created']}</span></td>
            <td><span class='tbody-text'>{$item['slider_time']}</span></td>
        </tr>";
        $i++;
        }
        echo $result;
    }

    function deleteAction()
    {
        $id = $_POST["id"];
        deleteSlider($id);
        echo "success";
    }


?>