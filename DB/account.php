<?php require_once 'connect.php'; ?>
<?php
  session_start();
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM users WHERE user_name = '$username'";
  $resource = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($resource);
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../master_copy.css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="../styles/acc.css">
    <link rel="stylesheet" href="../fonts/CaviarDreams/styles.css">
    <title></title>
    <style media="screen">
    *{
      font-family: 'CaviarDreams-Bold';
    }
    </style>
  </head>
  <body>
    <header>
            <div class="main-menu">
                <img class="logo" src="../images/logo.jpg" width="100px">
                <nav class="navigate">
                    <ul>
                       <li class="head-li"><a href="../index.php">Home</a></li>
                       <li class="head-li dropdown"><a href="../otherpages/watches.php">Watches</a>
                           <ul class="dropdown-content">
                               <li><a href="../otherpages/watches.php">Watche</a></li>
                               <li><a href="">Clock</a></li>
                               <li><a href="">Alarm clock</a></li>
                           </ul>
                        </li>
                       <li class="head-li"><a href="">Accessories</a></li>
                       <li class="head-li"><a href="">Sale</a></li>
                       <li class="head-li"><a href="">Brands</a></li>
                    </ul>
                </nav>
                <!-- register, login, logout -->
                <nav class="register-nav">
                    <ul>
                      <?php if(isset($_SESSION['username'])) { ?>
                        <li class=""><a href="account.php"><?php echo strtoupper($_SESSION['username'])."'s PAGE"; ?></a></li>
                        <!-- dropdow menu form user -->

                        <li class=""><a href="logout.php">SIGN OUT</a></li>

                        <!-- end dropdown -->

                      <?php } else{ ?><li class="regist"><a href="signup.php">SIGN UP</a></li>
                        <li class="regist"><a href="signin.php">SIGN IN</a></li>
                      <?php } ?>
                    </ul>
                </nav>
            </div>
        </header>
        <section>
          <?php if(isset($_SESSION['username'])) { ?>
            <div class="acc-nav">
              <h1 id="loaddet">Details</h1>
              <h1 id="loadcart">Shopping Cart</h1>
              <h1 id="loadorder">Orders</h1>
              <h1 id="loadpass">Change Password</h1>
            </div>
            <div class="content" id="load">
              <h1>Name: <?php echo $row['user_name']; ?></h1><br>
              <p>Address: </p>
            </div>
          <?php } else {?>
          <?php } ?>
        </section>
        <script type="text/javascript">
          // function loadcart(){
          //   var xhr = new XMLHttpRequest();
          //   xhr.onreadystatechange  = function(){
          //     if (this.readyState == 4 && this.status == 200) {
          //       document.getElementsByClassName("content").innerHTML = this.resposeText;
          //     }
          //   };
          //   xhr.open("GET", "../user/cart.php", true);
          //   xhr.send();
          // }
          $(document).ready(function(){
            $("#loaddet").click(function(){
              $.ajax({url: "../user/details.php", success: function(result) {
                $("#load").html(result);
              }});
            });
            $("#loadcart").click(function(){
                $.ajax({url: "../user/cart.php", success: function(result){
                    $("#load").html(result);
                }});
            });
            $("#loadpass").click(function() {
              $.ajax({url: "../user/changepass.php", success: function(result) {
                $("#load").html(result);
              }})
            });
        });
        </script>
  </body>
</html>
