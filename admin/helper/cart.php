<?php
    //function add product to cart

    function addToCart()
    {
        $productID = $_POST["id"];
        $product = getByID($productID);
        $qty = 1;

        if(isset($_SESSION["cart"]["buy"]) && array_key_exists($productID, $_SESSION["cart"]["buy"]))
        {
            $qty = $_SESSION["cart"]["buy"][$productID]["qty"] + 1;

        }

        $_SESSION["cart"]["buy"][$productID] = array(
            "id" => $product["id"],
            "productTitle" => $product["productTitle"],
            "price" => $product["price"],
            "productImage" => $product["productImage"],
            "qty" => $qty,
            "code" => $product["code"],
            "subTotal" => $qty * $product["price"],
            "url" => "?mod=product&controller=index&action=detail&id={$productID}"
        );
    }

    //function lay thong tin thanh toan;

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

    //function tra ve danh sach san pham da mua

    // function getListOrder()
    // {
    //     if(isset($_SESSION["cart"]["buy"]))
    //     {
    //         foreach($_SESSION["cart"]["buy"] as &$item)
    //         {
    //             $item["urlDelete"] = "?mod=cat&act=delete&id={$item["id"]}";
    //         }
    //         return $_SESSION["cart"]["buy"];
    //     }
    // }

    //function tra ve thong tin thanh toan

    // function getTotalOrder()
    // {
    //     return $_SESSION["cart"]["info"];
    // }

    //function xoa item trong gio hang

    // function deleteItem($id)
    // {
    //     if(isset($_SESSION["cart"]))
    //     {
    //         if(!empty($id))
    //         {
    //             unset($_SESSION["cart"]["buy"][$id]);
    //             totalOrder();
    //         }
    //         else
    //         {
    //             unset($_SESSION["cart"]["buy"]);
    //             totalOrder();
    //         }
           
    //     }
       
    // }

    //function update gio hang khi  thay doi so luong
    
    function updateCart($id, $num)
    {
        $_SESSION["cart"]["buy"][$id]["qty"] = $num;
        $_SESSION["cart"]["buy"][$id]["subTotal"] = $num * $_SESSION["cart"]["buy"][$id]["price"];
        getOrder();

    }

    

?>


