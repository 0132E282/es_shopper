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
function pdo_execute($sql){
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
function getStatusCodeMeeage($status){
$codes = Array(
    100 => 'Continue',
    101 => 'Switching Protocols',
    200 => 'OK',
    201 => 'Created',
    202 => 'Accepted',
    203 => 'Non-Authoritative Information',
    204 => 'No Content',
    205 => 'Reset Content',
    206 => 'Partial Content',
    300 => 'Multiple Choices',
    301 => 'Moved Permanently',
    302 => 'Found',
    303 => 'See Other',
    304 => 'Not Modified',
    305 => 'Use Proxy',
    306 => '(Unused)',
    307 => 'Temporary Redirect',
    400 => 'Bad Request',
    401 => 'Unauthorized',
    402 => 'Payment Required',
    403 => 'Forbidden',
    404 => 'Not Found',
    405 => 'Method Not Allowed',
    406 => 'Not Acceptable',
    407 => 'Proxy Authentication Required',
    408 => 'Request Timeout',
    409 => 'Conflict',
    410 => 'Gone',
    411 => 'Length Required',
    412 => 'Precondition Failed',
    413 => 'Request Entity Too Large',
    414 => 'Request-URI Too Long',
    415 => 'Unsupported Media Type',
    416 => 'Requested Range Not Satisfiable',
    417 => 'Expectation Failed',
    500 => 'Internal Server Error',
    501 => 'Not Implemented',
    502 => 'Bad Gateway',
    503 => 'Service Unavailable',
    504 => 'Gateway Timeout',
    505 => 'HTTP Version Not Supported'
);
return (isset($codes[$status])) ? $codes[$status] : " ";
}   
function sendResponse($status = 200, $body ='', $content_type = 'text/html'){
    $status_header = 'HTTP/1.1 ' . $status . ' ' .getStatusCodeMeeage($status);
    header($status_header);
    header('content-type: ' . $content_type);
    echo $body;
} 
?>