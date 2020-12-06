<?php
    require 'header.php';
?>


    <section id="shops">
        <div id="shop">
            <h1>Shop</h1>

            <div id="search-bar">
                <form action="" Method="POST" id="search-form">
                    <input type="text" name="" id="" Placeholder="Search Product Name...">
                    <ul id="data-viewer"></ul>
                </form>
            </div>

            <?php
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            } 

            $sql = 'SELECT * FROM products;';
            $result = mysqli_query($conn, $sql);
            $numberOfResults = mysqli_num_rows($result);
            $resultsPerPage = 5;
            $numberOfPages =  ceil($numberOfResults/$resultsPerPage);
            $thisPageFirstResult = ($page-1)*$resultsPerPage;

            ?>
            <div id="shop-grid">


            <?php
                include 'include/dbh.inc.php';
                $sql = 'SELECT * FROM products LIMIT ' . $thisPageFirstResult. ',' .$resultsPerPage ;
                $result = mysqli_query($conn, $sql);
                
                while ($row= mysqli_fetch_assoc($result)) {?>
                
                <div class="items" onclick="parent.location='product.php?key=<?php echo $row['productname'] ?>'">
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

            </div>
        </div>
        <div id="page-no">
        <?php
             if (!isset($_GET['page'])) {
                $ide = 1;
            } else {
                $ide = $_GET['page'];
            } 
            $next = $ide+1;
            $prev = $ide-1;
            if ($prev != 0) {
                echo '<a href="shop.php?page='.$prev.'"><i class="fas fa-chevron-left"></i></a>';
            }

            for ($page=1; $page <= $numberOfPages; $page++) { 
                echo '<a href="shop.php?page='.$page.'"> ' . $page . ' </a>';
            }

            if (!($next > $numberOfPages)) {
                echo '<a href="shop.php?page='.$next.'"><i class="fas fa-chevron-right"></i></a>';
            }


        ?>
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
    <script src="js/searchForm.js"></script>
</body>

</html>