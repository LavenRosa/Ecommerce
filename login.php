<?php
  include("dbcon.php");
          session_start();
          if(isset($_POST['login']))
          $user_name = $_POST['username'];
          $user_pass = $_POST['userpass'];

          $sql = "SELECT * FROM user WHERE user_name='$user_name' and user_pass='$user_pass'";
          $res = mysqli_query($con,$sql);
          if(mysqli_num_rows($res)==1){
            $row = mysqli_fetch_assoc($res);
            if($user_name==$row['user_name'] and $user_pass==$row['user_pass']){
              $_SESSION['username'] = $row['user_name'];
              $_SESSION['userpass'] = $row['user_pass'];
              $_SESSION['login']=true;

              header("Location:index.php");
            }else{
              echo "Not a member";
            }
          }

        ?>
        
<?php
    
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
                    <h3>Hello Friend!</h3>
                    <p>Create New Account</p>
                    <div id="btn"><a href="signup.php">Sign up</a></div>
                </div>
                <div class="col-md-8" id="side2">
                  <form action="" method="post">
                    <h3>Login Account</h3>
                    <div class="inp">
                        <input type="text" name="username" placeholder="User Name" required>
                        <input type="text" name="userpass" placeholder="Password" required>
                    </div>
                    <p>Forgot Your Password</p>
                    <div class="icons">
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div id="login"><button type="submit" name="login">LOG IN</button></div>
                    </form>
                </div>
            </div>
        </div>

       
        <!-- login -->









<!-- footer -->
<?php
  include("footer.php");
?>
<!-- footer -->

<a href="#" class="arrow"><i><img src="./image/up-arrow.png" alt="" width="50px"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>