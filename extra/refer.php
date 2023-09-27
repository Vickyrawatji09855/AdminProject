<?php 
include('../config.php');

$sql= "select * from `category` ";
$result=mysqli_query($conn,$sql);

$html='<table><thead><tr><th>Title</th><th>Description</th><th>Status</th></tr></thead><tbody>';

while($row=mysqli_fetch_assoc($result)){
    $html.='<tr><td>'.$row['title'].'</td> <td>'.$row['description'].'</td> <td>'.$row['status'].'</td>  </tr>';
}
$html.='</tbody></table>';

header('Content-Type:application/xls');
header('Content-Disposition:attachment; filename="report.xls" ');
echo $html;
?>