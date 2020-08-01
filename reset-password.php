<?php
    require 'header.php';
?>

<section id="reset">
    <h1>Forgot Your Password</h1>
    <form action="include/reset-request.inc.php" id="reset-form" method="POST">
        <div class="wrap"><input type="text" name="mail" placeholder="Enter Your Email Here..."></div>
        <div class="wrap"><input type="Submit" name="reset-submit" value="Send Reset Link"></div>
    </form>

    <?php
        if (isset($_GET['reset'])) {
            $reset = $_GET['reset'];
            
            if ($reset == 'empty') {
                echo '<p class="error">Fill in All Fields!</p>';
            } else if ($reset == 'nouser') {
                echo '<p class="error">There is No User With This Email!</p>';
            } else if ($reset == 'success') {
                echo '<p class="success">Reset Email Sent Successfully!</p>';
            }
        }
    ?>
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