

<?php // PHP part
session_start();          // Start the session
$_SESSION['student']=array(); // Makes the session an array
$student_name="vicky"; //student_name form field name
$student_city="don";   //city_id form field name
array_push($_SESSION['student'],$student_name,$student_city);   
// print_r($_SESSION['student']);
 for($i = 0 ; $i < count($_SESSION['student']) ; $i++) {
  echo "<br>".$_SESSION['student'][$i];
 }
?>


