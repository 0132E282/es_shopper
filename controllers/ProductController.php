<?php 
 require dirname(__DIR__).'../model/product.php';
 $product =  new Product();
 // [get] ProductController.php?product=showAll?sort=DESC
 if($_GET['product'] == 'show-all' && $_GET['sort']){
    $sort = $_GET['sort'];
    $product-> get_product($sort);
 }elseif($_GET['product'] == 'show-one' && $_GET['id-product']){
    // [get] ProductController.php?product=showOne?productID=1
   $idProduct = $_GET['id-product'];
   $product-> get_product_one($idProduct);
 }elseif($_GET['product'] == 'create-product'){
   // [post] ProductController.php?product=create-product
   $name = $_POST['name'];
   $description = $_POST['description'];
   $price = $_POST['price'];
   $id_style_product = $_POST['id_style'];
   $discount = $_POST['discount'];
   $status=$_POST['status'];
   $product-> createProduct($name,$description,$price,$status,$discount,$id_style_product);
 }elseif($_GET['product'] == 'delete-soft-product'){
   // [get] ProductController.php?product=delete-product?id_product= id product&is_delete-soft = true/false
   $id=$_GET['id_product'];
   $deleteSoft=$_GET['is_delete-soft'];
   $product-> deleteProductSoft($id,$deleteSoft);
 }elseif($_GET['product'] == 'delete-product') {
    // [get] ProductController.php?product=delete-product?id_product = id product
   $id=$_GET['id_product'];
   $product-> deleteProductSoft($id);
 }elseif($_GET['product'] == 'update-product'){
   // [get] ProductController.php?product= update-product
   $name = $_POST['name'];
   $description = $_POST['description'];
   $price = $_POST['price'];
   $id_style_product = $_POST['id_style'];
   $discount = $_POST['discount'];
   $status=$_POST['status'];
   $product-> createProduct($name,$description,$price,$status,$discount,$id_style_product);
 }else{
   echo 1;
 }
?>