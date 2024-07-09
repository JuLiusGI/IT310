<?php
require_once 'config.php';

$log_file='../logs/db_connect.log';
$log_msg="Connection attempt at ".date("Y-m-d H:i:s")."\n";

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($conn->connect_error){
    file_put_contents($log_file,$log_msg."Connection failed:".$conn->connect_error."\n",FILE_APPEND);
    die("Connection failed: ".$conn->connect_error);
}else{
    file_put_contents($log_file,$log_msg."Connected Successfully\n",FILE_APPEND);
    echo"Connected Successfully";
}
echo"Connected Successfully";
?>