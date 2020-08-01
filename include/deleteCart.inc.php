<?php
include 'dbh.inc.php';
session_start();

if (isset($_GET['key'])) {
    $keyCheck = $_GET['key'];

    if (isset($_SESSION['userId'])) {   
        $id = $_SESSION['userUid'];
        $cart = 'cart_'.$id;      
        $sql = "DELETE FROM ".$cart." WHERE id='$keyCheck'";
        mysqli_query($conn, $sql);

        header("Location:../cart.php");
        exit();
    } else {
        foreach ($_SESSION['shopping-cart'] as $key => $value) {
            // print_r($value['cartid']);
            // echo $keyCheck;
            if ($value['cartid'] == $keyCheck) {
                unset($_SESSION['shopping-cart'][$key]);

                header("Location:../cart.php");
                exit();
                // echo 123;
            }
        }
    }
   


} else {
    header("Location:../cart.php");
    exit();
}