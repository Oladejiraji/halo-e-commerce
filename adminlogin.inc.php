<?php
require __DIR__ . '\vendor\autoload.php';
use Dotenv\Dotenv;

if (!isset($_POST['login-submit'])) {
    header("Location: adminLogin.php");
    exit();
} else {
    
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    if (empty($uid) || empty($pwd)) {
        header("Location: adminLogin.php?login=empty");
        exit();
    } else {
        
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        $pwdenv = $_ENV['ADMIN_PASSWORD'];
        $uidenv = $_ENV['ADMIN_USERNAME'];
        
        if ($uid != $uidenv) {
            header("Location: adminLogin.php?login=invaliduid");
            exit();
        } else {
            if ($pwd != $pwdenv) {
                header("Location: adminLogin.php?login=wrongpwd");
                exit();
            } else {
                session_start();
                $_SESSION['adminUid'] = 'Admin';
                header("Location: cms/index.cms.php");
                exit();
            }
        }
        
        
       
    }
}