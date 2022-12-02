<?php
session_start();
ob_start();
require  dirname(__DIR__) . '../model/user.php';
$controller = $_GET['user'] ?? '';
$method = $_GET['method'] ?? ''; 
$id_user = $_GET['id_user'] ?? '';
$username = $_POST ['username'] ?? '';
$password = $_POST ['password'] ?? '';
$last_name = $_POST ['last_name'] ?? '';
$first_name = $_POST ['first_name'] ?? '';
$email = $_POST ['email'] ?? '';
$user = new User($id_user,$username,$password,$last_name, $first_name,$email);

if($controller == 'login'){
    $err ='';
    if($method == 'put'){
        $userAccount = $user -> login();
        if($userAccount){
           $_SESSION['client'] =  $userAccount[0];
           header('location: SiteController.php');
        }else{
          $err = 'tài khoản hoạt mật khẩu không đúng';
        }
    }
    require_once dirname(__DIR__).'../resources/views/user/login.php';
 }elseif($controller == 'logout'){
   unset($_SESSION['client']);
   header('location: SiteController.php');
 }elseif($controller = 'register' ){
   $isModal = false;
   if($method  == 'create'){
      $userAccount =  $user -> checkUser();
      $configPassword = $_POST['confirm-password'];
      if(!$userAccount && $password == $configPassword){
        $user->create();
        $isModal = true;
      }
   }
   require_once dirname(__DIR__).'../resources/views/user/register.php';
 }
?>