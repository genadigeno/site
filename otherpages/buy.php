<?php require_once '../DB/connect.php'; ?>
<?php
  session_start();

  if (isset($_POST['checkout'])) {
    if (isset($_POST['fullname']) && isset($_POST['adress']) && isset($_POST['city']) && isset($_POST['region']) && isset($_POST['phone'])) {
      $fullname = $_POST['fullname'];
      $address = $_POST['adress'];
      $city = $_POST['city'];
      $region = $_POST['region'];
      $phone = $_POST['phone'];

      if (isset($_SESSION['username'])) {
        $name = $_SESSION['username'];
        $sql2 = "SELECT user_id FROM users WHERE uder_name = ".$name."";
        $resource2 = mysqli_query($connection, $sql2);
        $userid = mysqli_fetch_assoc($resource2);

        $sql3 = "SELECT id FROM products WHERE id = ".$page."";
        $resource2 = mysqli_query($connection, $sql3);
        $productid['id'] = mysqli_fetch_assoc($resource2);
        $prid = $productid['id'];

        $sql = "INSERT INTO orders ('user_id', 'product_id', 'fullname', 'address', 'city', 'region', 'phone')
                            VALUES ('$userid', '$prid', '$fullname', '$address',  '$city', '$region', '$phone')";
      }

      $sql = "INSERT INTO orders ('product_id', 'fullname', 'address', 'city', 'region', 'phone')
                          VALUES ('$prid', '$fullname', '$address',  '$city', '$region', '$phone')";
      if(mysqli_query($connection, $sql)){
        header("Location: ../DB/account.php");
      }
      else {
        echo $page;
        echo "some eroo";
      }

    }
    else {
      echo "<h1 style='color: red;'> Please Fill All Field </h1>";
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
        <input type="text" name="fullname" value="">
        <p>Address: </p>
        <input type="text" name="adress" value="">
        <p>City: </p>
        <input type="text" name="city" value="">
        <p>State/Province/Region: </p>
        <input type="text" name="region" value="">
        <p>Phone number: </p>
        <input type="text" name="phone" value="">
        <br>
        <input type="submit" name="checkout" value="Process Checkout">
      </form>
    </div>
  </body>
</html>
