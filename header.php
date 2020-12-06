<?php
    session_start();
    include 'include/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halo e-commerce</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/spec.css">
    <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.min.css">
</head>

<body>

    <!-- Header -->

    <header>
        <nav>
            <!-- <i id="bars" class="fas fa-bars"></i> -->
            <div class="menu-btn">
                <div class="menu-burger"></div>
            </div>
        </nav>
        <div id="main-title"><a id="halo" href="index.php">Halo's Hair Empire</a></div>
        <div id="main-icon">
            <div id="shopping-icon">
                <?php  
                if (isset($_SESSION['userId'])) {
                    $id = $_SESSION['userUid'];
                    $cart = 'cart_'.$id;
                    $sql = "SELECT * FROM ".$cart;
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);?>

                    <div id="cart-no"><?php echo $resultCheck ?></div>
               <?php } else {
                   if (empty($_SESSION['shopping-cart'])) {?>
                        <div style="display:none;" id="cart-no"></div>
                   <?php } else {
                       $count = count($_SESSION['shopping-cart']);?>
                       <div id="cart-no"><?php echo $count ?></div>
                <?php  }

                   

               }?>
               
                <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
    </header>

    <div id="nav-bar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php
            
                if (isset($_SESSION['userId'])) {
                    echo '<li><a href="include/logout.inc.php">Log Out</a></li>';
                } else {
                    echo '<li><a href="login.php">Log In</a></li>';
                }
            
            ?>
           
        </ul>
    </div>