<?php 
  require  dirname(__DIR__) . '../model/styles.php';
  $controller = $_GET['site'] ?? '';
  $method = $_GET['method'] ?? ' ' ;
  $idStyle = $_GET['id_styles']??'';
  $nameStyle = $_POST['name_style']??'';
  $avatarStyle = $_POST['avatar_style']??'';
  $style = new Styles($idStyle,$nameStyle,$avatarStyle);

  if($controller == 'checkout'){
    $VIEWS_NAME = '../site/checkout.php';
    require dirname(__DIR__) . '../resources/views/layouts/productLayout.php';
  }elseif($controller == 'contact'){
    $VIEWS_NAME = '../site/contact.php';
    require dirname(__DIR__) . '../resources/views/layouts/productLayout.php';
  }else{
    $max_item = 6;
    $list_style = $style -> showAll($max_item);
    $VIEWS_NAME = '../site/home.php';
    require dirname(__DIR__) . '../resources/views/layouts/index.php';
  }


?>