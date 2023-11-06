<?php
  include("dbcon.php");
  include("head.php");
  include("topnav.php");
  include("nav.php");
?>
<body>

    <!-- top navbar -->
    
    <!-- top navbar -->

        <!-- navbar -->
      
        <!-- navbar -->


        <!-- login -->
        <div class="container login">
            <div class="row">
                <div class="col-md-4" id="side1">
                    <h3>Welcome Back!!</h3>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                    <div id="btn"><a href="login.php">Login</a></div>
                </div>
                <div class="col-md-8" id="side2">
                  <form action="" method="post">
                    <h3>Create Account</h3>
                    <div class="inp">
                        <input type="text" name="user_name" placeholder="Name" required>
                        <input type="text" name="user_pass" placeholder="Password" required>
                        <input type="email" name="user_email" placeholder="Email" required>
                        
                    </div>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <div class="icons">
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div id="login"><button type="submit" name="signup">SIGN UP</button></div>
                  </form>
                </div>
            </div>
        </div>

        <?php
        if(isset($_POST['signup'])){
          $user_name = $_POST['user_name'];
          $user_pass = $_POST['user_pass'];
          $user_email = $_POST['user_email'];

        
        $sql = "INSERT INTO user(user_name, user_pass, user_email) VALUES ('$user_name','$user_pass','$user_email')";
          mysqli_query($con,$sql);
        }
        ?>
        <!-- login -->

        <?php
          $user_pass=$_POST['user_pass'];
          $length=strlen($user_pass);
          if($length==8){
            $length=true;
            if(isset($_POST['signup'])){
            $user_name = $_POST['user_name'];
            $user_pass = $_POST['user_pass'];
            $user_email = $_POST['user_email'];

            $sql = "INSERT INTO user(user_name, user_pass, user_email) VALUES ('$user_name','$user_pass','$user_email')";
            mysqli_query($con,$sql);
            }}
          else{
            echo "You must 8 letter password";
          }

          $password = 'user-input-pass';

// Validate password strength
/*$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
}else{
    echo 'Strong password.';
}
          
       */ ?>







<!-- footer -->
<?php
  include("footer.php");
?>
<!-- footer -->

<a href="#" class="arrow"><i><img src="./image/up-arrow.png" alt="" width="50px"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>