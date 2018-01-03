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
<!--   მთავარი სტილი   -->
    <link rel="stylesheet" href="master_copy.css">
    <link rel="stylesheet" href="styles/foot.css">
<!--   ფონტი   -->
    <link rel="stylesheet" href="fonts/CaviarDreams/styles.css">

<!--   ჯავასკრიპტი   -->
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>  <!--   jQuery ბიბლიოთეკა   -->
    <script src="https://use.fontawesome.com/71aa464b87.js"></script>

<!--   სლაიდერი   -->
      <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
      <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
<!--   ჯავასკრიპტის ფაილი   -->
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
                       <li class="head-li"><a href="#acc">Accessories</a></li>
                       <li class="head-li"><a href="">Sale</a></li>
                       <li class="head-li"><a href="">Brands</a></li>
                    </ul>
                </nav>
                <!-- რეგისტრაცია, შესვლა, გამოსვლა -->
                <nav class="register-nav">
                    <ul>
                      <?php if(isset($_SESSION['username'])) { ?>
                        <li class="dropdown-user"><a href="DB/account.php"><?php echo strtoupper($_SESSION['username'])."'s page"; ?></a></li>
                        <!-- dropdown მენიუ -->

                            <li class=""><a href="DB/logout.php">Sign Out</a></li>

                        <!-- dropdown-ს დასასრული -->

                      <?php } else{ ?><li class="regist"><a href="DB/signup.php">Sign Up</a></li>
                        <li class="regist"><a href="DB/signin.php">Sign In</a></li>
                      <?php } ?>
                    </ul>
                </nav>
                <div class="container" onclick="myFunction(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>

                    <div class="responsive-menu">
                        <ul>
                            <li class="head-li"><a href="index.php">Main</a></li>
                            <li class="head-li dropdown"><a href="otherpages/watches.php">Watches</a>
                                <ul class="dropdown-content">
                                    <li><a href="otherpages/watches.php">Wristlet watch</a></li>
                                    <li><a href="">Clock</a></li>
                                    <li><a href="">Alarm-watch</a></li>

                                </ul>
                            </li>
                            <li class="head-li"><a href="#acc">Accessories</a></li>
                            <li class="head-li"><a href="">Sale</a></li>
                            <li class="head-li"><a href="">Brands</a></li>
                            <hr>
                            <?php if(isset($_SESSION['username'])) { ?>
                                <li class="dropdown-user"><a href="DB/account.php"><?php echo strtoupper($_SESSION['username'])."'s PAGE"; ?></a></li>
                                <!-- dropdown მენიუ -->

                                <li class=""><a href="DB/logout.php">Sign Out</a></li>

                                <!-- dropdown-ს დასასრული -->

                            <?php } else{ ?><li class="regist"><a href="DB/signup.php">Sign Up</a></li>
                                <li class="regist"><a href="DB/signin.php">Sign In</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    <!--  სლაიდერი  -->
    <section>
        <div class="fotorama" data-width="100%" data-autoplay="true">
            <img src="images/slider1.jpg">
            <img src="images/slider2.jpg">
        </div>
    </section>
    <!--   სლაიდერი დასასრული  -->
    <!-- სექცია -->
    <section>
        <div class="section-content">
            <article>
                <hr>
              <h1 style="text-align: center">Watches</h1>
              <form action="otherpages/watches.php" method="post" name="search" class="forma-search">
                <input type="submit" name="search" value="Search..." class="search">
                <input type="search" name="search_box" placeholder="Search Watches">
              </form>
           </article>

              <ul>
                <?php while($row = mysqli_fetch_assoc($result)) : ?>
                    <li><a href="otherpages/watche.php?page=<?php echo $row['id']; ?>"><img src="images/watches/<?php echo $row['image']; ?>" alt="">
                      <p><?php echo $row['name']; ?></p></a>
                      <p><?php echo $row['price']; ?> $</p>
                    </li>
                <?php endwhile; ?>
              </ul>
            <hr>
              <article><h1 id="acc"  style="text-align: center">Accesories</h1></article>
        </div>

    </section>
    <!-- სექციის დასასრული -->

    <!-- ფუთერი -->
    <footer>
        <div class="top-footer">
            <div class="first">
                <p>Customer Service</p>
                <ul>
                    <li></li>
                </ul>
            </div>
            <div class="second">
                <p>Company Information</p>
                <ul>
                    <li><a href="otherpages/aboutus.php">About Us</a></li>
                    <li><a href="otherpages/contact.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="third">
                <p>Follow</p>
                <ul>
                    <li>
                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        <i class="fa fa-twitter-square" aria-hidden="true"></i>
                        <i class="fa fa-google-plus-square" aria-hidden="true"></i>
                        <i class="fa fa-youtube-square" aria-hidden="true"></i>
                    </li>
                    <li>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <p>Send Mail</p>
                    </li>
                    <li>
                        <i class="fa fa-phone-square" aria-hidden="true"></i>
                        <p>+995 5XX XXX XXX</p>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="bottom-footer">
            <i class="fa fa-copyright" aria-hidden="true"></i> 2017
        </div>
    </footer>

    <!-- ჯავასკრიპტის სცენარები -->
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

    <script>
        function myFunction(x) {
            x.classList.toggle("change");
        }
        $('.container').click(function(){
            $('.responsive-menu').toggle();
        });
    </script>
  </body>
</html>
