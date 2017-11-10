<?php include_once("connect.php"); ?>
<?php

  $error = "";
  if(isset($_POST['submit'])){
    session_start();
      $username = $_POST['name'];
      $email = $_POST['email'];
      $confirmemail = $_POST['remail'];
      $password = $_POST['password'];
      $confirmpassword = $_POST['rpassword'];

      $user_length = strlen($username);

      if($user_length < 3 || $user_length > 25){
          $error = "username letters length must be from 3 to 25";
      }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $error = "email is not validated";
      }else if($email !== $confirmemail){
          $error = "emails does not match";
      }else if($password !== $confirmpassword || $password < 5){
          $error = "password does not match or is shorter";
      }else{
          $select = "SELECT user_name, user_mail FROM users";
          $register = "INSERT INTO users(user_name, user_mail, user_password) VALUES('$username', '$email', '$password')";

          $select_query = mysqli_query($connection, $select);

          if($select_query)
          {
          while($row = mysqli_fetch_assoc($select_query)){
              if($row['user_name'] == $username || @$row['user_password'] == $password){
                  $error = "this email or username already is exists";
                  $bool = 1;
              }else $bool = 0;
            }
          if(@$bool == 0)
          {
              mysqli_query($connection, $register);
              $_SESSION['message'] = "registered";
              $_SESSION['username'] = $username;
          }
         }
      }
      // file
      $file = $_FILES['imagefile']['name'];
      $directory = "../images/userimages/";
      // if($imageFileType = "jpg") {
      //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      // }
      if (!file_exists($file)) {
        if (!move_uploaded_file($_FILES['imagefile']['tmp_name'], $directory.$file)) {
          echo "Error file";
        }
      }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/style_r.css">
    <link rel="stylesheet" href="../fonts/CaviarDreams/styles.css">
    <title> JM</title>
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
      <div class="result"><?php echo $error; echo @$_SESSION['message']; ?></div>
      <div class="signup">
          <form class="forma-r" action="" method="post" enctype="multipart/form-data">
              <p>name</p>
              <input type="text" class="name" name="name">
              <p>email</p>
              <input type="email" name="email" class="email">
              <p>re email</p>
              <input type="email" name="remail" class="remail">
              <p>password</p>
              <input type="password" name="password" class="password">
              <p>re password</p>
              <input type="password" name="rpassword" class="rpassword">
              <p>only .jpg image</p>
              <input type="file" name="imagefile" value="" class="file">
              <input type="submit" name="submit" class="submit" value="Register">
          </form>
      </div>
  </body>
</html>
