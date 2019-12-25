<?php
    function construct()
    {
        load_model("index");
        load("helper","cart");
        load("helper","format");
        load("lib","submitform");
        load("helper","validation");
    }
    function indexAction()
    {
        $data= [];
        if(!empty($_SESSION["cart"]["buy"]))
        {
            $data["listOrder"]=$_SESSION["cart"]["buy"];
        }
        load_view("cart", $data);
    }

    function checkoutAction()
    {

        if(isset($_POST["submit"]))
        {
            global $error, $fullName, $email, $address, $phone, $note, $payment;

            $fullName = checkInput("fullname");
            $email = checkInput("email");
            $address = checkInput("address");
            $phone = checkInput("phone");
            $payment = checkInput("payment-method");
            
            $orderID = "ORDER".time();

            if(!empty($_POST["note"]))
            {
                $note = $_POST["note"];
            }
            if(empty($error))
            {
                echo "thanh";
                $order = array(
                    "order_id" => $orderID,
                    "full_name" => $fullName,
                    "email" => $email,
                    "phone" => $phone,
                    "address" => $address,
                    "note" => $note,
                    "payment" => $payment,
                    "total" => $_SESSION["cart"]["info"]["total"],
                    "num_order" => $_SESSION["cart"]["info"]["numOrder"]
                );
                insertOrder($order);

                if(!empty($_SESSION["cart"]["buy"]))
                {
                    foreach($_SESSION["cart"]["buy"] as $item)
                    {
                        $orderDetail = array(
                            "order_id" => $orderID,
                            "product_id" => $item["productID"],
                            "quantity" => $item["qty"],
                            "price" => $item["price"],
                            "total_price" => $item["subTotal"],
                            "url" => $item["url"],   
                        );
                        inserDetail($orderDetail);
                    }
                }
                header("location: ?mod=home");
            }
        }
        load_view("checkout");
    }
    function addAction()
    {
        addToCart();
        $order = getOrder();
        $numOrder = 1;
        $cartIcon = '';
        if(!empty($_SESSION["cart"]["buy"]))
        {
            foreach($_SESSION["cart"]["buy"] as $item)
            {
                $cartIcon.="<li class='clearfix'>
                <a href='{$item['url']}' title='' class='thumb fl-left'>
                    <img src='{$item['productImage']}' alt=''>
                </a>
                <div class='info fl-right'>
                    <a href='' title='' class='product-name'>{$item['productName']}</a>
                    <p class='price'>"; 
                    $cartIcon.= currency_format($item['price']); 
                    $cartIcon.="</p>
                    <p class='qty'>Số lượng: {$item['qty']}</span></p>
                </div>
            </li>";
            }
        }
        $result = array(
            "numOrder" => count($_SESSION["cart"]["buy"]),
            "cartIcon" => $cartIcon,
            "total" => currency_format($_SESSION["cart"]["info"]["total"])
        );
        echo json_encode($result);
    }
    function updateAction()
    {
        $id = $_POST["id"];
        $num = $_POST["num"];
        updateCart($id, $num);
        $response = array(
            "num" => $num,
            "subTotal" => currency_format($_SESSION["cart"]["buy"][$id]["subTotal"]),
            "total" => currency_format($_SESSION["cart"]["info"]["total"])
        );
        echo json_encode($response);
    }
    function deleteAction()
    {
        unset($_SESSION["cart"]["buy"]);
        getOrder();
        header("location: ?mod=cart");
    }
    function delitemAction()
    {
        $id = $_POST["id"];
        unset($_SESSION["cart"]["buy"][$id]);
        getOrder();
        echo currency_format($_SESSION["cart"]["info"]["total"]);
    }

    function ordernowAction()
    {
        $productID = (int)$_GET["productid"];
       
        $num = numOrder($productID)["num_order"] + 1 ;
        updateNum($productID,$num); 

        $product = getByID($productID);
        $cat = getCat($productID);
        
            $qty = 1;

        if(isset($_SESSION["cart"]["buy"]) && array_key_exists($productID, $_SESSION["cart"]["buy"]))
        {
                $qty = $_SESSION["cart"]["buy"][$productID]["qty"] + 1;   
        }
        $_SESSION["cart"]["buy"][$productID] = array(
            "productID" => $product["id"],
            "productName" => $product["product_name"],
            "productCode" => $product["code"],
            "productImage" => $product["image"],
            "qty" => $qty,
            "price" => $product["price_show"],
            "subTotal" => $qty * $product["price_show"], 
            "url" => "?mod=product&action=detail&cat={$cat["category_name"]}&productid={$product["id"]}"
        );
        getOrder();
        header("location: ?mod=cart");
    }
?>
