<?php
include("fun/connect.php");
$id= $_GET['id'];

$select= "SELECT * FROM users WHERE id = '$id'";
$result = $conn -> query($select);

$user = $result-> fetch_assoc();

?>


<form method="POST" action="func/do_edir_user.php?id=<?=$id?>" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">name</label>
    <input type="text" class="form-control" name="username" value="<?=$user['username'];?>">
  </div>
  <br>
  <div class="mb-3">
    <label for="password" class="form-label">password</label>
    <input type="number" class="form-control" name="password" value="<?=$user['password'];?>" >
  </div>
  <br>
  <div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="text" class="form-control" name="email" value="<?=$user['email'];?>">
  </div>
  <br>
  <div class="mb-3">
    <label for="gender" class="form-label">gender</label>
    <input type="number" class="form-control" name="gender" value="<?=$user['gender'];?>">
  </div>
  <br>
  <div class="mb-3">
    <label for="pr" class="form-label">pr</label>
    <input type="number" class="form-control" name="pr" value="<?=$user['pr'];?>">
  </div>







  <br>
  <button type="submit" class="btn btn-success form-control " value="Update product">Edit Product</button>
</form>