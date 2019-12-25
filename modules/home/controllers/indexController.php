<?php

    function construct()
    {
        load_model("index");
        load("helper","format");
        load("lib","dequy");
    }
    function indexAction()
    {
        $data["bestSell"] = bestsell();
        $data["slider"] = getSlider();
        $data["productCat"] =  getProductCat();
        $data["listNew"] = getProductNew();
        $data["allCat"] = getAllCat();
        
        foreach($data["productCat"] as $item)
        {
            $data["product"][$item["category_name"]] = getProductByCat($item["category_name"]);
        }

        load_view("home", $data);
    }

    function searchAction()
    {
        $search = $_POST["search"];
        
        $data["allCat"] = getAllCat();
        $data["listProduct"] = searchProduct($search);
        $data["search"] = $search;
        load_view("search", $data);
    }

?>