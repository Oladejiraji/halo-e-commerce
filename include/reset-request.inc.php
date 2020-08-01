<?php 

if (!isset($_POST['reset-submit'])) {
    header("Location: ../reset-password.php");
    exit();
} else {
    include 'dbh.inc.php';

    $userEmail = $_POST['mail'];

    if (empty($userEmail)) {
        header("Location: ../reset-password.php?reset=empty");
        exit();
    } else {

        $sql = "SELECT * FROM signup WHERE emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo 'Please Try Again';
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)){


                $selector = bin2hex(random_bytes(8));
                $token = random_bytes(32);
        
                $url = "http://localhost/Halo%20E-commerce/create-new-password.php?selector=$selector&validator=".bin2hex($token);
        
                $expires = date("U") + 1800;
        
                $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Please Try Again';
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $userEmail);
                    mysqli_stmt_execute($stmt);
                }
        
                $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'Please Try Again';
                    exit();
                } else {
                    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
                    mysqli_stmt_execute($stmt);
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
        
        
                $to = $userEmail;
        
                $subject = 'Reset Your Password For Halo Hair Empire';
        
                $message = '<p>We received a password reset request. The link to reset your password is below.
                If you did not make this request, you can ignore this email</p>';
                $message .= '<p>Here is your password request link: <br>';
                $message .= '<a href="' .$url. '">'.$url.'</a><p>';
        
                $headers = "From: Oladeji <dejimailtest@gmail.com>\r\n";
                $headers .= "Reply-To: dejimailtest@gmail.com\r\n";
                $headers .= "Content-type: text/html\r\n";
        
                mail($to, $subject, $message, $headers);
        
                header("Location: ../reset-password.php?reset=success");

            } else {
                header("Location: ../reset-password.php?reset=nouser");
            }

        }
        








      
    }
}