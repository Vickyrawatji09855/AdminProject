<?php
session_start();
$db_host="127.0.0.1:8111";
$db_user="root";
$db_pass="";
$db_name="vicky";

$conn=new mysqli($db_host,$db_user,$db_pass,$db_name);
if($conn->connect_errno){
    die("connection failed");
}else{
    // echo "connection statwer";
}
?>