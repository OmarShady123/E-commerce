<?php
session_start();
require 'connect.php'; 

$user_id = $_SESSION['user_id'];
$pro_id = $_POST['pro_id'];
$pro_name = $_POST['pro_name'];


$stmt = $db->prepare("INSERT INTO cart (id,user_id, pro_id, quantity) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iis", $user_id, $pro_id, $pro_name);

if ($stmt->execute()) {
    header("Location: cart.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
?>
