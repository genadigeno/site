<?php require_once 'DB/connect.php'; ?>
<?php
  session_start();
  $query = "SELECT * FROM products ORDER BY RAND() LIMIT 15";
  $result = mysqli_query($connection, $query);
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="master_copy.css">
    <link rel="stylesheet" href="styles/unslider.css">
    <link rel="stylesheet" href="styles/unslider-dots.css">
    <link rel="stylesheet" href="fonts/CaviarDreams/styles.css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="js/mainscript.js"></script>
    <title>E-Shop Watches</title>
    <style media="screen">
      *{
        font-family: 'CaviarDreams-Bold';
      }
    </style>
  </head>
  <body>
    <header>
            <div class="main-menu">
                <img class="logo" src="images/logo.jpg" width="100px">
                <nav class="navigate">
                    <ul>
                       <li class="head-li"><a href="index.php">Main</a></li>
                       <li class="head-li dropdown"><a href="otherpages/watches.php">Watches</a>
                           <ul class="dropdown-content">
                               <li><a href="otherpages/watches.php">Wristlet watch</a></li>
                               <li><a href="">Clock</a></li>
                               <li><a href="">Alarm-watch</a></li>
                           </ul>
                        </li>
                       <li class="head-li"><a href="">Accessories</a></li>
                       <li class="head-li"><a href="">Sale</a></li>
                       <li class="head-li"><a href="">Brands</a></li>
                    </ul>
                </nav>
                <!-- register, login, logout -->
                <nav class="register-nav">
                    <ul>
                      <?php if(isset($_SESSION['username'])) { ?>
                        <li class="dropdown-user"><a href="DB/account.php"><?php echo strtoupper($_SESSION['username'])."'s PAGE"; ?></a></li>
                        <!-- dropdow menu form user -->

                            <li class=""><a href="DB/logout.php">SIGN OUT</a></li>

                        <!-- end dropdown -->

                      <?php } else{ ?><li class="regist"><a href="DB/signup.php">SIGN UP</a></li>
                        <li class="regist"><a href="DB/signin.php">SIGN IN</a></li>
                      <?php } ?>
                    </ul>
                </nav>
            </div>
        </header>
    <!-- -->
    <div class="my-slider center-block-main">
      <ul>
        <li>
          <a href="#"><img src="images/slider1.jpg" width="800px" height="450px" alt=""></a>
        </li>
        <li>
          <a href="#"><img src="images/slider2.jpg"  alt=""></a>
        </li>
      </ul>
    </div>
    <!-- SECTION -->
    <section>
        <div class="section-content">
            <article>
              <h1>Watches</h1>
              <form action="otherpages/watches.php" method="post" name="search" class="forma-search">
                <input type="submit" name="search" value="Search...">
                <input type="search" name="search_box" placeholder="Search Watches">
              </form>
           </article>

              <ul>
                <?php while($row = mysqli_fetch_assoc($result)) : ?>
                    <li><a href="otherpages/watche.php?page=<?php echo $row['id']; ?>"><img src="images/watches/<?php echo $row['image']; ?>.jpg" alt="">
                      <p><?php echo $row['name']; ?></p></a>
                      <p><?php echo $row['price']; ?> $</p>
                    </li>
                <?php endwhile; ?>
              </ul>
              <article><h1>Accesories</h1></article>
        </div>

    </section>
    <!-- END of SECTION -->

    <!-- -->
    <footer>
        <p>&copy; Copyrigth 2017</p>
        <ul>
            <li><img src="images/socnet/fb.png"></li>
            <li><img src="images/socnet/g+.png"></li>
            <li><img src="images/socnet/in.png"></li>
        </ul>
    </footer>
    <!-- -->
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="js/unslider-min.js"></script>
    <script>
		jQuery(document).ready(function($) {
			$('.my-slider').unslider({
        autoplay: true,
        arrows: false
      });
		});
	</script>
  </body>
</html>
