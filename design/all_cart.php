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
            <th>user_id</th>
            <th>product_id</th>
            <th>product_name</th>

  
            <!--<th>views</th>-->
        </tr>
<?php
$select = "SELECT * FROM cart";
$result = $conn -> query( $select );
while($cart = $result->fetch_assoc()){
    ?>



        <tr>
            <td><?= $cart['id']?></td>
            <td><?= $cart['user_id']?></td>
            <td><?= $cart['pro_id']?></td>
            <td><?= $cart['pro_name']?></td>
       
        </tr>
<?php
    }
?> 
    </table>
    
    <a href="?action=add"><button class="btn btn-success">Add Product</button></a>
</body>
</html>