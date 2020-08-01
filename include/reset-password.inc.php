<?php

if (!isset($_POST['reset-password-submit'])) {
    header("Location: ..index.php");
    exit();
} else {
    include 'dbh.inc.php';
    
    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwd-repeat'];

    if (empty($pwd) || empty($pwdRepeat)) {
        header("Location: ../create-new-password.php?newpwd=empty&selector=".$selector."validator=".$validator);
        exit(); 
    } else if ($pwd !== $pwdRepeat) {
        header("Location: ../create-new-password.php?newpwd=empty&selector=".$selector."validator=".$validator);
        exit(); 
    }

    $currentDate = date("U");

    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires>=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'There was an Error1';
        exit(); 
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo 'There was an Error2';
            exit();    
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row['pwdResetToken']);

            if ($tokenCheck == false) {
                echo 'You Need To Re-Submit Your Request';
                exit();
            } else if ($tokenCheck == true) {
                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM signup WHERE emailUsers=?;";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'There was an Error3';
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!mysqli_fetch_assoc($result)) {
                        echo 'There was an Error4';
                        exit();
                    } else {
                        $sql = "UPDATE signup SET pwdUsers=? WHERE emailUsers=?;";
                        $stmt = mysqli_stmt_init($conn);

                        if(!mysqli_stmt_prepare($stmt, $sql)) {
                            echo 'There was an Error5';
                            exit();
                        } else {
                            $newhashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newhashedPwd, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo 'There was an Error6';
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location:../login.php?newpwd=passwordupdated");
                            }
                            mysqli_stmt_close($stmt);
                            mysqli_close($conn);
                        }
                    }
                }
            }
        }
    }
}