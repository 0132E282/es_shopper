<?php 
 require dirname(__DIR__).'../model/product.php';
 $id = $_GET['id-product'] ?? '';
 $name = $_POST['name'] ?? '';
 $description = $_POST['description'] ?? '';
 $price = $_POST['price'] ?? ' ';
 $id_style_product = $_POST['id_style'] ?? '';
 $discount = $_POST['discount'] ?? '';
 $status=$_POST['status'] ?? '';
 $product =  new Product($id,$name , $description ,$price ,$id_style_product, $discount, $status);
 // [get] ProductController.php?product=showAll?sort=DESC&limit=12&page=1
 if($_GET['product'] == 'show-all'){
    $sort = $_GET['sort'];
    $limit = $_GET['limit'];
    $page = $_GET['page'];
    $product-> getProduct($sort,$limit,$page);
 }elseif($_GET['product'] == 'show-one' && $_GET['id-product']){
    // [get] ProductController.php?product=showOne?productID=1
   $idProduct = $_GET['id-product'];
   $product-> getProductOne($idProduct);
 }elseif($_GET['product'] == 'create-product'){
   // [post] ProductController.php?product=create-product
   $product-> createProduct();
 }elseif($_GET['product'] == 'delete-soft-product'&& $_GET('id-product')){
   // [get] ProductController.php?product=delete-product?id-product= id product&is_delete-soft = true/false
   $deleteSoft=$_GET['is-delete-soft'];
   $product-> deleteProductSoft($deleteSoft);
 }elseif($_GET['product'] =='delete-product') {
    // [get] ProductController.php?product=delete-product?id-product = id product
    $product-> deleteProduct();
 }elseif($_GET['product'] == 'update-product'){
   // [get] ProductController.php?product= update-product&id-product= id product;
   $product-> updateProduct();
 }else{
  echo 1;
 }
?>