<?php
include('../config.php');
$id=$_GET['deleteid'];
$sql="DELETE FROM `category` WHERE `category`.`id` =$id";
$result=mysqli_query($conn,$sql);
if($result){
    header('Location:http://localhost/AdminProject/indexcategory.php');
}
else{
    echo "not able to delete ";
}
?>