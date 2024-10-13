<?php

$server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "system";

$conn = new  mysqli ($server , $db_user , $db_pass , $db_name ); 
?>


<form method="POST" action="fun/do_add_user.php" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Username</label>
    <input type="text" class="form-control" name="username">
  </div>
  <br>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" name="email">
  </div>
  <br>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <br>
  <div class="mb-3">
    <label for="gender" style="font-weight:bold;">Gender</label>
    <select name="gender"  class="form-control">

    <?php
$select_gender ="SELECT * FROM gender";
$result_gender = $conn ->query($select_gender);
while($row = $result_gender->fetch_assoc()){?>


  <option value="<?=$row['id']?>"><?=$row['name']?></option>


<?php }
    ?>

      
    </select>
  </div>
  <div class="mb-3">
    <label for="permission" style="font-weight:bold;">Permission</label>
    <select name="pr"  class="form-control">

    <?php
$select_pr ="SELECT * FROM pr";
$result_pr = $conn ->query($select_pr);
while($row_pr = $result_pr->fetch_assoc()){?>
<option value="<?=$row_pr['id']?>"><?=$row_pr['name']?></option>
<?php }
?>


      
    </select>
  </div>
  <br>
  <button type="submit" class="btn btn-primary" name ="Add user">add user</button>
</form>