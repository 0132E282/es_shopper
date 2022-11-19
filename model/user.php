<?php
 require 'dao/connectpdo.php';
 class User {
    public $id;
    public $lastName;
    public $password;
    public $firstName;
    public $fontNumber;
    public $userName;
    public $status;
    function __construct($id,$lastName,$firstName,$userName,$password,$fontNumber,$status){
        $this->id = $id;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->userName = $userName;
        $this->password= $password;
        $this->fontNumber = $fontNumber;
        $this->status = $status;
    }
    function showUserList($sort,$maxItem,$page){ 
        $per_page = ($page-1)*$maxItem;
        $sql = "SELECT * FROM user ORDER BY createAt $sort LIMIT $maxItem OFFSET $per_page";
        $resultSet = pdo_execute($sql);
        sendResponse(200,'{"item":'.json_encode($resultSet).'}');
        return $resultSet;
    }
    function showOne(){
        
    }
 }
?>