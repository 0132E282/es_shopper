<?php
require_once 'dao/connectpdo.php';
class Product {
    public $id ;
    public $name ;
    public $description ;
    public $price ;
    public $status ;
    public $discount ;
    public $id_styles ;
    public $style_name;
    public function __construct(){
        $this->id = $_GET['id-product'] ?? '';
        $this->name = $_POST['name'] ?? '';
        $this->description =  $_POST['description'] ?? '';
        $this->price = $_POST['price'] ?? '';
        $this->status = $_POST['status'] ?? '';
        $this->discount = $_POST['discount'] ?? '';
        $this->id_styles = $_POST['id_style'] ?? '';
    }
   
    // get toàn bộ sản phẩm 
    public function product_all($sort,$sort_name,$max_item=50,$page,$isDeleteSort = 0){
        $start_rows = ($page - 1) * $max_item;
        $sql ="SELECT
        product.id as id,
        product.name_product as name,
        product.description as description,
        product.price_product as price,
        product.discount as discount,
        product.createAt as createAt,
        product.count_product as count_product,
        product.discount as discount,
        product.count_buy as count_buy,
        styles_product.name as name_styles
        from product INNER JOIN styles_product ON styles_product.id = product.id_styles
        ORDER BY $sort_name $sort LIMIT $max_item OFFSET $start_rows";
        $product_list = array();
        $productDataBase = pdo_execute_row($sql);
        foreach($productDataBase as $product){
            $sql_image = 'SELECT photo_url FROM images_product WHERE id_product = '.$product['id'].' AND is_main = 1 ';
            $image =  pdo_execute_row($sql_image);
            $product['image'] = $image[0][0];
            array_push($product_list,$product);
        }
        return $product_list;
    }
    // get lấy 1 sản phẩm

    public function show_product_one(){
        $sql = "SELECT
        product.id as id,
        product.name_product as name,
        product.description as description,
        product.price_product as price,
        product.discount as discount,
        product.createAt as createAt,
        product.count_product as count_product,
        product.count_buy as count_buy,
        product.count_like as count_like,
        product.count_comment as count_comment,
        product.updateAt as updateAt,
        product.deleteAt as deleteAt,
        styles_product.name as name_styles
        from product INNER JOIN styles_product ON styles_product.id = product.id_styles WHERE  product.id = ?";
        $product = pdo_execute_row($sql,$this->id);
        if($product){
            $sql_image = 'SELECT photo_url FROM images_product WHERE id_product = '.$product[0]['id'].' AND is_main = 1 ';
            $image =  pdo_execute_row($sql_image);
            $product[0]['image'] = $image[0][0];
        }
        return $product[0];
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
        $resultSet = pdo_execute_row($sql,
            $this->name,
            $this->description,
            $this->price,
            $this->status,
            $this->discount,
            $this->id_styles
        );
    }
    // xóa mềm (ân sản phẩm) sản phẩm
    public function deleteProductSoft($isSoft){
        $sql = "UPDATE product SET delete_soft = ? WHERE id = ?";
        $resultSet = pdo_execute_row($sql,$isSoft,$this->id);
        sendResponse(200,'{"message":'.getStatusCodeMeeage(200).'}');
        return $resultSet;
    }
    // xóa toàn bộ sản phẩm 
    public function deleteProduct(){
        $sql = "DELETE FROM product WHERE id = ?";
        $resultSet = pdo_execute_row($sql,$this->id);
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
         $resultSet = pdo_execute_row($sql , 
            $this->name ,
            $this->description ,
            $this->price ,
            $this->status,
            $this->discount,
            $this->id_styles,
            $this->id,
         );

         return $resultSet;
    }
    public function getIdProduct(){
        $sql = "SELECT id from product WHERE id = $this->id AND id IS NOT NULL";
        $resultSet = pdo_execute_row($sql);
        return $resultSet;
    }
}
?>