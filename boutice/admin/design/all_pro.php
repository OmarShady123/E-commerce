<?php
include("fun/connect.php");



?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Category</th>
      <th scope="col">Brand</th>
      <th scope="col">Count</th>
      <!-- <th scope="col">describtion</th> -->
      <th scope="col" >controls</th>
      
    </tr>
  </thead>
  <tbody>
    <?php

    $select = "SELECT * FROM products";
    $result = $conn -> query($select);

    while($pro = $result->fetch_assoc()){
?>



    <tr>
      <th scope="row"><?=$pro['id']?></th>
      <td><?=$pro['name'];?></td>
      <td><?=$pro['price'];?></td><?php
      
      $H = explode("," ,$pro['image'] );

      ?>
      <td><img src="img/<?php
      echo $H[array_rand($H)] ;
      // echo $pro['image'];
      
      ?>" style="width: 100px; height: 100px;"></td>

      <td><?php $cat_id= $pro['cat'];
      
      $select_cat = "SELECT * FROM category WHERE id ='$cat_id'";
      $result_cat = $conn -> query($select_cat);
      $cat = $result_cat -> fetch_assoc();
      echo $cat['name'];
      ?></td>

      <td><?php $brand_id= $pro['brand'];
      
      $select_brand = "SELECT * FROM brand WHERE id ='$brand_id'";
      $result_brand = $conn -> query($select_brand);
      $brand = $result_brand -> fetch_assoc();
      echo $brand['name'];
      ?></td>
      
      <td><?=$pro['count'];?></td>

      <!-- <td><?=$pro['describtion'];?></td> -->

      <td>

      
      <a href="?action=edit&id=<?=$pro['id'];?>"><button class="btn btn-info">Edit</button></a>
      <a href="fun/delete.php?id=<?=$pro['id'];?>"><button class="btn btn-danger">Delet</button></a>
      </td>
    </tr>
<?php
    }



?>
  </tbody>
</table>

<a href="?action=add"><button class="btn btn-primary">Add product</button></a>
