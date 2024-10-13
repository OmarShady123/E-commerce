<?php

$id = $_GET['id'];

include("connect.php");

$delete= "DELETE FROM cart WHERE id = '$id' ";
$conn -> query($delete); 

header("location:../cart.php?id=$id");


?>