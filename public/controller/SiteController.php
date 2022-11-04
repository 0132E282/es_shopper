<?php 
class SiteController {
  function index (){
    $VIEW_NAME = './resources/views/site/home.php';
    include './resources/views/layouts/main.php';
  }
}
?>