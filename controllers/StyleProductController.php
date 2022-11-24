<?php
 require dirname(__DIR__).'../model/styles.php';
 $name = $_POST['name'] ?? '';
 $id = $_GET['id'] ?? '';
 $style = new Styles($id,$name);
 if($_GET['style'] == 'show-all'){
  // [get ] show all styles 
    $style->showAll();
 }elseif($_GET['style'] == 'create'){
  // [post] create a new style
    $style->create();
 }elseif($_GET['style'] == 'delete'){
  // [post] delete a style
   $style->delete();
 }elseif($_GET['style'] == 'update'){
   //project_shop_fashion/shop_fashion/controllers/StyleProductController.php?style=create
   // [post] update a style
   $style -> update();
 }
?>