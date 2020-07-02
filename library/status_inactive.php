<?php 
require_once '../database.php';

$id = base64_decode($_GET['id']);
$update = "UPDATE `student` SET `student_status`= '0' where `id` = '$id'";
$query = mysqli_query($conn, $update);
if($query){
    header("Location:student.php");
}
