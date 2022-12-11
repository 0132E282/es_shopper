<?php 
  require  dirname(__DIR__) . '../model/styles.php';
  require dirname(__DIR__) .'../model/product.php';

  $controller = $_GET['site'] ?? '';
  $method = $_GET['method'] ?? ' ' ;

  $idStyle = $_GET['id_styles']??'';
  $nameStyle = $_POST['name_style']??'';
  $avatarStyle = $_POST['avatar_style']??'';
  $style = new Styles($idStyle,$nameStyle,$avatarStyle);

  $product =  new Product();

  if($controller == 'checkout'){
    $VIEWS_NAME = '../site/checkout.php';
    require dirname(__DIR__) . '../resources/views/layouts/productLayout.php';
  }elseif($controller == 'contact'){
    $VIEWS_NAME = '../site/contact.php';
    require dirname(__DIR__) . '../resources/views/layouts/productLayout.php';
  }else{
    $VIEWS_NAME = '../site/home.php';
    $max_item = 6;
    $list_style = $style -> showAll($max_item);
    $max_item_product = 8;
    $page = 1;
    $sort = "DESC";
    $sort_name_trandy = 'count_buy';
    $product_trandy_list  =  $product -> product_all($sort,$sort_name_trandy,$max_item_product,$page);
    $sort_name_createAt = 'createAt';
    $product_create_list  =  $product -> product_all($sort,$sort_name_createAt,$max_item_product,$page);
    require_once dirname(__DIR__) . '../resources/views/layouts/index.php';
  }


?>