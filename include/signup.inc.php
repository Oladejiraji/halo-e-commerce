<?php

if(!isset($_POST['signup-submit'])){
    header("Location: ../signup.php");
    exit();
} else{
    
    require 'dbh.inc.php';
    
    $name = $_POST['name'];
    $uid = $_POST['uid'];
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwd-repeat'];
    $phone = $_POST['phone'];


    if(empty($name) || empty($uid) || empty($mail) || empty($pwd) || empty($pwdRepeat) || empty($phone)){
        header("Location: ../signup.php?error=empty&mail=$mail&uid=$uid&name=$name&phone=$phone");
        exit();
    } else  if (!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
        header("Location: ../signup.php?error=invalidmailanduid&phone=$phone&name=$name");
        exit();
    } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&uid=$uid&name=$name&phone=$phone");
        exit();
    }  else if(!preg_match("/^[a-zA-Z0-9]*$/", $uid)){
        header("Location: ../signup.php?error=invaliduid&mail=$mail&name=$name&phone=$phone");
        exit();
    }  else if(mb_strlen($phone) != 11){
        header("Location: ../signup.php?error=invalidphone&mail=$mail&name=$name&uid=$uid");
        exit();
    } else if($pwd != $pwdRepeat){
        header("Location: ../signup.php?error=pwdcheck&mail=$mail&uid=$uid&name=$name&phone=$phone");
        exit();
    } else {
        $sql = "SELECT uidUsers FROM signup WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerrors");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $uid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck > 0){
                header("Location: ../signup.php?error=usertaken&mail=$mail&name=$name&phone=$phone");
                exit();
            } else{
                $sql = "INSERT INTO signup (nameUsers, uidUsers, emailUsers, pwdUsers, phoneUsers) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssssi", $name, $uid, $mail, $hashedPwd, $phone);
                    mysqli_stmt_execute($stmt);

                    $cartuid = 'cart_'.$uid;
                    $sql = "CREATE TABLE ".$cartuid." (id int(11) not null primary key auto_increment, cartname text not null, cartprice text not null, cartamt int(11) not null)";
                    mysqli_query($conn, $sql);


                    header("Location: ../signup.php?error=success");
                    exit();
                }
            }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}


