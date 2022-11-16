<?php 
require 'dao/connectpdo.php';
class Product {
    // get toàn bộ sản phẩm 
    function get_product($sort){
        $sql = "SELECT * FROM product ORDER BY ? ";
        $resultSet = pdo_execute($sql,$sort);
        if(count($resultSet) <= 0){
            sendResponse(200,'{"item":'.null.'}');
        }else{
            sendResponse(200,'{"item":'.json_encode($resultSet).'}');
        }
        return $resultSet;
    }
    // get lấy 1 sản phẩm
    function get_product_one($id){
        $sql = "SELECT * FROM product WHERE id = ? ";
        $resultSet = pdo_execute($sql,$id);
        if(count($resultSet) <= 0){
            sendResponse(200,'{"item":'.null.'}');
        }else{
            sendResponse(200,'{"item":'.json_encode($resultSet).'}');
        }
        return $resultSet;
    }
    // tạo một sản phẩm 
    function createProduct($name,$description,$price,$discount,$status,$id_styleProduct){
        $sql = "INSERT INTO product(
            name,
            description,
            price,
            status,
            discount,
            id_styles_product
        )VALUE(?,?,?,?,?,?)";
        $resultSet = pdo_execute($sql,$name,$description,$price,$status,$discount,$id_styleProduct);
        sendResponse(200,'{"message":'.getStatusCodeMeeage(200).'}');
    }
    // xóa mềm (ân sản phẩm) sản phẩm
    function deleteProductSoft($id,$isSoft){
        $sql = "UPDATE product SET delete_soft = ? WHERE id = ?";
        $resultSet = pdo_execute($sql,$isSoft,$id);
        sendResponse(200,'{"message":'.getStatusCodeMeeage(200).'}');
        return $resultSet;
    }
    // xóa toàn bộ sản phẩm 
    function deleteProductAll($id){
        $sql = "DELETE FROM product WHERE id = ?";
        $resultSet = pdo_execute($sql,$id);
        sendResponse(200,'{"message":'.getStatusCodeMeeage(200).'}');
        return $resultSet;
    }
    //update product 
    function updateProduct($id,$name,$description,$price,$status,$discount,$id_styleProduct){
        $sql = "UPDATE product SET 
        name = ? , 
        description = ? ,
         price = ? , 
         status = ? , 
         discount = ? , 
         id_styles_product 
         WHERE id = ?";
        $resultSet = pdo_execute($sql,$name,$description,$price,$status,$discount,$id_styleProduct,$id);
        sendResponse(200,'{"message":'.getStatusCodeMeeage(200).'}');
        return $resultSet;
    }

}
?>