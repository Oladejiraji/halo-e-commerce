<?php 
include 'dbh.inc.php';
session_start();

//Check if submit button was pressed
if (isset($_POST['button'])) {

    // Get Variables
    $length = $_POST['length'];
    $amt = $_POST['amt'];
    $price = $_POST['price'];
    $key = $_POST['key'];

    //Get the product name from database
    $sql = "SELECT * FROM products WHERE productid='$key';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $cartname = $row['productname'];

    //Get the product price from database
    $cartnamecheck = '`'.$cartname.'`';
    $sql = "SELECT * FROM ".$cartnamecheck." WHERE length='$length'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $cartprice = $row['price'];

    // Check if User is logged in
    if (isset($_SESSION['userId'])) {
        $id = $_SESSION['userUid'];
        $cart = 'cart_'.$id;
        $sql = "SELECT * FROM ".$cart." WHERE cartname='$cartname';";
        $result = mysqli_query($conn, $sql); 
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck == 0) {
            //input Data into Database
            $sql = "INSERT INTO ".$cart." (cartname, cartprice, cartamt) VALUES ('$cartname', '$cartprice', '$amt');";
            mysqli_query($conn, $sql);

            //Return User to product page
            header("Location: ../product.php?key=".$cartname."&cart=success");
            exit();
        } else {
             //Return User to product page
             header("Location: ../product.php?key=".$cartname."&cart=already");
             exit();
        }
        
        

    } else {
        //check if user already has a cart
        if (isset($_SESSION['shopping-cart'])) {
            //Check for the product names in the current shopping cart
            $itemArrayName = array_column($_SESSION['shopping-cart'], 'cartname');

            //Check if cart already has product
            if (in_array($cartname, $itemArrayName)) {

                 //Return User to product page
                 header("Location: ../product.php?key=".$cartname."&cart=already");
                 exit();
            } else {
                //Get the last key in the shopping cart
                end($_SESSION['shopping-cart']);
                $lastKey = key($_SESSION['shopping-cart']);

                //create a shopping cart
                $itemArray = array (
                    'cartid' => $lastKey + 2,
                    'cartname' => $cartname,
                    'cartprice' => $cartprice,
                    'cartamt' => $amt
                );

                //Add item array to shopping cart session
                $_SESSION['shopping-cart'][$lastKey+1] = $itemArray;
                
                //Return User to product page
                header("Location: ../product.php?key=".$cartname."&cart=success");
                exit();
            }

            
        } else {
            //create a shopping cart
            $itemArray = array (
                'cartid' => 1,
                'cartname' => $cartname,
                'cartprice' => $cartprice,
                'cartamt' => $amt
            );
            //Add item array to shopping cart session
            $_SESSION['shopping-cart'][0] = $itemArray;
            
            //Return User to product page
            header("Location: ../product.php?key=".$cartname."&cart=success");
            exit();
        }
    }
    


} else {
    header("Location: ../index.php");
    exit();
}