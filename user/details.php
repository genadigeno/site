<?php

session_start();
require_once '../DB/connect.php';
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE user_name = '$username'";
$resource = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($resource);
 ?>


<h1>Name: <?php echo @$row['user_name']; ?></h1><br>
<p>Address: </p>
