<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3x3 Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 80%;
            
            margin: 0 auto;
            border-collapse: separate;
            border-spacing: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: #ffffff;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
        }
        td {
            background-color: #f9f9f9;
        }
        tr:nth-child(even) td {
            background-color: #f1f1f1;
        }
        tr:hover td {
            background-color: #e9ecef;
        }
        caption {
            padding: 10px;
            font-size: 1.5em;
            font-weight: bold;
        }
    </style>
</head>
<body>
   
<table class="table">
<?php




?>

                
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col" >password</th>
      <th scope="col" >Email</th>
      <th scope="col" >Permission</th>
      <th scope="col" >controls</th>
    </tr>
  </thead>
  <tbody>
<?php

  include("func/connect.php");


 
 
  $select = "SELECT * FROM users";
  $result = $conn -> query($select);
  $row = $result->fetch_assoc();

  $user = $row['id'];

  $select_priv = "SELECT * FROM users WHERE id = '$user' ";
  $result2 = $conn->query($select_priv);
  $row = $result2->fetch_assoc();

  $pr = $row['pr'];
  $select_user="SELECT * FROM pr WHERE id = '$pr'"; 
  $result_user = $conn->query($select_user);
  $row_user = $result_user->fetch_assoc();





  while($disp=$result->fetch_assoc()){?>
    <tr>
      <th scope="row"><?=$disp['id']?></th>
      <td><?=$disp['username']?></td>
      <td><?=$disp['password']?></td>
      <td><?=$disp['email']?></td>

      <td><?php
      $pr_id = $disp['pr'];
      $select_pr="SELECT * FROM pr WHERE id = '$pr_id'";
      $result_pr= $conn->query($select_pr);
      $pr = $result_pr ->fetch_assoc();
      echo $pr['name'];
      ?></td>
      <td>

      <?php

      //$check_priv = $pr_id = $_SESSION['role'];


?>
        

        <?php
          if($row_user["privilege"]>200)
          {
            echo "<a href='edit_users.php?id=".$disp["id"]."'><button class='btn btn-info'>Edit</button></a>

            <a href='fun/delete_u.php?id=".$disp["id"]."'><button class='btn btn-danger'>Delete</button></a>";
          }
          elseif($row_user["privilege"]>100)
          {
            if($disp["pr"]==1){echo "no control" ; }

            elseif($disp["pr"]> 1)
            {
                echo "<a href='edit_users.php?id=".$disp["id"]."'><button class='btn btn-info'>Edit</button></a>
                <a href='fun/delete_u.php?id=".$disp["id"]."'><button class='btn btn-danger'>Delete</button></a>";
            }
          }
          else
          {
            if($disp['pr']< 3 ){echo "no control" ; }
            elseif($disp['pr']==3)
            {
                echo "<a href='edit_users.php?id=".$disp["id"]."'><button class='btn btn-info'>Edit</button></a>
                      <a href='fun/delete_u.php?id=".$disp["id"]."'><button class='btn btn-danger'>Delete</button></a>";
            }
            else{
              echo "no control";
            }

          }


        ?>


<?php }
  ?>
   
      </td>
    </tr>
 

  </tbody>
</table>

<a href="users.php?action=add"><button  class='btn btn-info'>Add user</button></a>


            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>

</body>
</html>
