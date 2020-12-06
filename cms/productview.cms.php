<?php
    require 'header.cms.php';
?>


    <section id="welcome">
        <h1>View Products</h1>

        <?php
            include '../include/dbh.inc.php';
            $key = $_GET['key'];
            $sql = "SELECT * FROM products WHERE productid='$key'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $name = $row['productname'];
        ?>

        <div id="view-prod-name"> <span>Product Name: </span><?php echo $row['productname'] ?></div>
        <div id="view-prod-desc"> <span>Product Description: </span><?php echo $row['productdesc'] ?></div>

        <?php
            $checkName = '`'.$name.'`';
            $sql = "SELECT * FROM ".$checkName ;
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {?>
                <div class="view-prod-spec">
                    <div class="view-prod-length"><?php echo $row['length'] ?></div>
                    <div class="view-prod-price"><?php echo $row['price'] ?></div>
                </div>
        <?php }
        ?>

        


        <?php
            echo "<div id='view-prod-link'> <span>Product Link:</span> <input id='link' value='http://localhost/Halo%20E-commerce/product.php?key=".$name."' type='text'> <div>";
        ?>
        <button id="copy-button">Copy Link</button>
        <?php
            echo "<a id='edit-tag' href='productadd.cms.php?key=".$key."'>Edit Product</a>";
        ?>

   
    </section>
    <script src="../js/profileNav.js"></script>
    <script src="../js/copyLink.js"></script>
</body>

</html>