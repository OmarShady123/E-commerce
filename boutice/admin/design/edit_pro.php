<?php
include("fun/connect.php");
$id= $_GET['id'];

$select= "SELECT * FROM products WHERE id = '$id'";
$result = $conn -> query($select);

$product = $result-> fetch_assoc();

?>


<form method="POST" action="fun/do_edit_pro.php?id=<?=$id?>" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Product name</label>
    <input type="text" class="form-control" name="name" value="<?=$product['name'];?>">
  </div>
  <br>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" name="price" value="<?=$product['price'];?>" >
  </div>
  <br>
  <div class="mb-3">
    <label for="count" class="form-label">Count</label>
    <input type="text" class="form-control" name="count" value="<?=$product['count'];?>">
  </div>
  <br>
  <div class="mb-3">
    <label for="describtion" style="font-weight:bold;">Describtion</label>
    <textarea class="form-control" name="descr" style= "height:150px;"><?=$product['describtion'];?></textarea>
  </div>
  <br>


  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control" name ="images[]" multiple >
    <br>
<?php
  $H = explode("," ,$product['image'] );
?>


    <img src="img/<?php
      echo $H[array_rand($H)] ;
      // echo $pro['image'];
      
      ?>" style="width: 100px; height: 100px;">
  </div>


  <br>
  <div class="form-group mb-3">
    <label for="category" style="font-weight:bold;">Category : </label>
   <select class="form-control" name="category">

   <?php

$select_cat = "SELECT * FROM category";
$result_cat = $conn -> query($select_cat);
while($cat = $result_cat -> fetch_assoc()){
    ?>


    <option value="<?= $cat['id']?>" <?php
    
    
    if($cat['id']===$product['cat']){

echo "selected";
    }
    
    
    
    ?>   ><?= $cat['name']?></option>
    <?php
}
?>
   </select>
  </div>
  <br>
  <div class="form-group mb-3">
    <label for="brand" style="font-weight:bold;"> Brand : </label>
   <select class="form-control" name="brand">
   <?php

$select_brand = "SELECT * FROM brand";
$result_brand = $conn -> query($select_brand);
while($brand = $result_brand -> fetch_assoc()){
    ?>


    <option value="<?= $brand['id']?>" <?php
    
    
    if($brand['id']===$product['brand']){

echo "selected";
    }
    
    
    
    ?>   ><?= $brand['name']?></option>
    <?php
}
?>
   </select>
  </div>
  <br>
  <button type="submit" class="btn btn-success form-control " value="Update product">Edit Product</button>
</form>