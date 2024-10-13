<?php

session_start();

if(!isset($_SESSION['id']))
{
  header("location: login.php");

}
?>

<?php 
include("fun/connect.php");
@$user_id= $_SESSION['id'];
@$pro_id= $_GET['id'];
$quantity = 1 ;

$sql = "SELECT * FROM cart WHERE user_id = ? AND pro_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $pro_id);
$stmt->execute();
$result = $stmt->get_result();

$insert = "INSERT INTO cart(user_id, pro_id, quantity) VALUES ('$user_id','$pro_id',1)";
$conn->query($insert);

header("location:cart.php");
?>
