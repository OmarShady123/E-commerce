
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Boutique | Ecommerce bootstrap template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Lightbox-->
    <link rel="stylesheet" href="vendor/lightbox2/css/lightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.theme.default.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  
  <?PHP

include("inc/navbar.php");

?>
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-2" style="margin-left: 50px;">
    <div class="col col-3">
      <div data-mdb-input-init >
      <label class="form-label" for="form6Example1">Name</label>
        <input type="text" id="form6Example1" class="form-control" name="name">
      </div>
    </div>


    <div class="col col-3">
      <div data-mdb-input-init >
       <label class="form-label" for="form6Example2">E-mail</label>
        <input type="text" id="form6Example2" class="form-control" name="email"> 
      </div>
    </div>
  </div>

  <div class="row mb-2" style="margin-left: 50px;">
    <div class="col col-3">
      <div data-mdb-input-init >
      <label class="form-label" for="form6Example1">Phone</label>
        <input type="text" id="form6Example1" class="form-control" name="phone">
      </div>
    </div>


    <div class="col col-3">
      <div data-mdb-input-init >
       <label class="form-label" for="form6Example2">Message</label>
       <input type="text" id="form6Example2" class="form-control" name ="message"></textarea> 
      </div>
    </div>
  </div>
  <div class="row mb-2" style="margin-left: 50px;">


   
    </div>
  </div> 
  <?php 

  if(isset($_POST['submit']))
  {

$name = $_POST['name']??"";
$email = $_POST['email']??"";
$phone = $_POST['phone']??"";
$message = $_POST['message']??"";

include("fun/connect.php");

$insert = "INSERT INTO message_me(name, phone, email, message) VALUES ('$name','$phone','$email','$message')";
$result = $conn -> query($insert);


  }

?>

  <button class="btn btn-danger col col-3 ml-5" name="submit">Submit</button>
</form>


