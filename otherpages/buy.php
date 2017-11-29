<?php require_once '../DB/connect.php'; ?>
<?php
  session_start();

  if (isset($_POST['checkout'])) {
      $fullname = $_POST['fullname'];
      $address = $_POST['address'];
      $city = $_POST['city'];
      $region = $_POST['region'];
      $phone = $_POST['phone'];
      $product = $_GET['product'];

      if (isset($_SESSION['username'])) {

        $name = $_SESSION['username'];

        $sql2 = "SELECT user_id  FROM users WHERE user_name = '".$name."' ";
        $resource = mysqli_query($connection, $sql2);
        $userid = mysqli_fetch_assoc($resource);
        $user_id = $userid['user_id'];

        $sql = "INSERT INTO orders(user_id, product_id, fullname, address, city, region, phone)
                            VALUES('$user_id', '$product', '$fullname', '$address',  '$city', '$region', '$phone')";
      }
      else {
        $sql = "INSERT INTO orders(product_id, fullname, address, city, region, phone)
                            VALUES('$product', '$fullname', '$address',  '$city', '$region', '$phone')";
      }

      if(mysqli_query($connection, $sql)){
        
        header("Location: ../DB/account.php");
      }
      else {
        echo $sql;
      }
  }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="content">
      <form class="" action="" method="post">
        <p>Full name:</p>
        <input type="text" name="fullname" value="" required>
        <p>Address: </p>
        <input type="text" name="address" value="" required>
        <p>City: </p>
        <input type="text" name="city" value="" required>
        <p>State/Province/Region: </p>
        <input type="text" name="region" value="" required>
        <p>Phone number: </p>
        <input type="text" name="phone" value="" required>
        <br>
        <input type="submit" name="checkout" value="Process Checkout">
      </form>
    </div>
  </body>
</html>
