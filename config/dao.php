<?php
  // hàm dùng kết nối database shop_fashion
 function concent_get_PDO($servername = "localhost",$username = "root" ,$password = ""){
    try {
        $conn = new PDO("mysql:host=$servername;dbname=shop_fashion", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
 }
 // thư viện dùng để viết hàm sql 
 function pdo_execute($sql){
  $sql_args = array_slice(concent_get_PDO(),1);
    try{
        $connect = pdo_get_connection();
        $stmt = $connect->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetchAll();
        $id = $connect->lastInsertId();
        return array(
            "id" => $id,
            "row" => $row
        );
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($connect);
    }
 }
?>