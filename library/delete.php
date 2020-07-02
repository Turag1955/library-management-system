<?php 
require_once '../database.php';
if(isset($_GET['delete-book'])){
    $id = base64_decode($_GET['delete-book']);
    
    $sql = "DELETE FROM `book` WHERE `id`= '$id'";
    $query = mysqli_query($conn, $sql);
    if($query){
        header("Location:book_manage.php");
    }
}