<?php 
require_once 'dao/connectpdo.php';
 class bill {
    public $name;
    public $email;
    public $font_number;
    public $id_user;
    public $payment;
    public $detail_address;
    public $city;
    public $district;
    public function __construct(){
       $this->name = $_POST['name'] ?? '';
       $this->email = $_POST['email'] ?? '';
       $this->detail_address = $_POST['detail-address'] ?? '';
       $this->city = $_POST['city'] ?? '';
       $this->district = $_POST['district'] ?? '';
       $this->font_number = $_POST['font-number'] ?? '';
       $this->id_user = $_POST['id_user'] ?? 0;
       $this->payment = $_POST['payment'] ?? '';
    }
    public function createBill(){
        $sql = "INSERT INTO bill(fullName,email,font_number,address,payment) 
        VALUE(
        '$this->name',
        '$this->email',
        '$this->font_number',
        '$this->detail_address / $this->district / $this->city',
        '$this->payment')";
        return pdo_execute_id($sql);
    }
    public function create_bill_cart($id_product,$count,$id_bill){
        $sql = "INSERT INTO bill_cart (id_bill,count,id_product) 
        VALUE($id_bill,$count,$id_product)";
        return pdo_execute_id($sql);
    }
 }
?>