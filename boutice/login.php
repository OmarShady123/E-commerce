<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Glassmorphism login Form Tutorial in html css</title>
  

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: blue;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .login-container h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .login-container label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            text-align: left;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .login-container button:hover {
            background-color: #218838;
        }

        .social {
            display: flex;
            justify-content: space-between;
        }

        .social div {
            width: 48%;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            color: white;
        }

        .social .go {
            background-color: #db4437;
        }

        .social .fb {
            background-color: #4267B2;
        }

        .social div:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
<?php
    $user =$_POST["user"]??"";
$password =$_POST["password"]??"";

include("fun/connect.php");

session_start();

$select = " SELECT * FROM users WHERE username= '$user' && password = '$password'";
$result = $conn-> query($select);
$num = $result-> num_rows ;  
$row = $result -> fetch_assoc();

if($num > 0  ) 

{
	$_SESSION['id']=$row['id'];
	header("location:cart.php");

}



?>
    <div class="login-container">
        <h3>Login Here</h3>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
            <label for="username">Username</label>
            <input type="text" placeholder="Email" id="username" name="user" required>

            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password" required>

            <button type="submit">Log In</button>
        </form>
        <div class="social">
            <div class="go"><i class="fab fa-google"></i> Google</div>
            <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>
    </div>
</body>
</html>
<!-- partial -->
  
</body>
</html>
