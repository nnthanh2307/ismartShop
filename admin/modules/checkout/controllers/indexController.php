<?php

    function construct()
    {
        load_model("index");
        load("helper","format");
    }
    function indexAction()
    {
        if(isset($_POST["btn"]) && !empty($_POST["search"]))
        {
                $search = $_POST["search"];
                $data["search"] = $search;
                $data["listOrder"] = getOrder($search);
                $data["num"] = count($data["listOrder"]);
        }
        else
        {
            $data["listOrder"] = getOrder();
        }
        $data["num0"] = getNum("0");
        $data["num1"] = getNum("1");
        $data["num2"] = getNum("2");
        load_view("index", $data);

    }
    function detailAction()
    {
        global $error;
        $orderID = $_GET["orderid"];

        if(isset($_POST["sm_status"]))
        {
            $status = $_POST["status"];
            updateStatus($status, $orderID);
            $error["upadte"] = "Cập nhật tình trạng đơn hàng thành công";
            header("location: ?mod=checkout&action=index");
        }
        $data["user"] = getUser($orderID);
        $data["listProduct"] = getProduct($orderID);
        load_view("detail", $data);
    }
    function deleteAction()
    {
        $orderID = $_POST["id"];
        deleteOrder($orderID);
        $data = array(
            "num0" => getNum("0"),
            "num1" => getNum("1"),
            "num2" => getNum("2"),
        );
        echo json_encode($data);
    }
    function userAction()
    {
        $data["listOrder"] = getOrder();
        load_view("user", $data);
    }
?>