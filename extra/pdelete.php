<?php
include('../config.php');
$id=$_GET['deleteid'];
$sql="DELETE FROM `product` WHERE `product`.`id` =$id";
$result=mysqli_query($conn,$sql);
if($result){
    $_SESSION['pdelete']="value";
        header('Location:http://localhost/AdminProject/productindex.php');
}
else{
    echo "not able to delete ";
}
?>