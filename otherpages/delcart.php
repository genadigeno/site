<?php include_once '../DB/connect.php'; ?>
<?php

if (isset($_POST['remove'])) {
  $es = $_POST['delete'];
  $washla = "DELETE FROM addcart WHERE id = '$es'";
  mysqli_query($connection, $washla);
  echo $es;

  header("Location: ../DB/account.php");
}
 ?>
