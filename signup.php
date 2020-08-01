<?php
    require 'header.php';
?>

<section id="signup">
    <h1>Sign Up</h1>
    <form action="include/signup.inc.php" id="signup-form" method="POST">
        <?php
            if(isset($_GET['name'])){
                $name = $_GET['name'];
                echo '<div class="wrap"><input type="text" placeholder="Full name..." name="name" value="'.$name.'"></div>';
            } else {
                echo '<div class="wrap"><input type="text" placeholder="Full name..." name="name"></div>';    
            }
        ?>
        <?php
            if(isset($_GET['phone'])){
                $phone = $_GET['phone'];
                echo ' <div class="wrap"><input type="tel" name="phone" id="phone" placeholder="Phone No..." value="'.$phone.'"></div>';
            } else {
                echo ' <div class="wrap"><input type="tel" name="phone" id="phone" placeholder="Phone No..."></div>';    
            }
        ?>
        <?php
            if(isset($_GET['uid'])){
                $uid = $_GET['uid'];
                echo '<div class="wrap"><input type="text" placeholder="Username..." name="uid" value="'.$uid.'"></div>';
            } else {
                echo '<div class="wrap"><input type="text" placeholder="Username..." name="uid"></div>';    
            }
        ?>
        <?php
            if(isset($_GET['mail'])){
                $mail = $_GET['mail'];
                echo ' <div class="wrap"><input type="text" placeholder="Email..." name="mail" value="'.$mail.'" ></div>';
            } else {
                echo ' <div class="wrap"><input type="text" placeholder="Email..." name="mail"></div>';    
            }
        ?>
        
       
        <div class="wrap"><input type="password" placeholder="Password..." name="pwd"></div>
        <div class="wrap"><input type="password" placeholder="Repeat Password..." name="pwd-repeat"></div>
        <div class="wrap"><input type="Submit" name="signup-submit" value="Sign Up"></div>

        <?php
            if(isset($_GET['error'])){
                
               $check = $_GET['error'];

                if($check == 'empty') {
                    echo '<p class="error">Fill in All Fields!</p>';
                } else if($check == 'invalidmail') {
                    echo '<p class="error">Invalid Email!</p>';
                }  else if($check == 'invaliduid') {
                    echo '<p class="error">Invalid Username!</p>';
                }  else if($check == 'invalidmailanduid') {
                    echo '<p class="error">Invalid Email and Username!</p>';
                }  else if($check == 'pwdcheck') {
                    echo '<p class="error">The Passwords do not Match!</p>';
                }  else if($check == 'usertaken') {
                    echo '<p class="error">This Username Has Been Taken!</p>';
                }  else if($check == 'success') {
                    echo '<p class="success">Signed Up Successfully!</p>';
                }  else if($check == 'invalidphone') {
                    echo '<p class="error">Invalid Phone No!</p>';
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