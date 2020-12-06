<?php

if (isset($_POST['submit'])) {
    include 'dbh.inc.php';

    $name = $_POST['name'];
    $desc = $_POST['description'];
    $length = $_POST['length'];
    $price = $_POST['price'];
    $pic = $_FILES['picture'];
    $picName = $pic['name'];
    $picTmpName = $pic['tmp_name'];
    $picSize = $pic['size'];
    $picError = $pic['error'];
    $picType = $pic['type'];
    $key = $_POST['key'];

    if (empty($name) || empty($desc) || empty($length) || empty($price)) {
        header("Location: ../cms/productadd.cms.php?add=empty");
        exit();
    } else {

        $sql = "UPDATE products SET productname=?, productlowprice=?, productdesc=? WHERE productid='$key';";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $name, $price[0], $desc);
        mysqli_stmt_execute($stmt);


        $sql = "DROP TABLE `$name`";
        mysqli_query($conn, $sql);


        $sql = "CREATE TABLE `$name` (id int(11) not null PRIMARY KEY AUTO_INCREMENT, length text not null, price text not null );";
        mysqli_query($conn, $sql);
        
        foreach ($length as $key => $value) {

            foreach ($price as $identifier => $loopdata) {
                if ($key == $identifier) {
                    $sql = "INSERT INTO `$name` (length, price) VALUES (?,?);";
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_bind_param($stmt, "ss", $value, $loopdata);
                    mysqli_stmt_execute($stmt);
                }
            }

          
        }

        foreach ($picName as $key => $value) {
            $fileExt = explode('.', $value);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'png', 'jpeg');
            if (!in_array($fileActualExt, $allowed)) {
                header("Location: ../cms/productadd.cms.php?add=wrongpicext");
                exit();
            }
        }
    
        $picFolder = $name. " Pics";
        $count = 0;
        foreach ($picName as $key => $value) {
            $fileExt = explode('.', $value);
            $fileActualExt = strtolower(end($fileExt));
            $fileNewName = $name." ".$count."." .$fileActualExt;
            $fileDestination = '../'.$picFolder."/".$fileNewName;
    
            move_uploaded_file($picTmpName[$count], $fileDestination);
    
            $count = $count + 1;
        }
    






        header("Location: ../cms/productadd.cms.php?add=success");
        exit();

       
    }

    





} else {
    header("Location: ../cms/productadd.cms.php");
    exit();
}