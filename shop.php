<?php
    require 'header.php';
?>


    <section id="shops">
        <div id="shop">
            <h1>Shop</h1>
            <div id="shop-grid">


            <?php
                include 'include/dbh.inc.php';
                $sql = 'SELECT * FROM products;';
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                while ($row= mysqli_fetch_assoc($result)) {?>
                
                    <div class='items'>
                        <div class='items-img'><img src='img/product 1.PNG'></div>
                        <div class='items-name'><?php echo $row['productname'] ?></div>
                        <div class='items-price'><?php echo $row['productlowprice'] ?></div>
                        <?php
                            if ($row['productava'] == 1) {?>
                                <div class="items-amt">In Store</div>
                            <?php }else if ($row['productava'] == 0) {?>
                                <div class="items-amt">Sold Out</div>
                           <?php }
                        echo "<div class='items-opts'><a href='product.php?key=".$row['productname']."'>OPTIONS</a></div>"; ?>
                    </div>
                <?php } ?> 


                <!-- <div class="items">
                    <div class="items-img"><img src="img/product 1.PNG"></div>
                    <div class="items-name">Lorem ipsum dolor.</div>
                    <div class="items-amt">In Store</div>
                    <div class="items-price">$300</div>
                    <div class="items-opts"><a href="">OPTIONS</a></div>
                </div> -->
            </div>
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
</body>

</html>