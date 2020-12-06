<?php
    require 'header.php';
?>

<section id="login">
    <h1>Login</h1>
    <form action="include/login.inc.php" id="login-form" method="POST">   
    
        <?php
            if (isset($_GET['mailuid'])) {
                $mailuid = $_GET['mailuid'];
                echo ' <div class="wrap"><input type="text" placeholder="Username or Email..." name="mailuid" value="'.$mailuid.'"></div>';
            } else {
                echo ' <div class="wrap"><input type="text" placeholder="Username or Email..." name="mailuid"></div>';
            }
        ?>  
        <div class="wrap"><input type="password" placeholder="Password..." name="pwd"></div>
        <div class="wrap"><input type="Submit" name="login-submit" value="Login"></div>

        <?php
            if (isset($_GET['login'])) {
                $check = $_GET['login'];
                
                if ($check == 'empty') {
                    echo '<p class="error">Fill in All Fields!</p>';
                } else if ($check == 'nouser') {
                    echo '<p class="error">Invalid Username or Email!</p>';
                } else if ($check == 'wrongpwd') {
                    echo '<p class="error">Wrong Password!</p>';
                }  else if ($check == 'pleaselogin') {
                    echo '<p class="error">Login to make purchase!</p>';
                }
            }
            if(isset($_GET['newpwd'])){
                $newpwd = $_GET['newpwd'];
                
                if ($newpwd == 'passwordupdated') {
                    echo '<p class="success">Password Updated Successfully!</p>';
                }
            }
        ?>
    </form>
    <div id="forgot">
        <a href="reset-password.php">Forgot My Password</a>
        <a href="signup.php">Don't have an account</a>
    </div>
</section>


<footer>
        <h1 id="social-head">Stay Updated</h1>
        <div id="social-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae, iure.</div>
        <div id="social-icon">
            <i class="fas fa-envelope fa-2x"></i>
            <i class="fab fa-instagram fa-2x"></i>
            <i class="fab fa-twitter fa-2x"></i>
        </div>
        <div id="author">By <span> Raji Oladeji </span></div>
    </footer>

    <div id="top-btn"><i class="fas fa-chevron-up"></i></div>



    <script src="js/main.js"></script>
   
</body>

</html>