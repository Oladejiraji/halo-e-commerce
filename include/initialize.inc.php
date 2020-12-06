<?php

include 'dbh.inc.php';
session_start();

if (isset($_SESSION['userId'])) {

    if (isset($_POST['checkout-btn'])) {
        $amount = $_POST['price'];

        $selector = $_SESSION['userUid'];
        $sql = "SELECT * FROM signup WHERE uidUsers='$selector';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        $email = $row['emailUsers'];

        $reference = uniqid();
        // echo $reference;
        
        //INITIALIZE THE TRANSACTION
        
        $curl = curl_init();
        
    
        
        // url to go to after payment
        $callback_url = 'http://localhost/Halo%20E-commerce/include/callback.inc.php';  
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode([
            'amount'=>$amount,
            'email'=>$email,
            'callback_url' => $callback_url
          ]),
          CURLOPT_HTTPHEADER => [
            "authorization: Bearer sk_test_3d87c3f4e08e222ea80c55dc2204cfad519eb793", //replace this with your own test key
            "content-type: application/json",
            "cache-control: no-cache"
          ],
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        if($err){
          // there was an error contacting the Paystack API
          die('Curl returned error: ' . $err);
        }
        
        $tranx = json_decode($response, true);
        
        if(!$tranx['status']){
          // there was an error from the API
          print_r('API returned error: ' . $tranx['message']);
        }
        
        // comment out this line if you want to redirect the user to the payment page
        print_r($tranx);
        // redirect to page so User can pay
        // uncomment this line to allow the user redirect to the payment page
        header('Location: ' . $tranx['data']['authorization_url']);

        

    } else {
        header("Location:../cart.php?error=1");
        exit();
    }
} else {
    header("Location:../login.php?login=pleaselogin");
    exit();
}