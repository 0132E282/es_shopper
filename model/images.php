<?php
require_once 'dao/connectpdo.php';
class Images {
    public $id;
    public $photo_url;
    public $id_product;
    public function __construct($id , $photo_url , $id_product){
        $this->id = $id;
        $this->photo_url = $photo_url;
        $this->id_product = $id_product;
    }
    public function  show_image_one(){
        $sql = "SELECT * FROM images_product WHERE id_product = ".$this -> id_product."";
       return  pdo_execute_row($sql);
    }
}
?>