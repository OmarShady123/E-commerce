     <?php

$id = $_GET['id']??"";
     
     include("fun/connect.php");
     $select ="SELECT username FROM users " ;
     $result = $conn -> query($select);
     $row = $result->fetch_assoc();
     ?>
     
     
     
     <!-- navbar-->
      <header class="header bg-white">
        <div class="container px-0 px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.html"><span class="font-weight-bold text-uppercase text-dark">Boutique</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <!-- Link--><a class="nav-link <?php if($status==="Home"){echo "active";}?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link <?php if($status==="Shop"){echo "active";}?>" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="detail.html">Product detail</a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                  <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.html">Homepage</a><a class="dropdown-item border-0 transition-link" href="shop.html">Category</a><a class="dropdown-item border-0 transition-link" href="detail.html">Product detail</a><a class="dropdown-item border-0 transition-link" href="cart.php">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="checkout.html">Checkout</a></div>
                </li>
              </ul>
              <ul class="navbar-nav ml-auto">               
                <li class="nav-item"><a class="nav-link" href="cart.php"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small class="text-gray">(2)</small></a></li>
                <li class="nav-item"><a class="nav-link" href="#"> <i class="far fa-heart mr-1"></i><small class="text-gray"> (0)</small></a></li>
                <li class="nav-item">
                  <?php 
                 
if(isset($_SESSION['login']))
                                {?>
                                  <a class="nav-link" href="login.php"><i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>
                           <?php     }

                           else{?>
                            <a class="nav-link" href="#"><i class="fas fa-user-alt mr-1 text-gray"></i><?=$row['username']?></a></li>

                            <?php  }  
                  ?>
                
              </ul>
            </div>
          </nav>
        </div>
      </header>