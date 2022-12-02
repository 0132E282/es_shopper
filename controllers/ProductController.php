<?php 
 require dirname(__DIR__).'../model/product.php';
 
 $controller = $_GET['product'] ?? ' ';
 $id_product = $_GET['id-product'] ?? '';
 $name = $_POST['name'] ?? '';
 $description = $_POST['description'] ?? '';
 $price = $_POST['price'] ?? ' ';
 $id_style_product = $_POST['id_style'] ?? '';
 $discount = $_POST['discount'] ?? '';
 $status=$_POST['status'] ?? '';
 $product =  new Product( $id_product,$name , $description ,$price , $status, $discount,$id_style_product);
 // [get] ProductController.php?product=showAll?sort=DESC&limit=12&page=1
 if($controller == 'show-all'){
    $sort = $_GET['sort'] ?? 'DESC';
    $limit = $_GET['limit'] ?? 50;
    $page = $_GET['page'] ?? 1;
    $product-> getProduct($sort,$limit,$page);
 }elseif($controller == 'show-one' &&   $id_product ){
   $product-> getProductOne($id_product);
 }elseif($controller == 'create-product'){
   // [post] ProductController.php?product=create-product
   $product-> createProduct();
 }elseif($controller == 'delete-soft-product'&&  $id_product){
   // [get] ProductController.php?product=delete-product?id-product= id product&is_delete-soft = true/false
   $deleteSoft=$_GET['is-delete-soft'];
   $product-> deleteProductSoft($deleteSoft);
 }elseif($controller =='delete-product') {
    // [get] ProductController.php?product=delete-product?id-product = id product
    $product-> deleteProduct();
 }elseif($controller == 'update-product'){
   // [get] ProductController.php?product= update-product&id-product= id product;
   $product-> updateProduct();
 }elseif($controller == 'detail-product'){
   $VIEWS_NAME = '../product/detail.php';
   require '../resources/views/layouts/productLayout.php';
 }elseif($controller == 'cart'){
   $VIEWS_NAME = '../product/cart.php';
   require dirname(__DIR__).'../resources/views/layouts/productLayout.php';
 }elseif($controller == 'add-cart' && $id_product){
  $product = array(
    'id' => $id_product,
    'count' => $_GET['count-product'] ?? 1,
    'size' => $_GET['size'] ?? '',
    'color'=> $_GET['color'] ?? '',
  );
  $productCart = json_decode($_COOKIE['product-cart'] ?? '');
 
  if(!is_array($productCart)){
    setcookie('product-cart',json_encode(array($product)),time() +(86400 * 30));
  }else{
      array_push($productCart,$product);
      setcookie('product-cart',json_encode($productCart));
   }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
 }else{
  $VIEWS_NAME = '../product/shop.php';
  require dirname(__DIR__).'../resources/views/layouts/index.php';
 }
?>