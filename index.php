<?php
    require 'header.php';
?>
    <!-- Branding -->

    <div id="branding">
        <div id="branding-img"></div>
        <div id="branding-text">
            <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
            <a href="shop.php" id="branding-button">Shop Now</a>
            <a href="signup.php" id="branding-button">Sign Up</a>
        </div>

    </div>

    <!-- Sections -->

    <section id="section-a">
        <div id="outer-wrap">
            <div id="section-a-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, obcaecati
                repudiandae iusto perspiciatis eligendi officia enim quod aut quo quidem </div>
            <div id="section-a-img">
                <img src="img/section-a-2.PNG">
                <img src="img/section-a-1.PNG">
            </div>
        </div>
    </section>

    <section id="section-b">
        <h1>Top Products</h1>
        <div id="product-flex">

            <?php
                include 'include/dbh.inc.php';
                $sql = 'SELECT * FROM products;';
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                while ($row= mysqli_fetch_assoc($result)) {?>
                
                    <div class='product'  onclick="parent.location='product.php?key=<?php echo $row['productname'] ?>'">
                        <div class='product-img'><img src='img/product 1.PNG'></div>
                        <div class='product-name'><?php echo $row['productname'] ?></div>
                        <div class='product-price'><?php echo $row['productlowprice'] ?></div>
                        <?php
                            if ($row['productava'] == 1) {?>
                                <div class="product-amt">In Store</div>
                            <?php }else if ($row['productava'] == 0) {?>
                                <div class="product-amt">Sold Out</div>
                           <?php }
                        echo "<div class='product-opts'><a href='product.php?key=".$row['productname']."'>OPTIONS</a></div>"; ?>
                    </div>
                <?php } ?>            
            

        </div>
     
        <a href="shop.php" id="shop-btn">Go to Shop</a>
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
    <script src="js/home.js"></script>
</body>

</html>