<?php 
include 'dbh.inc.php';
session_start();



// if (isset($_POST['cartamt_btn'])) {
    
        if (isset($_SESSION['userId'])) {
        foreach ($_POST as $key => $value) {
            $splitString = explode('_', $key);
            if ($splitString[1] != 'btn') {
                $id = $_SESSION['userUid'];
                $cart = 'cart_'.$id;
                $sql = "UPDATE ".$cart." SET cartamt='$value' WHERE id='$splitString[1]';";
                mysqli_query($conn, $sql);
            }
            
        }
        header("Location:../cart.php");
        exit();
        } else {
        foreach ($_POST as $key => $value) {
            $splitString = explode('_', $key);  
            if ($splitString[1] != 'btn') {
                foreach ($_SESSION['shopping-cart'] as $identifier => &$loopdata) {
                    if ($splitString[1] == $loopdata['cartid']) {
                        $loopdata['cartamt'] = $value;
                    } 
                }
            } 
            
        }
        header("Location:../cart.php");
        exit();
    }

   






