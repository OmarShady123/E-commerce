<?php

  

 include("connect.php");

$name = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$descr = $_POST['descr'];
// $image = $_POST['image'];
$category = $_POST['category'];
$brand = $_POST['brand'];

$id = $_GET['id'];

// echo "<pre>";

// print_r($_FILES);



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
    


$update = "UPDATE products SET name='$name',price='$price',image='$arr1',cat='$category',brand='$brand',count='$count',describtion='$descr'  WHERE id = $id" ;



$conn -> query($update);

header("location:../products.php");