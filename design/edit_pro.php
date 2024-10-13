<?php

$id = $_GET['id'];
$select = "SELECT * FROM products WHERE id = '$id'";
$result = $conn->query($select);
$product = $result -> fetch_assoc(); 
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نموذج مع 7 تسميات</title>
    <style>
        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <form method="POST" action="func/do_edit_pro.php?id=<?=$id?>" 
    enctype="multipart/form-data">
       <!--<label for="id">ID</label>
        <input type="number" id="id" name="id">-->

        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?= $product['name']?>">
        

        <label for="price">Price</label>
        <input type="number" id="price" name="price" value="<?= $product['price']?>">

        <label for="descr">description</label>
        <input type="text" id="descr" name="descr" value="<?= $product['descr']?>">

        <label for="image">Image</label>
        <input type="file" id="image" name="image">
        <img src="img/<?= $product['image']?>" alt="" 
        style="width: 150px;height:150px">

        <label for="category">Category</label>
    <select class="form-control" name="category" id="category" value="<?= $product['category']?>">
        <?php
        $select_cat = "SELECT * FROM category";
        $result_cat = $conn->query($select_cat);
        while($cat = $result_cat->fetch_assoc()){
        ?>
            <option value="<?= $cat['id'] ?>">
                <?php
                if ($cat['id'] === $product['cat']){
                     echo "selected";}
                ?>
            </option>
        <?php
        }
        ?>
    </select>
        <!--<input type="text" id="category" name="category">-->

        <label for="brand">Brand</label>
    <select class="form-control" name="brand" id="brand" value="<?= $product['brand']?>">
        <?php
        $select_brand = "SELECT * FROM brand";
        $result_brand = $conn->query($select_brand);
        while($brand = $result_brand->fetch_assoc()){
        ?>
            <option value="<?= $brand['id'] ?>">                <?php
                if ($brand['id'] === $product['brand']){
                     echo "selected";}
                ?></option>
        <?php
        }
        ?>
    </select>
        <!--<input type="text" id="brand" name="brand">-->

        <label for="count">Count</label>
        <input type="number" id="count" name="count" value="<?= $product['count']?>">

       <!-- <label for="descr">description</label>
        <input type="text" id="descr" name="descr">

        <label for="views">Views</label>
        <input type="text" id="views" name="views">-->

        <button type="submit">UPDATE PRODUCT</button>
    </form>

</body>
</html>