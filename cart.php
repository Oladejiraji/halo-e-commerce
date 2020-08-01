<?php
    require 'header.php';
    include 'include/dbh.inc.php';
?>

    <!-- Shopping Cart -->

    <section id="cart">
        <h1>Your Cart</h1>
        <table id="cart-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['userId'])) {
                $id = $_SESSION['userUid'];
                $cart = 'cart_'.$id;
                $sql = "SELECT * FROM ".$cart;
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if ($resultCheck >! 0) {?>
                    <tr><td>Empty Cart!</td></tr>
            <?php } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                           echo "<tr class='main-cart'>
                                <td>". $row['cartname']." </td>
                                <td class='cart-price'>". $row['cartprice'] ."</td>
                                <td><input class='cartamt' data-id=".$row['id']." type='number' min='1' max='1000' value=".$row['cartamt']."></td>
                                <td class='cart-total'></td>
                                <td ><a href='include/deleteCart.inc.php?key=".$row['id']."' id='delete-key'>x</a></td>
                               </tr>";
                        }
                   
                }
            } else {
                if (empty($_SESSION['shopping-cart'])) {
                    echo "<tr><td>Empty Cart!</td></tr>";
                } else {
                    foreach ($_SESSION['shopping-cart'] as $key => $value) {
                        echo "<tr class='main-cart'>
                        <td>". $value['cartname']." </td>
                        <td class='cart-price'>". $value['cartprice'] ."</td>
                        <td><input class='cartamt'  data-id=".$value['cartid']." type='number' min='1' max='1000' value=".$value['cartamt']."></td>
                        <td class='cart-total'></td>
                        <td ><a href='include/deleteCart.inc.php?key=".$value['cartid']."' id='delete-key'>x</a></td>
                    </tr>";

                   
                    }
                }     
            }?>
              
            
        </tbody>
        </table>
        
        <form id="update-form" action="include/update-cart.inc.php" method="POST">
            <div id="form-input">
            </div>
            <button id="update-button" type="submit">Update Cart</button>
        </form>
        <div id="side">
            <h2>Cart Totals</h2>
            <div id="sub"><label>Subtotal</label><span id="sub-value"></span></div>
            <div id="ship"><label>Shipping</label><span id="shipping">3000</span></div>
            <div id="total"><label>Total</label><span id="total-value"></span></div>
            <button type="submit">CHECKOUT</button>
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
    <script src="js/cartCalc.js"></script>
    <script src="js/fixAmt.js"></script>
    <script src="js/subTotal.js"></script>
</body>

</html>