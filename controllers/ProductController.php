<?php 
 require dirname(__DIR__).'../model/product.php';
 require dirname(__DIR__).'../model/images.php';
 require dirname(__DIR__) .'../model/review.php';
$controller = $_GET['product'] ?? '';
$method = $_GET['method'] ?? '';
 $product =  new Product();
 $images = new Images();
  
 if($controller == 'create-product'){
   // [post] ProductController.php?product=create-product
   // làm lại
 }elseif($controller == 'delete-soft-product'&&  $id_product){
   // [get] ProductController.php?product=delete-product?id-product= id product&is_delete-soft = true/false
   $deleteSoft=$_GET['is-delete-soft'];
   $product-> deleteProductSoft($deleteSoft);
 }elseif($controller =='delete-product') {
    // [get] ProductController.php?product=delete-product?id-product = id product
    $product-> deleteProduct();
 }elseif($controller == 'update-product'){
    $product-> updateProduct();
 }elseif($controller == 'detail-product'){
   $VIEWS_NAME = '../product/detail.php';

   // show product by id select 
   $product_detail = $product -> show_product_one();

   // show all product from database by id_product 
   $product_image_detail =$images-> show_image_one();

   // show all product have member of like tallest
   $max_item_product = 12;
   $page = 1;
   $sort = "DESC";
   $sort_name_trandy = 'count_buy';
   $product_trandy_list  =  $product -> product_all($sort,$sort_name_trandy,$max_item_product,$page);

   require '../resources/views/layouts/productLayout.php';
 }elseif($controller == 'cart'){
   if($method == 'put'){
    $product_info = $product -> show_product_one();
    // add product to cart 
    $product_add = array(
      'id' => $product_inf['id'],
      'count' => $_GET['count-product'] ?? 1,
      'name' =>  $product_info['name'],
      'price' => $product_info['price'],
      'image' => $product_info['image'],
      'size' => $_POST['size'] ?? '',
      'color'=> $_POST['color'] ?? '',
    );
    $productCart = json_decode($_COOKIE['product-cart'] ?? '');
    if(!is_array($productCart)){
      setcookie('product-cart',json_encode(array($product_add)),time() +(86400 * 30));
    }else{
        array_push($productCart, $product_add);
        setcookie('product-cart',json_encode($productCart),time() +(86400 * 30));
     }
      header('Location: ' . $_SERVER['HTTP_REFERER']);
   }elseif($method == 'delete'){
    $productCart = json_decode($_COOKIE['product-cart'] ?? '',true);
    unset($productCart[$_GET['id-product']]);
    setcookie('product-cart',json_encode($productCart),time() +(86400 * 30));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
   }else{
    $VIEWS_NAME = '../product/cart.php';
    require dirname(__DIR__).'../resources/views/layouts/productLayout.php';
   }
 }else{
    $VIEWS_NAME = '../product/shop.php';
    $max_item_product = $_GET['max-item'] ?? 12;
    $page = $_GET['page'] ?? 1;
    $sort = $_GET['sort'] ?? "DESC";
    $sort_createAT_list = 'createAt';
    $product_shop_list  =  $product -> product_all($sort,$sort_createAT_list,$max_item_product,$page);
    require dirname(__DIR__).'../resources/views/layouts/index.php';
 }
?>