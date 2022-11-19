<?php 
  require dirname(__DIR__).'../model/product.php';
  if($_GET['site'] == 'about'){
    $VIEWS_NAME = '../site/about.php';
  }else{
    
    $VIEWS_NAME = '../site/home.php';
  }

  require '../resources/views/layouts/index.php';
?>