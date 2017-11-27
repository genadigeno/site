<header>
        <div class="main-menu">
            <img class="logo" src="../images/logo.jpg" width="100px">
            <nav class="navigate">
                <ul>
                   <li class="head-li"><a href="../index.php">Main</a></li>
                   <li class="head-li dropdown"><a href="../otherpages/watches.php">Watches</a>
                       <ul class="dropdown-content">
                           <li><a href="../otherpages/watches.php">Wristlet watch</a></li>
                           <li><a href="">Clock</a></li>
                           <li><a href="">Alarm-watch</a></li>
                       </ul>
                    </li>
                   <li class="head-li"><a href="#acc">Accessories</a></li>
                   <li class="head-li"><a href="">Sale</a></li>
                   <li class="head-li"><a href="">Brands</a></li>
                </ul>
            </nav>
            <!-- register, login, logout -->
            <nav class="register-nav">
                <ul>
                  <?php if(isset($_SESSION['username'])) { ?>
                    <li class="dropdown-user"><a href="../DB/account.php"><?php echo strtoupper($_SESSION['username'])."'s PAGE"; ?></a></li>
                    <!-- dropdow menu form user -->

                        <li class=""><a href="../DB/logout.php">SIGN OUT</a></li>

                    <!-- end dropdown -->

                  <?php } else{ ?><li class="regist"><a href="../DB/signup.php">SIGN UP</a></li>
                    <li class="regist"><a href="../DB/signin.php">SIGN IN</a></li>
                  <?php } ?>
                </ul>
            </nav>
        </div>
    </header>
