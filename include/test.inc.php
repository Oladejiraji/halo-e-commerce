<?php
session_start();

$id = $_SESSION['userId'];
$cart = 'cart_'.$id;
$sql = "SELECT * FROM $cart WHERE cartname='deji';";

echo $cart;