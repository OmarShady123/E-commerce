<?php

$name = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$descr = $_POST['descr'];
// $image = $_POST['image'];
$category = $_POST['category'];
$brand = $_POST['brand'];

$arr = array();

for ($i=0 ; $i< count($_FILES['images']['name']);$i++){

$image_name = $_FILES['images']['name'][$i];
$image_tmp = $_FILES['images']['tmp_name'][$i];
$new_image_name = time() . rand(1 , 100000) . $image_name ;
move_uploaded_file($image_tmp , "../img/$new_image_name");
array_push($arr , "$new_image_name");

}
$arr1 = implode(",", $arr);

echo "<pre>";
print_r($arr);
echo "</pre>";

echo $arr1;

include("../fun/connect.php");
$insert = "INSERT INTO products( name, price, image, cat, brand, count, describtion) VALUES ('$name','$price','$arr1','$category','$brand','$count','$descr') " ;
$conn -> query($insert);

header("location:../products.php");