
<?php

$server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "system";

$conn = new  mysqli ($server , $db_user , $db_pass , $db_name ); 
?>


<form method="POST" action="fun/do_add_pro.php" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Product name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <br>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" name="price">
  </div>
  <br>
  <div class="mb-3">
    <label for="count" class="form-label">Count</label>
    <input type="text" class="form-control" name="count">
  </div>
  <br>
  <div class="mb-3">
    <label for="describtion" style="font-weight:bold;">Describtion</label>
    <textarea class="form-control" name="descr" style= "height:150px;"></textarea>
  </div>
  <br>


  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" name="images[]" multiple class="form-control">
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


    <option value="<?= $cat['id']?>"><?= $cat['name']?></option>
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


    <option value="<?= $brand['id']?>"><?= $brand['name']?></option>
    <?php
}
?>
   </select>
  </div>
  <br>
  <button type="submit" class="btn btn-primary form-control" value="Add product">add product</button>
</form>