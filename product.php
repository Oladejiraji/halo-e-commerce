<?php
    require 'header.php';
    include 'include/dbh.inc.php';
?>


    <!-- Products -->

    <section id="hair">
        <div class="hair-img">
            <div id="hair-photo">
                <img class="active" src="img/product 1.PNG" alt="">
                <img src="img/popular.PNG" alt="">
                <img src="img/product 2.PNG" alt="">
                <img src="img/product 3.PNG" alt="">
            </div>
            <div id="hair-btns">
                <i id="left" class="fas fa-chevron-left"></i>
                <i id="right" class="fas fa-chevron-right"></i>
            </div>
        </div>

        <?php
            $keyCheck = $_GET['key'];
            $keyCheckName = '`'.$keyCheck.'`';
            $sql = 'SELECT * FROM' .$keyCheckName; 
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
        ?> <div id="database-info"> <?php
                while ($row = mysqli_fetch_assoc($result)) {?>
                    <div class="prod-couple">
                        <div class="data-length"><?php echo $row['length'] ?></div>
                        <div class="data-price"><?php echo $row['price'] ?></div>
                    </div>
            <?php } ?>
            </div> 
        
        
        <?php
            $sql = "SELECT * FROM products WHERE productname='$keyCheck'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
            $keyid = $row['productid'];
        ?>
        <div class="hair-info">
            <div class="hair-name"><?php echo $keyCheck ?></div>
            <div class="hair-desc"><?php echo $row['productdesc'] ?></div>


            <?php
                $keyCheck = $_GET['key'];
                $keyCheckName = '`'.$keyCheck.'`';
                $sql = 'SELECT * FROM' .$keyCheckName; 
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                $row = mysqli_fetch_assoc($result);
            ?>

            <form class="add-cart" method="POST" action="include/addCart.inc.php">
                <input type="hidden" name="key" value=<?php echo $keyid ?>>
                <input type="hidden" name="price" value=<?php echo $row['price'] ?>>
                <label for="">Select Hair Length:</label>
                <select class="hair-length" name="length">
        
                </select>
                <label for="">Amount:</label>
                <input min="1" max="1000" class="hair-amt" type="number" value="1" name="amt"> 
                <div class="hair-price"><?php echo 'NGN' .$row['price'] ?></div>
                <div style="display:none;" class="hair-price-mark"><?php echo 'NGN' .$row['price'] ?></div>
                <button name="button" type="submit">Add to Cart</button>
                <a id="shop-product-btn" href="shop.php">Go To Shop</a>
                <?php
                if (isset($_GET['cart'])) {
                    $selector = $_GET['cart'];
                    if ($selector == 'success') {
                        echo "<p class='success-cart'>Added!</p>";
                    } else if ($selector == 'already') {
                        echo "<p class='failure-cart'>Item already in Cart!</p>";
                    }
                    
                }
                ?>
            </form>

        </div>
    </section>


    <footer>
        <h1 id="social-head">Stay Updated</h1>
        <div id="social-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae, iure.</div>
        <div id="social-icon">
            <i class="fas fa-envelope fa-2x"></i>
            <i class="fab fa-instagram fa-2x"></i>
            <i class="fab fa-twitter fa-2x"></i>
        </div>
        <div id="author">By <span> Raji Oladeji </span></div>
    </footer>

    <div id="top-btn"><i class="fas fa-chevron-up"></i></div>



    <script src="js/main.js"></script>
    <script src="js/product.js"></script>
    <script src="js/priceView.js"></script>
</body>

</html>