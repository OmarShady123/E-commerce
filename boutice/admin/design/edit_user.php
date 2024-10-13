<?php
include("fun/connect.php");
$id= $_GET['id'];

$select= "SELECT * FROM users WHERE id = '$id'";
$result = $conn -> query($select);

$user = $result-> fetch_assoc();

?>


<form method="POST" action="fun/do_edit_user.php?id=<?=$id?>" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Username</label>
    <input type="text" class="form-control" name="username" value="<?=$user['username'];?>">
  </div>
  <br>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" value="<?=$user['password'];?>" >
  </div>
  <br>
  <div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="email" class="form-control" name="email" value="<?=$user['email'];?>" >
  </div>
  <br>
  
  <div class="form-group mb-3">
    <label for="gender" style="font-weight:bold;"> Gender </label>
   <select class="form-control" name="gender">

   <?php

$select_gen = "SELECT * FROM gender";
$result_gen = $conn -> query($select_gen);
while($gen = $result_gen -> fetch_assoc()){
    ?>


    <option value="<?= $gen['id']?>" <?php
    
    
    if($gen['id']===$user['gender']){

echo "selected";
    }
    
    
    
    ?>   ><?= $gen['name']?></option>
    <?php
}
?>
   </select>
  </div>
  <br>
  <div class="form-group mb-3">
    <label for="permission" style="font-weight:bold;"> permission : </label>
   <select class="form-control" name="pr">
   <?php

$select_pr = "SELECT * FROM pr";
$result_pr = $conn -> query($select_pr);
while($pr = $result_pr -> fetch_assoc()){
    ?>


    <option value="<?= $pr['id']?>" <?php
    
    
    if($pr['id']===$user['pr']){

echo "selected";
    }
    
    
    
    ?>   ><?= $pr['name']?></option>
    <?php
}
?>
   </select>
  </div>
  <br>
  <button type="submit" class="btn btn-success form-control " value="Update user">Edit user</button>
</form>