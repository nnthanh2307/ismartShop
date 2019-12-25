<?php

    function construct()
    {
        load_model("index");
    }
    function indexAction()
    {
        if(isset($_POST["btn-search"]) && !empty($_POST["search"]))
        {
            $search = $_POST["search"];
            $data["listSlider"] = getSlider($search);
            $data["listProduct"] = getProduct($search);
        }
        else
        {
            $data["listSlider"] = getSlider();
            $data["listProduct"] = getProduct();
        }
      
        load_view("listmedia",$data);
    }



?>