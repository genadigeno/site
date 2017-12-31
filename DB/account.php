<?php require_once 'connect.php'; ?>
<?php
  session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: signin.php");
    }else{
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM users WHERE user_name = '$username'";
        $resource = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($resource);
//        მომხმარებლის კარტიდან დამატებული პროდუქტის ამოშლა
        if (isset($_GET['delete'])){
            $es = $_GET['delete'];
            $washla = "DELETE FROM addcart WHERE id = '$es'";
            mysqli_query($connection, $washla);
            echo $es;

            header("Location: account.php");
        }
//        მომხმარებლის პაროლის შეცვლა
        if (isset($_GET['change'])){
            $new_pass = $_GET['newpass'];
            $re_new_pass = $_GET['re_newpass'];
            if ($new_pass == $re_new_pass) {
                $query = "UPDATE users SET user_password = '$new_pass' WHERE user_name = '$username'";
                if (mysqli_query($connection, $query)){
                    echo "<script>alert('Password has been changes successfully :)');</script>";
                }
                else{
                    echo "<script>alert('Occured Some Error :(');</script>";
                }
            }
            else{
                echo "<script>alert('Passwords Does Not Match ! :|');</script>";
            }
            echo "<script>window.location = 'account.php';</script>";
        }
    }



 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../master_copy.css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="../styles/acc.css">
    <link rel="stylesheet" href="../fonts/CaviarDreams/styles.css">
      <link rel="stylesheet" href="../styles/foot.css">
      <script src="https://use.fontawesome.com/71aa464b87.js"></script>
    <title></title>
    <style media="screen">
    *{
      font-family: 'CaviarDreams-Bold';
    }
    </style>
  </head>
  <body>
    <header>
        <?php include "../includes/header.php"?>
    </header>
        <section>
          <?php if(isset($_SESSION['username'])) { ?>
            <div class="acc-nav">
              <h3 id="loaddet">Details</h3>
              <h3 id="loadcart">Shopping Cart</h3>
              <h3 id="loadorder">Orders</h3>
              <h3 id="loadpass">Change Password</h3>
              <h3> <a href="#">Add Product</a> </h3>
              <h3 id="manage">Manage Your Products</h3>
            </div>
<!--       Ajax Load Pages        -->
            <div class="content" id="load">
              <h1>Name: <?php echo $row['user_name']; ?></h1><br>
              <p>Address: </p>
            </div>
<!--       End       -->
          <?php } else { echo "<script>window.location = 'signin.php';</script>"; ?>

          <?php } ?>
        </section>
        <footer>
            <?php include "../includes/footer.php"?>
        </footer>
        <script type="text/javascript">

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
              $("#loadorder").click(function(){
                  $.ajax({url: "../user/orders.php", success: function(result){
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
    <script>
        function myFunction(x) {
            x.classList.toggle("change");
        }
        $('.container').click(function(){
            $('.responsive-menu').toggle();
        });
    </script>
  </body>
</html>
