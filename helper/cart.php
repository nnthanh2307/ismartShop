<?php

    function addToCart()
    {
        $productID = $_POST["id"];
        $product = getByID($productID);
        $cat = getCat($productID);

        $num = numOrder($productID)["num_order"] + 1 ;
        updateNum($productID,$num); 
       
        if(!empty($_POST["num"]))
        {
            $qty = $_POST["num"];
        }
        else
        {
            $qty = 1;
        }
        if(isset($_SESSION["cart"]["buy"]) && array_key_exists($productID, $_SESSION["cart"]["buy"]))
        {
            if(!empty($_POST["num"]))
            {
                $qty = $_SESSION["cart"]["buy"][$productID]["qty"] + (int)$_POST["num"];
            }
            else
            {
                $qty = $_SESSION["cart"]["buy"][$productID]["qty"] + 1;
            }
           
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

         
    }

    function getOrder()
    {
        $numOrder = 0;
        $total = 0;
        foreach($_SESSION["cart"]["buy"] as $item)
        {
            $numOrder += $item['qty'];
            $total += $item["subTotal"];

        }
        $_SESSION["cart"]["info"] = array
        (
            "numOrder" => $numOrder,
            "total" => $total
        );
    }

    function updateCart($id, $num)
    {
        $_SESSION["cart"]["buy"][$id]["qty"] = $num;
        $_SESSION["cart"]["buy"][$id]["subTotal"] = $num * $_SESSION["cart"]["buy"][$id]["price"];
        getOrder();
    }
 
?>