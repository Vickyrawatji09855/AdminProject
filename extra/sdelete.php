<?php
include('../config.php');
$id=$_GET['deleteid'];
$sql="DELETE FROM `subcategory` WHERE `subcategory`.`id` =$id";
$result=mysqli_query($conn,$sql);
if($result){

    header('Location:http://localhost/AdminProject/subcatindex.php');
}
else{
    echo "not able to delete ";
}
?>