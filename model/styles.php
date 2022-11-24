<?php 
require 'dao/connectpdo.php';
class Styles {
    public $id;
    public $name;
    public function __construct($id, $name){
        $this->id = $id;
        $this->name = $name;
    }
    public function showAll(){
        $sql = "SELECT * FROM style_product ORDER BY createAt DESC limit 25 ";
        $resultSet = pdo_execute($sql);
        sendResponse(200,'{"item":'.json_encode($resultSet).'}');
    }
    public function create(){
        $sql = "INSERT INTO style_product(name) VALUE (?)";  
        $resultSet = pdo_execute($sql,$this->name);
        sendResponse(200,'{"message":ok}');
    } 
    public function delete(){
        $sql = "DELETE FROM style_product WHERE id = ?";  
        $resultSet = pdo_execute($sql,$this->id);
        sendResponse(200,'{"message":ok}');
    }
    public function update(){
        $sql = "UPDATE style_product SET name = ? WHERE id = ?";     
        $resultSet = pdo_execute($sql,$this->name,$this->id);
        sendResponse(200,'{"message":ok}');
    }      
}
?>