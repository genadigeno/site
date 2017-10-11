<?php
  $db = mysqli_connect('localhost','root','','tutorial');
  if (mysqli_connect_errno()) {
    echo "error conection".mysqli_connect_errno();
    die();
  }
  require_once $_SERVER['DOCUMENT_ROOT'].'/project/config.php';
  require_once BASEURL.'helpers/helpers.php';

 ?>
