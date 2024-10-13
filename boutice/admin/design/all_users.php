
<?php
 include("fun/connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Users</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Users</h1>

                </div>
                <!-- /.container-fluid -->
                <?php

$user = $_SESSION['id']??"";
$select1="SELECT * FROM users";
$result1= $conn->query($select1);

$select2 = "SELECT * FROM users WHERE id = '$user'";
$result2 = $conn->query($select2);
$row2 =$result2->fetch_assoc();
$p = $row2["pr"];
$select_u = "SELECT * FROM pr WHERE id = '$p'";
$result_u= $conn->query($select_u);
$row_u = $result_u->fetch_assoc();

?>
                <table class="table">


                
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col" >password</th>
      <th scope="col" >Email</th>
      <th scope="col" >Permission</th>
      <th scope="col" >Gender</th>
      <th scope="col" >controls</th>
      
    </tr>
  </thead>
  <tbody>
  <?php

  $user = $_SESSION['id']??"";
  $select1="SELECT * FROM users";
  $result1= $conn->query($select1);
  
  $select2 = "SELECT * FROM users WHERE id = '$user'";
  $result2 = $conn->query($select2);
  $row2 =$result2->fetch_assoc();
  $p = $row2["pr"];
  $select_u = "SELECT * FROM pr WHERE id = '$p'";
  $result_u= $conn->query($select_u);
  $row_u = $result_u->fetch_assoc();


  while($row1 =$result1 ->fetch_assoc()){?>
    <tr>
      <th scope="row"><?=$row1['id']?></th>
      <td><?=$row1['username']?></td>
      <td><?=$row1['password']?></td>
      <td><?=$row1['email']?></td>
      <td><?php
      $pr_id = $row1['pr'];
      $select_pr="SELECT * FROM pr WHERE id = '$pr_id'";
      $result_pr= $conn->query($select_pr);
      $pr = $result_pr ->fetch_assoc();
      echo $pr['name'];
      ?></td>

<td><?php

$gender_id =$row1['gender']; 
$select_gender="SELECT * FROM gender WHERE id = '$gender_id'";
$result_gender= $conn->query($select_gender);
$gender = $result_gender ->fetch_assoc();
echo $gender['name'];

?></td>


      <td>

        <?php
          if($row_u["priv"]>200)
          {?>
            <a href="?action=edit&id=<?=$row1['id'];?>"><button class='btn btn-info'>Edit</button></a>
            <a href="fun/delete_u.php?id=<?=$row1['id'];?>"><button class='btn btn-danger'>Delete</button></a>
      <?php    }
          elseif($row_u["priv"]>100)
          {
            if($row1["pr"]<3){echo "no control" ; }

            elseif($row1["pr"]==3)
            {?>
              <a href="?action=edit&id=<?=$row1['id'];?>"><button class='btn btn-info'>Edit</button></a>
              <a href="fun/delete_u.php?id=<?=$row1['id'];?>"><button class='btn btn-danger'>Delete</button></a>
            <?php }
          }
          else
          {
            if($row1["pr"] ==1 ){echo "no control" ; }
            elseif($row1['pr']>1)
            {?>
                      <a href="?action=edit&id=<?=$row1['id'];?>"><button class='btn btn-info'>Edit</button></a>
                      <a href="fun/delete_u.php?id=<?=$row1['id'];?>"><button class='btn btn-danger'>Delete</button></a>
            <?php }

          }

        ?>

        


<?php }
  ?>
   
      </td>
      
    </tr>
 

  </tbody>
</table>
<br>

<a href="users.php?action=add"><button  class='btn btn-info'>Add user</button></a>


            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>