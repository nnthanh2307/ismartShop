<?php
    function construct()
    {
        load_model('index');
        load('lib','submitform');
        load('helper','dequy');
        load('helper', 'validation');
        load('helper', 'format');
    }
    function indexAction()
    {
        global $data,$error;
        $data['product'] = getAllProduct();
        if(isset($_POST['btn-search']))
        {
            $search = $_POST['search'];
            if(empty($search))
            {
                $data['product'] = getAllProduct();
            }
            else{
                $data['product'] = getAllProduct($search,"");
            }
           
            if(!empty($search))
            {
                $error['search'] = 'Tìm thấy '.count($data['product']).' kết quả cho: '. "\" {$search} \""; 
            }
        }
        
        load_view('list', $data);
    }
    function addAction()
    {
        global $error,$productName, $code, $price, $showPrice, $desc, $detail, $linkImage, $productCategory, $productStatus;
        if(isset($_POST['btn-submit']))
        {
            $productName = checkInput('product_name');
            $code = checkInput('product_code');
            $price = checkInput('price');
            $showPrice = checkInput('showprice');
            $desc = checkInput('desc');
            $detail = checkInput('detail');
            $linkImage = checkInput('linkimage');
            $productCategory = checkInput('parrent');
            if(empty($_POST["status"]))
            {
                $productStatus = 0;
            }
            else
            {
                $productStatus = $_POST['status'];
            }

            if(empty($error))
            {
                $result = array(
                    'product_name' =>  $productName,
                    'code' => $code,
                    'price' => $price,
                    'price_show' => $showPrice,
                    'product_desc' => $desc,
                    'product_detail' => $detail,
                    'image' => $linkImage,
                    'category_id' => $productCategory,
                    'product_status' => $productStatus,
                    'product_created' => $_SESSION['username']
                );
                insertProduct($result);
                header('location: ?mod=product&action=index');
            }
        }
        $data['listProductCat'] = getProductCat();
        load_view('add',$data);
        

    }
    function productcatAction()
    {
        global $data,$error;
        $data['listProductCat'] = getProductCat();
        if(isset($_POST['btn-search']))
        {
            $search = $_POST['search'];
            if(empty($search))
            {
                $data['listProductCat'] = getProductCat();
            }
            else{
                $data['listProductCat'] = getProductCat($search);
            }
           
            if(!empty($search))
            {
                $error['search'] = 'Tìm thấy '.count($data['listProductCat']).' kết quả cho: '. "\" {$search} \""; 
            }
        }
        load_view('productcat',$data);
    }
    function addcatAction()
    {
        global $error, $category, $slug, $parrent;
        if(isset($_POST['btn-submit']))
        {
            $category = checkInput('category');
            $slug = checkInput('slug');
            $parrent = $_POST['parrent'];

            if(empty($error))
            {
                $data = array(
                    'category_name' => $category,
                    'slug' => $slug,
                    'parrent_id' => $parrent,
                    'product_creat' => $_SESSION['username']
                );
                if(checkCategory($category))
                {
                    addProductCat($data);
                    header('location: ?mod=product&action=productcat');
                }
                else
                {
                    $error['productcat'] = 'Danh mục đã tồn tại';
                }
            } 
        }
      
        $result['listProductCat'] = getProductCat();
        load_view('addcat', $result);
    }

    function deletecatAction()
    {
        $id = $_POST['id'];
        deleteCategory($id);
    }

    function updateCatAction()
    {
        $id = $_GET['catid'];
        global $error, $category, $slug, $parrent;
        
        if(isset($_POST['btn-submit']))
        {
            $category = checkInput('category');
            $slug = checkInput('slug');
            $parrent = $_POST['parrent'];

            if(empty($error))
            {
                $data = array(
                    'category_name' => $category,
                    'slug' => $slug,
                    'parrent_id' => $parrent,
                    'product_creat' => $_SESSION['username']
                );
                updateCat($id,$data);
                header('location: ?mod=product&action=productcat');
            } 
        }
        $result['listProductCat'] = getProductCat();
        $result['cat'] = getCatById($id);
        load_view('updatecat', $result);
    }
    function catstatusAction()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];
        
        updateCat($id, $status);
        echo $status;
    }

    function updateAction()
    {
        $id = $_GET['id'];
        $data['product'] = getProductById($id);

        global $error,$productName, $code, $price, $showPrice, $desc, $detail, $linkImage, $productCategory, $productStatus;
        if(isset($_POST['btn-submit']))
        {
            $productName = $_POST['product_name'];
            $code = $_POST['product_code'];
            $price = $_POST['price'];
            $showPrice = $_POST['showprice'];

            if(empty($_POST['desc']))
            {
                $desc = $data['product']['product_desc'];
            }
            else
            {
                $desc = $_POST['desc'];
            }

            if(empty($_POST['detail']))
            {
                $detail = $data['product']['product_detail'];
            }
            else
            {
                $detail = $_POST['detail'];
            }
            $linkImage = $_POST['linkimage'];
            $productCategory = $_POST['parrent'];
            $productStatus = $_POST['status'];

            if(empty($error))
            {

                $result = array(
                    'product_name' =>  $productName,
                    'code' => $code,
                    'price' => $price,
                    'price_show' => $showPrice,
                    'product_desc' => $desc,
                    'product_detail' => $detail,
                    'image' => $linkImage,
                    'category_id' => $productCategory,
                    'product_status' => $productStatus,
                    'product_created' => $_SESSION['username']
                );
                updateProduct($id, $result);
                header('location: ?mod=product&action=index');
            }
        }

        $data['listProductCat'] = getProductCat(); 
        load_view('updateproduct', $data);
    }

    function deleteproductAction()
    {
        $code = $_POST['code'];
        deleteProduct($code);
        echo $code;
    }
    function productstatusAction()
    {
       $id = $_POST['id'];
       $status = $_POST['status'];
        productStatus($id, $status);
    }

    function pagproductAction()
    {
        $page = !empty($_POST["page"]) ? $_POST["page"] : 1;
        $where = !empty($_POST["where"])? $_POST["where"] : '1';
     
        $numPerPage = 8;
        $start = ($page - 1 )*$numPerPage;
        $data =  getProductPag($start, $numPerPage, $where);
        global $result;
        $i = 1;
        foreach($data as $item)
        {
            $result.="<tr id='product-{$item['code']}'>
            <td><input type='checkbox' name='checkItem' class='checkItem'></td>
            <td><span class='tbody-text'>{$i}</h3></span>
            <td><span class='tbody-text'>{$item['code']}</h3></span>
            <td>
                <div class='tbody-thumb'>
                    <img src='{$item['image']}' alt=''>
                </div>
            </td>
            <td class='clearfix'>
                <div class='tb-title fl-left'>
                    <a href='' title=''>{$item['product_name']}</a>
                </div>
                <ul class='list-operation fl-right'>
                    <li><a href='?mod=product&action=update&id={$item['id']}' title='Sửa' class='edit'><i class='fa fa-pencil' aria-hidden='true'></i></a></li>
                    <li><p title='Xóa' url='?mod=product&action=deleteproduct' code= '{$item['code']}' class='delete1'><i class='fa fa-trash' aria-hidden='true'></i></p></li>
                </ul>
            </td>
            <td><span class='tbody-text'>";
            $result.= currency_format($item["price"]);
            $result.="</span></td>";
            $result.="<td><span class='tbody-text'>{$item['category_name']}</span></td>
            <td><span pid='{$item['id']}' ul ='?mod=product&action=productstatus' class='tbody-text status";
            $result.=$item['product_status'] == 1 ? ' active' : '';
            $result.= "'>";
            $result.=$item['product_status'] == 1 ? 'Hiển thị'  :'Không'."</span></td>";
            $result.="<td><span class='tbody-text'>{$item['product_created']}</span></td>
            <td><span class='tbody-text'>{$item['product_time']}</span></td>
            </tr>";
            $i++;
        }

        echo $result;

    }


    //check danh muc da ton tai;

?>
