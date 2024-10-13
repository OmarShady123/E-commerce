<?php
// Retrieve form data

echo "<pre>";
//print_r($_POST);
print_r($_FILES);



$id = $_POST['id'];
$name = $_POST["name"];
$price = $_POST["price"];
$count = $_POST["count"];
$descr = $_POST["descr"];
//$img = $_POST["image"];
$cat = $_POST["category"];
$brand = $_POST["brand"];

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

echo $new_img_name;

move_uploaded_file($img_tmp, "../img/$new_img_name");



// Database connection
include("connect.php");

// Ensure brand and category IDs are valid
if (empty($cat) || empty($brand)) {
    echo "Error: Category and Brand are required.";
    exit();
}

// Prepare the SQL statement
$insert = "INSERT INTO products (id,name, price, image, cat, brand, count, descr) VALUES ('$id','$name', '$price', '$new_img_name', '$cat', '$brand', '$count', '$descr')";

// Execute the SQL statement and handle errors
if ($conn->query($insert) === FALSE) {
    echo "Error: " . $conn->error;
} else {
    header("Location: ../products.php");
    exit(); // Ensure no further code is executed after the redirect
}
?>