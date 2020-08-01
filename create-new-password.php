<?php
    require 'header.php';
?>

<section id="change">
    <?php
        $selector = $_GET['selector'];
        $validator = $_GET['validator'];

        if (empty($selector) || empty($validator)) {
            echo 'Could not validate your request';
        } else {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                ?>
                <section id="change-pwd">
                    <form action="include/reset-password.inc.php" method="post">
                      <input type="hidden" name="selector" value="<?php echo $selector ?>">  
                      <input type="hidden" name="validator" value="<?php echo $validator ?>">
                      <div class="wrap"><input type="password" name="pwd" placeholder="New Password..."></div>
                      <div class="wrap"> <input type="password" name="pwd-repeat" placeholder="Repeat New Password..."></div>
                      <div class="wrap"><input type="submit" name="reset-password-submit" value="Reset Password"></div>
                </form>
                </section>
                <?php
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