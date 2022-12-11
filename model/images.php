<?php
require_once 'dao/connectpdo.php';
class Images {
    public $id;
    public $photo_url;
    public $id_product;
    public function __construct(){
        $this->id = $_GET['id-images'] ?? '';
        $this->photo_url = $_POST['photo-url'] ?? '';
        $this->id_product = $_GET['id-product'] ?? '';
    }
    public function  show_image_one(){
        $sql = "SELECT * FROM images_product WHERE id_product = ".$this -> id_product."";
       return  pdo_execute_row($sql);
    }
}
?>