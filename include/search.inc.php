<?php
include 'dbh.inc.php';

$name = $_POST['name'];
$name = "%$name%";


$sql = "SELECT productname FROM products WHERE productname LIKE ?;";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "s", $name);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
// $row = mysqli_fetch_assoc($data);
$data = mysqli_fetch_all($result);

// print_r($data);

echo json_encode($data);