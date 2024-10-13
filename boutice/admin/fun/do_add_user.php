<?php

$uname = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];
$gen = $_POST['gender'];
$pr = $_POST['pr'];

include("../fun/connect.php");
$insert = "INSERT INTO users(username, password, email, gender, pr) VALUES ('$uname','$pass','$email','$gen','$pr')" ;
$conn -> query($insert);
header("location:../users.php");