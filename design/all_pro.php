<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جدول 4x4</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 20px; /* تعديل قيمة الـ padding هنا */
            text-align: center;
        }
    </style>
</head>
<body>
    <table border="1" cellpadding="30" cellspacing="5">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
            <th>image</th>
            <th>category</th>
            <th>brand</th>
            <th>count</th>
            <th>description</th>
            <th>controls</th>
  
            <!--<th>views</th>-->
        </tr>
<?php
$select = "SELECT * FROM products";
$result = $conn -> query( $select );
while($pro = $result->fetch_assoc()){
    ?>



        <tr>
            <td><?= $pro['id']?></td>
            <td><?= $pro['name']?></td>
            <td><?= $pro['price']?></td>
            <td><img src="img/<?= $pro['image']?>"
            style="width: 100px;height: 100px;"></td>
            <td><?php $cat_id = $pro['cat'];
            $select_cat = "SELECT * FROM category WHERE id = '$cat_id'";
            $result_cat = $conn -> query($select_cat);
            $cat = $result_cat -> fetch_assoc();
            echo $cat['name']?>
            </td>
            <td><?php $brand_id = $pro['brand'];
            $select_brand = "SELECT * FROM brand WHERE id = '$brand_id'";
            $result_brand = $conn -> query($select_brand);
            $brand = $result_brand -> fetch_assoc();
            echo $brand['name']?>
            </td>
            <td><?= $pro['count']?></td>
            <td><?= $pro['descr']?></td>
            <!--<td><?= $pro['views']?></td>-->
            <td>


            <a href="?action=edit&id=<?= $pro['id']?>"><button class="btn btn-primary">Edit</button></a>
            <a href="func/delete_pro.php?id=<?= $pro['id']?>"><button class="btn btn-danger">Delete</button></a> 
            </td>          
        </tr>
<?php
    }
?> 
    </table>
    
    <a href="?action=add"><button class="btn btn-success">Add Product</button></a>
</body>
</html>