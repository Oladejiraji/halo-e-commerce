<?php


if (!isset($_POST['login-submit'])) {
    header("Location: ../login.php");
    exit();
} else {
    include 'dbh.inc.php';
    
    $mailuid = $_POST['mailuid'];
    $pwd = $_POST['pwd'];

    if (empty($mailuid) || empty($pwd)) {
        header("Location: ../login.php?login=empty&mailuid=$mailuid");
        exit();
    } else {
        $sql = "SELECT * FROM signup WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?login=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($pwd, $row['pwdUsers']);

                if ($pwdCheck == false) {
                    header("Location: ../login.php?login=wrongpwd&mailuid=$mailuid");
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();

                    if (isset($_SESSION['shopping-cart'])) {
                        foreach ($_SESSION['shopping-cart'] as $key => $value) {
                            $keyName = $value['cartname'];
                            $keyAmt = $value['cartamt'];
                            $keyPrice = $value['cartprice'];

                            $id = $_SESSION['userUid'];
                            $cart = 'cart_'.$id;

                            $sql = "SELECT cartname FROM ".$cart." WHERE cartname='$keyName'";
                            // print_r($value);
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            if ($resultCheck > 0) {
                                $sql = "UPDATE ".$cart." SET cartamt='$keyAmt' WHERE cartname='$keyName'";
                                mysqli_query($conn, $sql);
                            } else {
                                $sql = "INSERT INTO ".$cart." (cartname, cartprice, cartamt) VALUES ('$keyName', '$keyPrice', '$keyAmt')";
                                mysqli_query($conn, $sql);
                            }
                        }
                    }

                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }else{
                header("Location: ../login.php?login=nouser");
                exit();
            }
        }
    }
}