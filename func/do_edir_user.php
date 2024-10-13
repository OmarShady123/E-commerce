<?php
include("connect.php");
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$pr = $_POST['pr'];

$update = "UPDATE `users` SET `id`='$id',`username`='$username',`password`='$password',`email`='$email',`gender`='$gender',`pr`='$pr' WHERE 1";

$conn -> query($update);
header("locarion:../users.php");