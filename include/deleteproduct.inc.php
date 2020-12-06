<?php

include '../include/dbh.inc.php';

$keyCheck = $_GET['key'];

$sql = "SELECT * FROM products WHERE productid='$keyCheck';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['productname'];


$sql = "DELETE FROM products WHERE productid='$keyCheck';";
mysqli_query($conn, $sql);


$sql = "DROP TABLE `$name`";
mysqli_query($conn, $sql);



header("Location:../cms/productall.cms.php?success");
exit();