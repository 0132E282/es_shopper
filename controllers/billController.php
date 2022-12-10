<?php 
require_once '../model/bill.php';
$controller = $_GET['bill'] ?? '';
$method = $_GET['method'] ?? '';

$bill = new Bill();

if($controller === 'create'){
  $id_bill =  $bill -> createBill();
  if($id_bill){
    $productCart = $_COOKIE['product-cart'] ?? '';
    foreach(json_decode($productCart,true) as $product){
       $bill -> create_bill_cart($product['id'],$product['count'],$id_bill);
    }
  }
  header('Location: '. $_SERVER['HTTP_REFERER']);
}
?>