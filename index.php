<?php
  $controllerName = ucfirst($_GET['controller'] ?? 'site') . 'Controller';
  //default siteController
  $actionName = ($_GET['action'] ?? 'index');
  require "./public/controller/$controllerName.php";
  // lấy ra hành động sử dụng class 
  $controller = new $controllerName;
  $controller -> $actionName();
?>