<?php include_once '../DB/connect.php'; ?>
<?php

  session_start();
  $username = $_SESSION['username'];

  $sql2 = "SELECT * FROM users WHERE user_name = '$username'";
  $resource = mysqli_query($connection, $sql2);
  $rom = mysqli_fetch_assoc($resource);  //err
  $userid = $rom['user_id'];

  @$sql = "SELECT * FROM addcart WHERE user_id = '$userid'";
  $res = mysqli_query($connection, $sql);


?>

<?php if (isset($_SESSION['username'])): ?>
  <ul>
  <?php while ($var = mysqli_fetch_assoc($res)): ?> <!--error -->
      <li><?php echo $var['product_id']; ?></li>
  <?php endwhile; ?>
  </ul>
<?php endif; ?>
