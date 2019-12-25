$(document).ready(function () {
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

     function prev(event)
     {
         page --;
         if(page <= 1)
         {
             page = 1;
         }

         let data = {page: page}
         let url = event.data.url;
         console.log(url);
         loadData(url, data);
        
     }
 
     function next(event)
     {
         page ++;
         let data = {page: page}
         let url = event.data.url;
         console.log(url);
         loadData(url, data);
     }

     $("#next").on("click",{url: "?mod=news&action=pagpost"}, next);
     $("#prev").on("click",{url: "?mod=news&action=pagpost"}, prev);

    $(".filter_price").change(function (e) { 
        let price = $("input[name='r-price']:checked").val();
        console.log(price);
        let priceMax, priceMin;
        switch (price) {
            case '1':
                priceMax = 100;
                break;
            case '2':
                priceMax = 300;
                priceMin = 200;
                break;
            case '3':
                priceMax = 300;
                priceMin = 200;
                    break;
            case '4':
                priceMax = 300;
                priceMin = 200;
                break;
            case '5':
                priceMax = 300;
                priceMin = 200;
                break;
        }

        let array = $(".new");
        console.log(array[0]);
    
    });
    $(".filter_brand").change(function (e) { 
        let thanh2 = $("input[name='r-brand']:checked").val();
        console.log(thanh2);
        
    });

  

    
     
});
