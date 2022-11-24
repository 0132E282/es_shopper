<?php
require dirname(__DIR__).'../model/user.php';
 $id = $_GET['id-user'] ?? '';
 $lastName = $_POST['lastName'] ?? '';
 $firstName = $_POST['firstName']?? '';
 $userName = $_POST['userName']?? '';
 $password = $_POST['password']?? '';
 $fontNumber = $_POST['fontNumber']?? '';
 $status = $_POST['status']?? '';
 $user = new User($id,$lastName,$firstName, $userName ,$password,$fontNumber,$status);
 if($_GET['user'] == 'show-all'){
    $maxItem = $_GET['limit'] ?? 25;
    $page = $_GET['page'] ?? 1;
    $sort = $_GET['sort'] ?? 'DESC';
    $user->showUserList($sort,$maxItem,$page);
 }elseif(['user'] == 'show-one' && $id){
   
 }
?>