<?php
// session_start();
?>
<link rel="stylesheet" href="./css/_main.css">
<nav class="navigation">
    <!-- logo -->
    <a href="index.php" target="new" class="logo">Math Mate Academy</a>

    <!-- menu -->
    <ul class="menu">
        <?php
        $list = ['Home', 'Time Table', 'Collection', 'About', 'Contact Us'];
        foreach ($list as $link) {
            echo "<li><a " . (("$link.php" == basename($_SERVER['PHP_SELF'])) ? 'class="active"' : '') . " href=\"$link.php\">$link</a></li>";
        }

        if (isset($_SESSION['id']) || isset($_SESSION['admin'])) {
            echo '<li><a href="./php/logout.php">Logout</a></li>';
        }

        ?>

    </ul>
    <!--right-->
    <div class="right-elements">
        <!--search-->
        <a href="Search Button.php" class="search"> <i class="fas fa-search"></i> </a>




        <?php
        if (isset($_SESSION['admin'])) {
            // admin
            echo '<a href="Admin.php" ><i class="fas fa-user"></i></a>';
        } else {
            // profile
            echo '<a href="Profile.php" ><i class="fas fa-user"></i></a>';
        }
        if (isset($_SESSION['id'])) {
            //cart
            echo '<a href="./Cart.php" class="cart"> <i class="fas fa-shopping-bag"></i> </a>';

            //orders
            echo '<a href="./Orders.php" ><i class="fas fa-bicycle"></i></a>';

        }

        //nightmode
        if (basename($_SERVER['PHP_SELF']) == 'Home.php') {
            echo '<img src="Photos/moon.png" id="dmode" />';
        }
        ?>
    </div>


</nav>