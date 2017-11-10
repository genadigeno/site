<?php require_once 'connect.php'; ?>
<?php session_start(); ?>

<?php

    if (isset($_POST['submit'])) {

      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM users WHERE user_name = '$username' AND user_password = '$password'";
      $result = mysqli_query($connection, $sql);
      $row = mysqli_fetch_assoc($result);
      if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $row['user_name'];
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: ../index.php");
      }else {
        echo "err";
      }
    }
    if (isset($_POST['reg'])) {
      header("Location: signup.php");
    }
?>


<!DOCTYPE html>
<html>
  <head>
      <script src="../js/script.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../fonts/CaviarDreams/styles.css">
    <title>ინტერნეტ მაღაზია JM</title>
    <style media="screen">
      *{
        font-family: 'CaviarDreams-Bold';
      }
      body{
        background-color: #ffffe6;
      }
    </style>
  </head>
  <body>
      <div class="signin">
          <form action="" class="forma" method="POST" enctype="multipart/form-data">
              <p>your mail</p>
              <input type="text" name="username" class="email">
              <p>your password</p>
              <input type="password" name="password" class="password"><br>
              <input type="submit" value="sign in" name="submit" class="submit"><br>
              <input type="submit" name="reg" value="Register" class="submit">
          </form>
      </div>
  </body>
</html>
