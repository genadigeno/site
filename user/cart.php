<?php include_once '../DB/connect.php'; ?>
<?php

  session_start();
  $username = $_SESSION['username'];

  $sql2 = "SELECT * FROM users WHERE user_name = '$username'";
  $resource = mysqli_query($connection, $sql2);
  $rom = mysqli_fetch_assoc($resource);  //err
  $userid = $rom['user_id'];

  $sql = "SELECT * FROM addcart WHERE user_id = '$userid'";
  $res = mysqli_query($connection, $sql);



?>

<?php if (isset($_SESSION['username'])): ?>
  <ul style="list-style: none;">
  <?php while ($var = mysqli_fetch_assoc($res)): ?>
    <?php
    $value = $var['product_id'];
    $sql4 = "SELECT * FROM products WHERE id = '$value'";
    $res4 = mysqli_query($connection, $sql4);
    $getting = mysqli_fetch_assoc($res4);
    $product_price = $getting['price'];
    $product_name = $getting['name'];
    $id = $getting['id'];
   ?>
      <li>
        <a href="../otherpages/watche.php?page=<?=$id ?>">
          <div class="product">
             <img src="../images/watches/<?php echo $getting['image']; ?>.png" width="100px"  style="float: left; margin-left: 5px;">

          </div>
        </a>
        <form class="" action="../otherpages/delcart.php" method="post">
          <input type="submit" name="remove" value="Remove From Cart">
          <input type="hidden" name="delete" value="<?php echo $var['id'] ?>">
        </form>
      </li>

  <?php endwhile; ?>
  </ul>
<?php endif; ?>
