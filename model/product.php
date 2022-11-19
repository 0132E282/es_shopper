<?php 
require 'dao/connectpdo.php';
class Product {
  public $id ;
  public $name ;
  public $description ;
  public $price ;
  public $status ;
  public $discount ;
  public $id_styles ;

    public function __construct($id,$name, $description, $price, $status, $discount,$id_styles_product){
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->status = $status;
        $this->discount = $discount;
        $this->id_styles = $id_styles_product;
    }
   
    // get toàn bộ sản phẩm 
    public function getProduct($sort,$max_item=50,$page ,$isDeleteSort = 0){
        $start_rows =($page - 1)*$max_item;
        $sql = "SELECT * FROM product WHERE delete_soft  = $isDeleteSort
         ORDER BY '$sort' LIMIT $max_item OFFSET $start_rows";
        $resultSet = pdo_execute($sql);
        if(count($resultSet) <= 0){
            sendResponse(200,'{"item":'.null.'}');
        }else{
            sendResponse(200,'{"item":'.json_encode($resultSet).'}');
        }
        return $resultSet;
    }
    // get lấy 1 sản phẩm
    public function getProductOne(){
        $sql = "SELECT * FROM product WHERE id = ? ";
        $resultSet = pdo_execute($sql,$this->id);
        if(count($resultSet) <= 0){
            sendResponse(200,'{"item":'.null.'}');
        }else{
            sendResponse(200,'{"item":'.json_encode($resultSet).'}');
        }
        return $resultSet;
    }
    // tạo một sản phẩm 
    public function createProduct(){
        $sql = "INSERT INTO product(
            name,
            description,
            price,
            status,
            discount,
            id_styles
        )VALUE(?,?,?,?,?,?)";
        $resultSet = pdo_execute($sql,
            $this->name,
            $this->description,
            $this->price,
            $this->status,
            $this->discount,
            $this->id_styles
        );
        sendResponse(200,'{"message":'.getStatusCodeMeeage(200).'}');
    }
    // xóa mềm (ân sản phẩm) sản phẩm
    public function deleteProductSoft($isSoft){
        $sql = "UPDATE product SET delete_soft = ? WHERE id = ?";
        $resultSet = pdo_execute($sql,$isSoft,$this->id);
        sendResponse(200,'{"message":'.getStatusCodeMeeage(200).'}');
        return $resultSet;
    }
    // xóa toàn bộ sản phẩm 
    public function deleteProduct(){
        $sql = "DELETE FROM product WHERE id = ?";
        $resultSet = pdo_execute($sql,$this->id);
        sendResponse(200,'{"message":'.getStatusCodeMeeage(200).'}');
        return $resultSet;
    }
    //update product 
    public  function updateProduct(){
        $sql = "UPDATE product SET 
         name = ?, 
         description = ?,
         price = ?, 
         status = ?, 
         discount =  ? , 
         id_styles = ?
         WHERE id = ? AND id IS NOT NULL";
         $resultSet = pdo_execute($sql , 
            $this->name ,
            $this->description ,
            $this->price ,
            $this->status,
            $this->discount,
            $this->id_styles,
            $this->id,
         );
         sendResponse(200,'{"message":'.getStatusCodeMeeage(200).'}');
         return $resultSet;
    }
    public function getIdProduct(){
        $sql = "SELECT id from product WHERE id = $this->id AND id IS NOT NULL";
        $resultSet = pdo_execute($sql);
        return $resultSet;
    }
}
?>