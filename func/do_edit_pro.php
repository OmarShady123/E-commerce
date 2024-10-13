<?php
// Retrieve form data

//echo "<pre>";
//print_r($_POST);
//print_r($_FILES);



include("connect.php");
$name = $_POST["name"];
$price = $_POST["price"];
$count = $_POST["count"];
$descr = $_POST["descr"];
//$img = $_POST["image"];
$cat = $_POST["category"];
$brand = $_POST["brand"];

$id = $_GET['id'];
if ($_FILES['image']['error'] ==0){



$img_name= $_FILES['image']['name'];
$img_tmp = $_FILES['image']['tmp_name'];
$img_size = $_FILES['image']['size'];

$img_exp = explode(".", $img_name);
$img_ext = end($img_exp);


$allow_ext = ['jpg', 'jpeg', 'bmb', 'gif'];

if(!in_array($img_ext, $allow_ext)){
    echo "image type error";
    exit();
    

}

if($img_size > 3000000){
    echo "file is too large";
    exit();
}

$new_img_name = time() . rand(1, 100000) . $img_name;

//echo $new_img_name;

move_uploaded_file($img_tmp, "../img/$new_img_name");
$update = "UPDATE `products` SET `name`='$name',`price`='$price',`image`='$new_imge_name',`cat`='$category',`brand`='$brand',`count`='$count',`descr`='$descr' WHERE id = ";
}
else{
    $update = "UPDATE `products` SET `name`='$name',`price`='$price',`cat`='$category',`brand`='$brand',`count`='$count',`descr`='$descr' WHERE id = ";
}


// Database connection


// Ensure brand and category IDs are valid
//if (empty($cat) || empty($brand)) {
    //echo "Error: Category and Brand are required.";
    //exit();
//}

// Prepare the SQL statement
//$update = "UPDATE `products` SET `name`='$name',`price`='$price',`image`='$new_imge_name',`cat`='$category',`brand`='$brand',`count`='$count',`descr`='$descr' WHERE id = ";

// Execute the SQL statement and handle errors
//if ($conn->query($update) === FALSE) {
    //echo "Error: " . $conn->error;
//} else {
    //header("Location: ../products.php");
    //exit(); // Ensure no further code is executed after the redirect
//}

$conn -> query($update);
header("locarion:../products.php");



?>