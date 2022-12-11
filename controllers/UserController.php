<?php
session_start();
ob_start();
require  dirname(__DIR__) . '../model/user.php';
$controller = $_GET['user'] ?? '';
$method = $_GET['method'] ?? ''; 
$user = new User();

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
   $account_register = isset($_SESSION['account-register']) ? json_decode( $_SESSION['account-register'] ,true) : array();;
   if($method  == 'create'){
      $userAccount =  $user -> checkUser();
      $configPassword = $_POST['confirm-password'] ?? '';
      $password = $_POST['password'] ?? '';
      if(!$userAccount && $password == $configPassword  ){
        if(is_array($account_register) && count($account_register) < 1 ){
          if( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm-password'])){
            $account_register['username'] = $_POST['username'] ?? '';
            $account_register['password'] =  $password;
            $account_register['email'] = $_POST['email'];
            $_SESSION['account-register'] = json_encode($account_register);
          }else{
            $err = "bạn chua nhập thông tin";
          }
        }else{
          if(isset($_POST['last-name']) && isset($_POST['first-name'])){
            $user -> lastName = $_POST['last-name'] ?? '';
            $user -> firstName = $_POST['first-name'] ?? '';
            $user -> userName = $account_register['username'];
            $user -> password = $account_register['password'];
            $user -> email = $account_register['email'] ?? '';
            $user -> fontNumber =  $_POST['font-number'] ?? '';
            $isModal = $user -> create();
            unset($_SESSION['account-register']);

          }else{

          }
        }
      }
    }
    require_once dirname(__DIR__).'../resources/views/user/register.php';
 }
?>