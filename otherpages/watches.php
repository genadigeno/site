<?php require_once '../DB/connect.php'; ?>
<?php
session_start();
  $query = "SELECT COUNT(*) as num FROM products";
  $total_pages = mysqli_fetch_array(mysqli_query($connection, $query));
  $total_pages = $total_pages['num'];
  /* pagination */
  $adjacent = 3;

  $targetpage = "watches.php";
  $limit = 12;

  @$page = $_GET['page'];
  if ($page)
    $start = ($page - 1)*$limit;
  else
    $start = 0;

  $sql = "SELECT * FROM products LIMIT $start, $limit";
  $result = mysqli_query($connection, $sql);

  if($page == 0) $page = 1;

  $prev = $page - 1;
  $next = $page +1;

  $lastpage = ceil($total_pages/$limit);
  $lpm1 = $lastpage - 1;

  /* pagination object */

  $pagination = "";
  if ($lastpage > 1) {
    $pagination .= "<div class=\"pagination\">";
    if($page > 1)
      $pagination .= "<a href=\"$targetpage?page=$prev\">&laquo; Previous</a>";
    else
      $pagination .= "<span class=\"disabled\">&previous</span>";

    if ($lastpage < 7 + ($adjacent*2)) {
      for ($counter = 1; $counter <= $lastpage; $counter++) {
        if($counter == $page)
          $pagination .= "<span class=\"current\">$counter</span>";
        else
          $pagination .= "<a href=\"$targetpage?page=$counter\">$counter</a>";
      }
    }
    elseif ($lastpage > 5 + ($adjacent*2)) {
      if ($page < 1 + ($adjacent*2)) {
        for($counter = 1; $counter < 4 + ($adjacent*2); $counter++){
          if($counter == $page)
            $pagination .= "<span class=\"current\">$counter</span>";
          else
            $pagination .= "<a href=\"$targetpage?page=$counter\">$counter</a>";
        }
        $pagination .= "...";
        $pagination .= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
        $pagination .= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
      }
      elseif ($lastpage - ($adjacent*2) > $page && $page > ($adjacent*2)) {
        $pagination .= "<a href=\"$targetpage?page=1\">1</a>";
        $pagination .= "<a href=\"$targetpage?page=2\">2</a>";
        $pagination .= "...";
        $pagination .= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
        for($counter = $page - $adjacent; $counter <= $page + $adjacent; $counter){
          if($counter == $page)
            $pagination .= "<span class=\"current\">$counter</span>";
          else
            $pagination .= "<a href=\"$targetpage?page=$counter>$counter</a>";
        }
        $pagination .= "...";
        $pagination .= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
        $pagination .= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
      }
      else {
        $pagination .= "<a href=\"$targetpage?page=1\">1</a>";
        $pagination .= "<a href=\"$targetpage?page=2\">2</a>";
        $pagination .= "...";
        for($counter = $lastpage - (2+($adjacent*2)); $counter <= $lastpage; $counter++){
          if($counter == $page)
            $pagination .= "<span class=\"current\">$counter</span>";
          else
            $pagination .= "<a href=\"$targetpage?page=$counter>$counter</a>";
        }
      }
    }
    if($page < $counter - 1)
      $pagination .= "<a href=\"$targetpage?page=$next\">Next &raquo;</a>";
    else
      $pagination .= "<span class=\"disabled\">Next &raquo;</span>";
    $pagination .= "</div>";
  }
  /* filter */


?>
<?php include_once '../filtering.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../fonts/CaviarDreams/styles.css">
    <link rel="stylesheet" href="../styles/watchesstyle.css">
    <title>ინტერნეტ მაღაზია JM</title>
    <style media="screen">
      *{
        font-family: 'CaviarDreams-Bold';
      }
    </style>
  </head>
  <body>
    <header>
            <div class="main-menu">
                <img class="logo" src="../images/logo.jpg" width="100px">
                <nav class="navigate">
                    <ul>
                       <li class="head-li"><a href="../index.php">Home</a></li>
                       <li class="head-li dropdown"><a href="">Watches</a>
                           <ul class="dropdown-content">
                               <li><a href="">Watches</a></li>
                               <li><a href="">Clock</a></li>
                               <li><a href="">Alarm Clock</a></li>
                           </ul>
                        </li>
                       <li class="head-li"><a href="">Accessories</a></li>
                       <li class="head-li"><a href="">Sale</a></li>
                    </ul>
                </nav>

                <nav class="register-nav">
                  <ul>
                    <?php if(isset($_SESSION['username'])) { ?>
                      <li class="dropdown-user"><a href="../DB/account.php"><?php echo strtoupper($_SESSION['username'])."'s PAGE"; ?></a></li>
                      <!-- dropdow menu form user -->

                          <li class=""><a href="DB/logout.php">SIGN OUT</a></li>

                      <!-- end dropdown -->

                    <?php } else{ ?><li class="regist"><a href="../DB/signup.php">SIGN UP</a></li>
                      <li class="regist"><a href="../DB/signin.php">SIGN IN</a></li>
                    <?php } ?>
                  </ul>
                </nav>
            </div>
        </header>
    <!-- -->
    <section>
        <div class="section-content">
            <article><h1>Watches</h1></article>
            <ul class="watch-list">
                <?php while($row = mysqli_fetch_assoc($result)) : ?>
                <li><a href="watche.php?page=<?php echo $row['id']; ?>"><img src="../images/watches/<?php echo $row['image']; ?>.jpg" alt="">
                  <p><?php echo $row['name']; ?></p></a>
                  <p><?php echo $row['price']; ?></p>
                </li>
                <?php endwhile; ?>
            </ul>

        </div>
        <?=$pagination; ?>
    </section>
    <aside>
        <div class="aside-content">
            <form action="" method="post" name="search" class="forma-search">
                <p>search</p>
                <input type="search" name="search_box">

                <p style="background-color: cornsilk;
                          padding-left: 69px;
                          padding-bottom: 5px;
                          padding-top: 5px;;">Departament</p>
                <ul>
                    <li><input type="checkbox" name="dep[]" value="women">Women</li>
                    <li><input type="checkbox" name="dep[]" value="men">Men</li>
                    <li><input type="checkbox" name="dep[]" value="kids">Kids</li>
                </ul>
                <p style="background-color: cornsilk;
                          padding-left: 90px;
                          padding-bottom: 5px;
                          padding-top: 5px;;">Price</p>
                <ul>
                    <li><input type="checkbox" name="price[]" "" value="0 AND 99">0 - 99$</li>
                    <li><input type="checkbox" name="price[]" value="100 AND 199">100$ - 199</li>
                    <li><input type="checkbox" name="price[]" value="200 AND 499">200$ - 499$</li>
                    <li><input type="checkbox" name="price[]" value="500 AND 5000">500$ +</li>
                    <li></li>
                </ul>
                <p style="background-color: cornsilk;
                          padding-left: 70px;
                          padding-bottom: 5px;
                          padding-top: 5px;;">Display</p>
                <ul>
                    <li><input type="checkbox" name="display[]" value="numeric">Digitan</li>
                    <li><input type="checkbox" name="display[]" value="analog">Analog</li>
                    <li><input type="checkbox" name="display[]" value="both">Both</li>
                    <li></li>
                </ul>
                <p style="background-color: cornsilk;
                          padding-left: 90px;
                          padding-bottom: 5px;
                          padding-top: 5px;;">Color</p>
                <ul>
                    <li><input type="checkbox" name="color[]" value="white">White</li>
                    <li><input type="checkbox" name="color[]" value="black">Black</li>
                    <li><input type="checkbox" name="color[]" value="gray">Gray</li>
                    <li><input type="checkbox" name="color[]" value="other">Others</li>
                    <li></li>
                </ul>
                <input type="submit" name="submit" value="Filter">
            </form>
        </div>
        <div class="">

        </div>
    </aside>
  </body>
</html>
