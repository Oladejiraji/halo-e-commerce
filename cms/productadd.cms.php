<?php
    require 'header.cms.php';
    include '../include/dbh.inc.php';
?>

    <section id="welcome">
        <h1>Add Products</h1>

    <?php
    if (isset($_GET['key'])) { 
        $key = $_GET['key'];
        $sql = "SELECT * FROM products WHERE productid='$key';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        ?>
         <form action="../include/editProduct.inc.php" method="POST" id="add-form" enctype="multipart/form-data">
            <div class="wrap"><input placeholder="Product Name..." type="text" name="name" value="<?php echo $row['productname'] ?>"></div>
            <div class="wrap"><input type="file" name="picture[]" multiple=""></div>
            <div class="wrap"><textarea name="description" placeholder="Product Description..." id="" cols="30" rows="10"><?php echo $row['productdesc'] ?></textarea></div>
            <div class="wrap"><input id="amount" type="number" name="" placeholder="No of product lengths"></div>
            <input type="hidden" name="key" value=<?php echo $key ?>>
            <div id="specific">
               
            </div>
            <div class="wrap"><button id="submit" name="submit" type="submit">Edit Product</button></div>
            <?php
                 if(isset($_GET['add'])){
                
                    $check = $_GET['add'];
     
                     if($check == 'empty') {
                         echo '<p class="error">Fill in All Fields!</p>';
                     } else if($check == 'wrongpictext') {
                        echo '<p class="error">Wrong Image Format!</p>';
                    } else if($check == 'success') {
                        echo '<p class="success">Product edited Successfully!</p>';
                    }
                 }
            ?>
        </form>
    <?php } else { ?>
         <form action="../include/addProduct.inc.php" method="POST" id="add-form" enctype="multipart/form-data">
            <div class="wrap"><input placeholder="Product Name..." type="text" name="name"></div>
            <div class="wrap"><input type="file" name="picture[]" multiple=""></div>
            <div class="wrap"><textarea name="description" placeholder="Product Description..." id="" cols="30" rows="10"></textarea></div>
            <div class="wrap"><input id="amount" type="number" name="" placeholder="No of product lengths"></div>
            <div id="specific">
               
            </div>
            <div class="wrap"><button id="submit" name="submit" type="submit">Add Product</button></div>
            <?php
                 if(isset($_GET['add'])){
                
                    $check = $_GET['add'];
     
                     if($check == 'empty') {
                         echo '<p class="error">Fill in All Fields!</p>';
                     } else if($check == 'wrongpictext') {
                        echo '<p class="error">Wrong Image Format!</p>';
                    } else if($check == 'success') {
                        echo '<p class="success">Product added Successfully!</p>';
                    }
                 }
            ?>
        </form>
    <?php } ?>
    
       
    </section>
    

   

    <script src="../js/addProd.js"></script>
    <script src="../js/navCms.js"></script>
</body>

</html>