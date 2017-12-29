<?php require_once '../DB/connect.php'; ?>
<?php
session_start();
@$name = $_SESSION['username'];
  $page = $_GET['page'];
  $sql = "SELECT * FROM products WHERE id = ".$page."";
  $resource  = mysqli_query($connection, $sql);
  if (isset($_POST['add_cart'])) {
    // user id
    $sql2 = "SELECT user_id FROM users WHERE user_name = '$name'";
    $res = mysqli_query($connection, $sql2);
    $userid = mysqli_fetch_assoc($res);
    $id = $userid['user_id'];
    //product id
    $sql3 = "SELECT id FROM products WHERE id = ".$page."";
    $res2 = mysqli_query($connection, $sql3);
    $rigi = mysqli_fetch_assoc($res2);
    $product_id = $rigi['id'];
    $sql1 = "INSERT INTO addcart(user_id,product_id) VALUES('$id','$product_id')";
    if (mysqli_query($connection, $sql1)) {
      header("Location: ../DB/account.php");
    }

  }
  if (isset($_POST['log_in'])) {
    header("Location: ../DB/signin.php");
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../fonts/CaviarDreams/styles.css">
      <link rel="stylesheet" href="../styles/foot.css">
    <link rel="stylesheet" href="../master_copy.css">
      <script src="https://use.fontawesome.com/71aa464b87.js"></script>
    <title>E-Shop Watches</title>
    <style media="screen">
        *{
          font-family: 'CaviarDreams-Bold';
        }
        .image-left{
          margin-left: 20%;

          margin-top: 50px;
          float: left;
        }
        .form-right{
          width: 300px;
          margin-right: 20%;
          margin-top: 50px;
          float: right;
        }
        form{
          width: 100%;
          color: #282a35;
        }
        input{
          color: white;
          font-weight: bold;
          background: #282a35;
          width: 200px;
          margin-bottom: 30px;
          height: 35px;
          transition: background-color 0.3s;
        }input:hover{
          color: #282a35;
          background-color: white;
          border: 1px solid #282a35;
          cursor: pointer;
        }
    </style>
  </head>
  <body>
  <header><?php include_once '../includes/header.php'; ?></header>
    <section>
        <?php while($row = mysqli_fetch_assoc($resource)) : ?>
            <div class="image-left">
                <img src="../images/watches/<?php echo $row['image']; ?>.png" width="200px">
            </div>
            <div class="form-right">
                <!-- form -->
                <form class="form" action="" method="post">
                    <h1><?php echo $row['name']; ?></h1>
                    <p>Quantity: <?php echo $row['quantity']; ?></p>
                    <p>Color: <?php echo $row['color']; ?></p>
                    <p>Price: <strong><?php echo $row['price']; ?> $</strong></p>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <input type="submit" name="add_cart" value="Add In Cart">
                    <?php } else{ ?>
                        <input type="submit" name="log_in" value="Login to Add Cart">
                    <?php } ?>
                </form>
                <!-- end -->
                <form class="" action="buy.php" method="get">
                    <input name="product" value="<?php echo $row['id']; ?>" type="hidden">
                    <input type="submit" name="buy" value="Buy It Now">
                </form>
            </div>
        <?php endwhile; ?>
    </section>
  <footer>
      <?php include "../includes/footer.php"?>
  </footer>
  <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script>
      function myFunction(x) {
          x.classList.toggle("change");
      }
  </script>
  <script>
      $('.container').click(function(){
          $('.responsive-menu').toggle();
      });
  </script>
  </body>

</html>
