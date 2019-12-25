<?php 
    function construct()
    {
        load_model("index");
        load("helper","format");
        load("lib","dequy");
    }
    global $cat, $order;
    function indexAction()
    {
        $data["allCat"] = getAllCat();
        if(!empty($_GET["parent"]))
        {
            $data["parent"] = getParent($_GET["parent"]);
        }
        if(!empty($_GET["child"]))
        {
            $child = $_GET["child"];
        }
        global $order;
        global $cat;
        if(isset($_POST["submit"]))
        {
            switch($_POST["select"])
            {
                case 1:
                    $order = "ORDER BY product_name ASC  ";
                break;
                case 2:
                    $order = "ORDER BY product_name DESC  ";
                break;
                case 3:
                    $order = "ORDER BY price_show DESC ";
                break;
                case 4:
                    $order = "ORDER BY  price_show ASC";
                break;   
            }
        }

        if(empty($_GET["cat"]))
        {
            $data["listProduct"] = getProduct($order);
        }
        else
        {
            $cat = $_GET["cat"];
            if(!empty($child) && $child == 1)
            {
                $data["listProduct"] = getProductChild($order,$cat);
            }
            else
            {
                $data["listProduct"] = getProductByCat($order,$cat);
            }
        }


        load_view("index", $data);
    }
    function detailAction()
    {
        $data["allCat"] = getAllCat();
        $productID = $_GET["productid"];
        $data["product"] = getProductByID($productID);
        load_view("detail", $data);
    }
?>