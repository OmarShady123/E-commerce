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
            <th>phone</th>
            <th>email</th>
            <th>message</th>
 
  
            <!--<th>views</th>-->
        </tr>
<?php
$select = "SELECT * FROM message_me";
$result = $conn -> query( $select );
while($mes = $result->fetch_assoc()){
    ?>



        <tr>
            <td><?= $mes['id']?></td>
            <td><?= $mes['name']?></td>
            <td><?= $mes['phone']?></td>
            <td><?= $mes['email']?></td>
            <td><?= $mes['message']?></td>

        
        </tr>
<?php
    }
?> 
    </table>
    

</body>
</html>