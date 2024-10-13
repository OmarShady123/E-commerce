<?php 
include("connect.php");
$id = $_GET['id'];

$delete ="DELETE FROM users WHERE id =$id";
$conn -> query($delete); 

header("location:../users.php");

?>