$(document).ready(function () {

    function addCart(url,data)
    {
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: "json",
            success: function (response) {
                alert("Đã thêm sản phẩm vào giỏ hàng!");
                $("#cart-wp #num").text(response.numOrder);
                $("#cart-wp .list-cart").empty();
                $("#cart-wp .list-cart").append(response.cartIcon);
                $("#cart-wp .total-price .price").text(response.total);
                $(".desc span").text(response.numOrder);
            }
        });
    }
    
    $(".action p").on("click", function () {
        let id = $(this).attr("pid");
        let url = "?mod=cart&action=add";
        let data = {id: id};
        addCart(url, data);

    });
    $(".info .add-cart").on("click", function () {
        let num = $("#num-order").val();
        console.log(num);
        let id = $(this).attr("pid");
        let url = "?mod=cart&action=add";
        let data = {id: id, num: num};
        addCart(url, data);
    });

    $(".num-order").on("change", function () {
        let id = $(this).attr("pid");
        let num = $(this).val();
        let data = {id: id, num: num};
        $.ajax({
            type: "POST",
            url: "?mod=cart&action=update",
            data: data,
            dataType: "json",
            success: function (response) {
                $("#cart-wp .price").text(response.total);
                $("#subTotal-"+id).text(response.subTotal);
                $("#total-price span").text(response.total)
            }
        });
        
    });

    $(".del-product").on("click", function () {
        console.log("delete Item");
        let id = $(this).attr("pid");
        let data = {id: id};
        console.log();
        $(this).parent().parent().hide()
        $.ajax({
            type: "POST",
            url: "?mod=cart&action=delitem",
            data: data,
            dataType: "text",
            success: function (response) {
                $("#total-price span").text(response);
                if(response == "0đ")
                {
                    $(".table").hide();
                }   
            }
        });
    });

  
    
});