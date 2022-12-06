<?php 
require_once 'dao/connectpdo.php';
class Review {
    public $text ;
    public $name_client;
    public $email;
    public $id_product;
    public $review;
    public function __construct($text,$name_client,$email,$review,$id_product){
        $this->text = $text;
        $this->name_client = $name_client;
        $this->email = $email;
        $this->$id_product = $id_product;
        $this->review = $review;
    }
    public function create_comment(){
        $sql ="INSERT INTO review(text,name,id_product,email,review) VALUE ('$this->text','$this->name_client',$this->id_product,'$this->email',".$this->review.")";
        pdo_execute_row($sql );
        return true;
    }
}
?>