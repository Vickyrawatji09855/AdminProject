<?php
include('config.php');
$id=$_GET['deleteid'];
$sql="DELETE FROM `people` WHERE `people`.`id` =$id";
$result=mysqli_query($conn,$sql);
if($result){
    header('Location:http://localhost/AdminProject/table.php');
}
else{
    echo "not able to delete ";
}

?>