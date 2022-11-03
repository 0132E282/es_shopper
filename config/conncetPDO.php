<?php
 function concent_get_PDO($servername = "localhost",$username = "root" ,$password = ""){
    // connect to the server shop_fashion
    try {
        $conn = new PDO("mysql:host=$servername;dbname=shop_fashion", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
 }
?>