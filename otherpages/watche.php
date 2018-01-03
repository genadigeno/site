<?php require_once '../DB/connect.php'; ?>
<?php
session_start();
@$name = $_SESSION['username'];
  $page = $_GET['page'];
  $sql = "SELECT * FROM products WHERE id = ".$page."";
  $resource  = mysqli_query($connection, $sql);
//  $product = mysqli_fetch_assoc($resource);
//  $product_quantity_in_products = $product['quantity'];

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

    $quantity = $_POST['quantity'];

    $query_if_in_cart = "SELECT * FROM addcart WHERE user_id = '$id' AND product_id = '$product_id'";
    $resource_if_in_cart = mysqli_query($connection, $query_if_in_cart);
    $product_in_cart = mysqli_fetch_assoc($resource_if_in_cart);
    $product_quantity_in_cart = $product_in_cart['quantity'];

    if (mysqli_num_rows($resource_if_in_cart) < 1){
        $sql1 = "INSERT INTO addcart(user_id, product_id , quantity) VALUES('$id', '$product_id', '$quantity')";
        if (mysqli_query($connection, $sql1)) {
            echo "<script>window.location = '../DB/account.php';</script>";
        }
    }else{
        $quantity += $product_quantity_in_cart;

//        if ($quantity <= $product_quantity_in_products){
            $sql1 = "UPDATE addcart SET quantity = '$quantity' WHERE user_id = '$id' AND product_id = '$product_id'";
            if (mysqli_query($connection, $sql1)) {
                echo "<script>window.location = '../DB/account.php';</script>";
            }
//        }
//        else{
//            echo "<script>alert('Products is not enough to add in yout cart');</script>";
//        }
    }

  }
  if (isset($_POST['log_in'])) {
      echo "<script>window.location = '../DB/signin.php';</script>";
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
        .styled{
          color: white;
          font-weight: bold;
          background: #282a35;
          width: 200px;
          margin-bottom: 30px;
          height: 35px;
          transition: background-color 0.3s;
        }.styled:hover{
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
                <img src="../images/watches/<?php echo $row['image']; ?>" width="200px">
            </div>
            <div class="form-right">
                <!-- form -->
                <form class="form" action="" method="post">
                    <h1><?php echo $row['name']; ?></h1>
                    <p>Quantity: <input type="number" max="<?=$row['quantity'];?>" min="1" value="1" name="quantity" style="width: 50px;">of <?=$row['quantity'];?></p>
                    <p>Color: <?php echo $row['color']; ?></p>
                    <p>Price: <strong><?php echo $row['price']; ?> $</strong></p>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <input type="submit" name="add_cart" value="Add In Cart" class="styled">
                    <?php } else{ ?>
                        <input type="submit" name="log_in" value="Login to Add Cart" class="styled">
                    <?php } ?>
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
