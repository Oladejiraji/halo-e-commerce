<?php
    require 'header.php';
?>

<section id="login">
    <h1>Admin Login</h1>
    <form action="adminlogin.inc.php" id="login-form" method="POST">   
    
        <div class="wrap"><input type="text" placeholder="Email..." name="uid"></div>
        <div class="wrap"><input type="password" placeholder="Password..." name="pwd"></div>
        <div class="wrap"><input type="Submit" name="login-submit" value="Login"></div>

        <?php
            if (isset($_GET['login'])) {
                $check = $_GET['login'];
                
                if ($check == 'empty') {
                    echo '<p class="error">Fill in All Fields!</p>';
                } else if ($check == 'invaliduid') {
                    echo '<p class="error">Invalid Username!</p>';
                } else if ($check == 'wrongpwd') {
                    echo '<p class="error">Wrong Password!</p>';
                } 
            }
            
        ?>
    </form>
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