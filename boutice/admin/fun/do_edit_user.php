<?php


 $username = $_POST['username'];
 $pass = $_POST['password'];
 $email = $_POST['email'];
 $gen = $_POST['gender'];
 $pr = $_POST['pr'];


$id = $_GET['id'];


include("connect.php");

$update = "UPDATE users SET username ='$username',password='$pass',email='$email',gender='$gen',pr='$pr' WHERE id = $id " ;

$conn -> query($update);

header("location:../users.php");