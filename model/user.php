<?php
 require_once 'dao/connectpdo.php';
 class User {
    public $id;
    public $lastName;
    public $password;
    public $firstName;
    public $fontNumber;
    public $userName;
    public $status;
    public $email;
    public function __construct($id,$userName,$password,$lastName,$firstName,$email,$fontNumber=0,$status=0){
        $this->id = $id;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->userName = $userName;
        $this->password= $password;
        $this->fontNumber = $fontNumber;
        $this->status = $status;
        $this->email = $email;
    }
    public function showUserList($sort,$maxItem,$page){ 
        $per_page = ($page-1)*$maxItem;
        $sql = "SELECT * FROM user ORDER BY createAt $sort LIMIT $maxItem OFFSET $per_page";
        $resultSet = pdo_execute_row($sql);
        sendResponse(200,'{"item":'.json_encode($resultSet).'}');
        return $resultSet;
    }
    public function checkUser(){
        $sql = "SELECT * FROM user WHERE username = '$this->userName'";
        $resultSet = pdo_execute_row($sql);
        return $resultSet;
    }
    public function login(){
        $sql = "SELECT * FROM user WHERE username = '$this->userName' AND password = '$this->password'";
        $resultSet = pdo_execute_row($sql);
        return $resultSet;
    }
    public function full_name(){
        return $this->firstName. ' ' . $this->lastName;
    }
    public function create(){
        $sql = "INSERT INTO user (
            username, 
            password,
            first_name,
            last_name,
            email,
            font_number,
            status) value(
                '$this->userName',
                '$this->password',
                '$this->firstName',
                '$this->lastName',
                '$this->email',
                 $this->fontNumber,
                 $this->status)";
        $resultSet = pdo_execute_id($sql);
        sendResponse(200,'{"item":'.json_encode($resultSet).'}');
        return $resultSet;
    }
 }
?>