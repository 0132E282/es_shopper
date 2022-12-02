<?php 
require_once 'dao/connectpdo.php';
class Styles {
    public $id;
    public $name;
    public $avatar;
    public function __construct($id,$name,$avatar){
        $this->id = $id;
        $this->name = $name;
        $this->avatar = $avatar;
    }
    public function showAll($max_time=25){
        $sql = "SELECT * FROM styles_product ORDER BY createAt DESC limit $max_time";
        $resultSet = pdo_execute_row($sql);
        return $resultSet;
    }
    public function create(){
        $sql = "INSERT INTO styles_product(name,avatar) VALUE (?,?)";  
        $resultSet = pdo_execute_row($sql,$this->name,$this->avatar);
        sendResponse(200,'{"message":ok}');
        return $resultSet;
    } 
    public function delete(){
        $sql = "DELETE FROM styles_product WHERE id = ?";  
        $resultSet = pdo_execute_row($sql,$this->id);
        sendResponse(200,'{"message":ok}');
        return $resultSet;
    }
    public function update(){
        $sql = "UPDATE styles_product SET 
        name = ?,
        avatar = ?,
        WHERE id = ?";     
        $resultSet = pdo_execute_row($sql,$this->name,$this->avatar,$this->id);
        sendResponse(200,'{"message":ok}');
        return $resultSet;
    }      
}
?>