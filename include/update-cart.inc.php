<?php 
include 'dbh.inc.php';
session_start();

if (isset($_SESSION['userId'])) {
    foreach ($_POST as $key => $value) {
        $splitString = explode('_', $key);
        // print_r($splitString);
        // print_r($value);
        $id = $_SESSION['userUid'];
        $cart = 'cart_'.$id;
        $sql = "UPDATE ".$cart." SET cartamt='$value' WHERE id='$splitString[1]';";
        
        mysqli_query($conn, $sql);
        
        
    }
    
    header("Location:../cart.php");
    exit();
    
} else {
    foreach ($_POST as $key => $value) {
        $splitString = explode('_', $key);
      
        
        foreach ($_SESSION['shopping-cart'] as $identifier => &$loopdata) {
            if ($splitString[1] == $loopdata['cartid']) {
                // print_r($loopdata['cartname']); 
                $loopdata['cartamt'] = $value;
               
            } 
        }

     
        
    }
    // print_r($_SESSION['shopping-cart']);
  
    header("Location:../cart.php");
    exit();
}
   






