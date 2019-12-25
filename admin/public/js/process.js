$(document).ready(function () {

   //upload anh ajax
   $("#uploadimage").on("click",function (e) { 
        var inputFile = $('#file');
        var fileToUpload = inputFile[0].files[0];
        var formData = new FormData();
        formData.append('file', fileToUpload);
        $.ajax({
            url: "?mod=post&controller=index&action=uploadimage",
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (data) {
                console.log(data.status);
                if(data.status == 'ok'){
                    showThumbUpload(data);
                    $("#linkimage").val(data.file_path);
                }
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                 alert(xhr.status);
                 alert(thrownError);
            }
        });
        return false;
   });

   //hien thi anh khi upload 
   function  showThumbUpload(data) {
        var items;
        items = '<img src="' + data.file_path + '"/>';
        $('#showimage').html(items);
    }

    //delete post ajax
    function delitem(event)
    {
        var id = $(this).attr("item");
        console.log(id);
        console.log(event.data.url)
        let url = event.data.url;
        let data = {id: id};
        $("#item-"+id).hide();

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response.num0);
                $(".pending span.span").text(response.num0);
                $(".transport span.span").text(response.num1);
                $(".success span.span").text(response.num2);
            }
        }); 
    }

    $("table.table").on("click",'.postdelete',{url : '?mod=post&action=deletepost'}, delitem);
    $("table.table").on("click",'.sliderdelete',{url : '?mod=slider&action=delete'}, delitem);
    $("table.table").on("click",'.delete',{url : '?mod=post&action=deletecat'}, delitem);
    $("table.table").on("click",'.productdelete',{url : '?mod=product&action=deletecat'}, delitem);

    $("table.table").on("click",'.odelete',{url : '?mod=checkout&action=delete'}, delitem);

    $(".delete").on("click", function () {
        var uid = $(this).attr("uid");
        data = {uid: uid}
        console.log("click");
        $("#user"+uid).hide();
    
        $.ajax({
            type: "POST",
            url: "delete",
            data: data,
            dataType: "json",
            success: function (response) {
            console.log(response.result);
            }    
        });
       });




    $("table.table").on("click",'.delete1',function (e) { 
        e.preventDefault();
        let code = $(this).attr("code");
        let url = $(this).attr("url");
        $("#product-"+code).hide();
        console.log(url);
        data = {code: code}
        console.log(data);
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: "text",
            success: function (response) {
            }
        });
    });

    $("table.table").on("click",".status",function (e) { 
        e.preventDefault();
        $(this).toggleClass("active");
        $(this).toggleClass("hiden");
        console.log($(this).text());
        var text = ($(this).text() == "Hiển thị") ? "Không" : "Hiển thị";
        var id = $(this).attr("pid");
        let url = $(this).attr("ul");
        var status = (text == "Hiển thị") ? 1 : 0;
        $(this).text(text);
        var data={id: id, status: status};
        console.log(url);
       $.ajax({
           type: "POST",
           url: url,
           data: data,
           dataType: "text",
           success: function (response) {
               console.log(response);
           }
       });  
    });

    //nex & prev pagination

   var page = 1;
   var status = '';

   function loadData(url,data)
   {
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: "text",
            success: function (response) {
                // console.log(response);
                $("#content1").empty();
                $("#content1").append(response);
            }
        });  
   }

   function publish(event)
   {
       page = 1;
       status = "active";
       let data = {page: page,where: event.data.where};
       loadData(event.data.url,data);
   }

   function all(event)
   {
       page = 1;
       status = '';
       let data = {page: page, where: ''};
       url = event.data.url;
       loadData(url, data);
   }

   function pending(event)
   {
       page = 1;
       status = "none";
       let data = {page: page, where: event.data.where};
       loadData(event.data.url,data);
   }
   
    function prev(event)
    {
        page --;
        if(page <= 1)
        {
            page = 1;
        }
        let where = '1';
        if(status == "active")
        {
            where = event.data.where1;
        }
        else if(status == "none")
        {
            where = event.data.where2;
        }
       
        let data = {page: page, where: where}
      
        let url = $(this).attr("url");
        loadData(url, data);
       
    }

    function next(event)
    {
        page ++;
        let where = '1';
        if(status == "active")
        {
            where = event.data.where1;
        }
        else if(status == "none")
        {
            where = event.data.where2;
        }
        let data = {page: page, where: where}
        let url = $(this).attr("url");
        console.log(url);
        loadData(url, data);
    }

    $("#next").on("click",{where1: "product_status = '1'", where2: "product_status = '0'"}, next);
    $("#prev").on("click",{where1: "product_status = '1'", where2: "product_status = '0'"},prev);

    //load so luong theo dieu kien ajax 

    //xu ly khi chuyen 
    $(".publish").on("click",{url: "?mod=product&action=pagproduct" , where: "product_status = '1'"},publish);
    $(".pending").on("click",{url: "?mod=product&action=pagproduct" , where: "product_status = '0'"},pending);
    $(".all").on("click",{url: "?mod=product&action=pagproduct", where: '1'},all);

    //xu ly phan danh sach danh muc san pham

    $(".publish").on("click", function () {
        console.log("publish");
        $(".active1").removeClass("active1");
        $(this).addClass("active1");
        $(".hiden").parent().parent().hide();
        $(".active").parent().parent().show();
    });
    $(".pending").on("click", function () {
       
        $(".active").parent().parent().hide();
        $(".hiden").parent().parent().show();
        $(".active1").removeClass("active1");
        $(this).addClass("active1");
    });
    $(".all").on("click", function () {
        $(".active1").removeClass("active1");
        $(this).addClass("active1");
        $(".active").parent().parent().show();
        $(".hiden").parent().parent().show();
    });

    //module slider

    $("#nextslider").on("click",{where1: "slider_status = '1'", where2: "product_status = '0'"}, next);
    $("#prevslider").on("click",{where1: "slider_status = '1'", where2: "product_status = '0'"},prev);

    $(".publish1").on("click",{url: "?mod=slider&action=pagslider" , where: "slider_status = '1'"},publish);
    $(".pending1").on("click",{url: "?mod=slider&action=pagslider" , where: "slider_status = '0'"},pending);
    $(".all1").on("click",{url: "?mod=slider&action=pagslider", where: '1'},all);

    //module post

    $(".publish2").on("click",{url: "?mod=post&action=pagpost" , where: "post_status = '1'"},publish);
    $(".pending2").on("click",{url: "?mod=post&action=pagpost" , where: "post_status = '0'"},pending);
    $(".all2").on("click",{url: "?mod=post&action=pagpost", where: '1'},all);

    $("#postnext").on("click",{where1: "post_status = '1'", where2: "post_status = '0'"}, next);
    $("#postprev").on("click",{where1: "post_status = '1'", where2: "post_status = '0'"},prev);

});