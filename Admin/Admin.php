<?php require_once '../DB/connect.php'; ?>
<?php

    session_start();
    if (isset($_POST['submit'])) {

      $adminname = mysqli_real_escape_string($connection, $_POST['adminname']);
      $adminpassword = mysqli_real_escape_string($connection, $_POST['adminpassword']);

      $sql = "SELECT * FROM admin WHERE admin_name = '$adminname' AND admin_password = '$adminpassword'";
      $result = mysqli_query($connection, $sql);
      $row = mysqli_fetch_assoc($result);
      if ($adminname == $row['admin_name'] && $adminpassword == $row['admin_password']) {

        $_SESSION['adminname'] = $adminname;
      }
    }
    if (@$_GET['logout'] == 1) {
      session_destroy();
      header("Location: Admin.php");
    }
    if (!empty($_GET['delete'])) {
      if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql = "DELETE FROM users WHERE user_id = '$id'";
        mysqli_query($connection, $sql);
        header("Location: Admin.php");
      }
    }
    if (isset($_POST['add'])) {
      if(!empty($_POST['watch_name']) && !empty($_POST['watch_price']) && !empty($_FILES['watch_file']) && !empty($_POST['departament']) && !empty($_POST['display']) && !empty($_POST['color'])){
        $name = $_POST['watch_name'];
        $price = $_POST['watch_price'];
        $image = $_FILES['watch_file']['name'];
        $upfile = $_FILES['watch_file']['tmp_name'];
        $dep = $_POST['departament'];
        $display = $_POST['display'];
        $color = $_POST['color'];

        $sql = "INSERT INTO products(name, image, departament, price, display, color)
                       VALUES ('$name', '$image', '$dep', '$price', '$display', '$color')";
        mysqli_query($connection, $sql);
        move_uploaded_file($upfile, "../images/watches/".$image);
      }
    }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/adminstyle.css">
    <style media="screen">
      body{
        background-color: #9ea4bc;
        /*color: white;*/
      }form{
        margin-top: 15%;
        text-align: center;
      }
      input{
        width: 300px;
      }
      input.submit{
        width: 75px;
        height: 40px;
      }a{
        /*color: white;*/
      }
    </style>
  </head>
  <body>
    <?php if(isset($_SESSION['adminname'])) { ?>
      <div class="main-content">
        <div class="admin-nav">
          <ul>
            <li><p>Admin <?php echo $_SESSION['adminname']; ?> Logged in</p></li>
            <li><p><a href="Admin.php?logout=1">Log Out</a></p></li>
            <li id="delete">Delete User</li>
            <li id="add">Add Products</li>
          </ul>
        </div>

        <div id="del" class="content">content</div>
      </div>
    <?php } else {?>
      <form class="" action="" method="post">
        <p>Admin Name: </p><input type="text" name="adminname" value=""><br>
        <p>Admin Password: </p><input type="password" name="adminpassword" value=""><br>
        <p>Enter As Admin</p>
        <input type="submit" name="submit" value="Enter" class="submit">
      </form>
    <?php } ?>
    <script type="text/javascript">
      $(document).ready(function(){

        $("#delete").click(function(){
            $.ajax({url: "del.php", success: function(result){
                $("#del").html(result);
            }});
        });
        $("#add").click(function(){
            $.ajax({url: "add.php", success: function(result){
                $("#del").html(result);
            }});
        });

    });
    </script>
  </body>
</html>
