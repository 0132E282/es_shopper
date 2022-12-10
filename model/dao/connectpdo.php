<?php 
// connect to the database
function pdo_get_connection($nameServer = 'localhost',$userName='root',$password=''){
    try {
        $connection = new PDO( "mysql:host=$nameServer;dbname=eshopper", $userName, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
    catch(PDOException $e) {
        echo "connection failed: ". $e->getMessage();
    }
} 
function pdo_execute_row($sql){
    $sql_args = array_slice(func_get_args(),1);
    try{
        $connect = pdo_get_connection();
        $stmt = $connect->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetchAll();   
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($connect);
    }
}
function pdo_execute_id($sql){
    $sql_args = array_slice(func_get_args(),1);
    try{
        $connect = pdo_get_connection();
        $stmt = $connect->prepare($sql);
        $stmt->execute($sql_args);
        $id  = $connect -> lastInsertId();
        return $id;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($connect);
    }
}
