
<?php
include "includes/db-connect.php";
    session_start();
if(isset($_POST['user_email'])){
    $sql="SELECT * FROM users WHERE user_email='".$_POST['user_email']."'";
    $result= mysqli_query($link,$sql);
    if($row = mysqli_fetch_array($result)){
        if($row['user_password'] == $_POST['user_password'])
            $_SESSION['user_info']=$row; //session register
        header("location:dashboard.php");
    }
    else {
        header("location:login.php");
    }
}
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <title>portal</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/js/vendor/bootstrap/bootstrap.min.css">
  <!-- CSS Files -->
  <link href="assets/css/main.css" rel="stylesheet">
    <style>
        #videoBG {
            position: fixed;
            z-index: -1;
        }

        @media (min-aspect-ratio: 16/9) {
            #videoBG {
                width:100%;
                height: auto;
            }
        }
        @media (max-aspect-ratio: 16/9) {
            #videoBG {
                width:auto;
                height: 100%;
            }
        }
    </style>
</head>

<body id="falcon" class="authentication">
<video id="videoBG" poster="attachments/back.jpeg" autoplay muted loop>
    <source src="attachments/back.mp4" type="video/mp4">
</video>
  <div class="wrapper">
    <div class="header header-filter" style="">
      <div class="container">
          <img src="assets/images/logo.png" width="320" height="100" style="margin: 20px;">
        <div class="row">

          <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
            <div class="card card-signup">
              <form class="form" method="post" action="login.php">
<!--                <div class="header header-primary text-center">-->
<!--                  <h4>Sign in</h4>-->
<!--                  <div class="social-line">-->
<!--                    <a href="javascript:void(0);" class="btn btn-just-icon">-->
<!--                      <i class="fa fa-facebook-square"></i>-->
<!--                    </a>-->
<!--                    <a  href="javascript:void(0);" class="btn btn-just-icon">-->
<!--                      <i class="fa fa-twitter"></i>-->
<!--                    </a>-->
<!--                    <a href="javascript:void(0);" class="btn btn-just-icon">-->
<!--                      <i class="fa fa-google-plus"></i>-->
<!--                    </a>-->
<!--                  </div>-->
<!--                </div>-->
<!--                <h3 class="mt-0">Falcon</h3>-->
<!--                <p class="help-block">Or Be Classical</p>-->
                <div class="content">
                  <div class="form-group">
                    <input type="email" class="form-control underline-input" placeholder="Enter Your Email" name="user_email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" placeholder="Password..." class="form-control underline-input" name="user_password" required>
                  </div>
<!--                  <div class="checkbox">-->
<!--                    <label>-->
<!--                      <input type="checkbox" name="optionsCheckboxes"> Remember me</label>-->
<!--                  </div>-->
                </div>
                <div class="footer text-center">
                    <button class="btn btn-info btn-raised" type="submit">Login</button>
                </div>
<!--                <a href="forgotpass.html" class="btn btn-wd">Forgot Password?</a>-->
              </form>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer mt-20">
        <div class="container">
          <div class="col-lg-12 text-center">
            <a href="signup.php" class="text-uppercase text-blue">Create an account</a>

          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--  Vendor JavaScripts -->
  <script src="assets/bundles/libscripts.bundle.js"></script>
<!--  <script src="assets/bundles/mainscripts.bundle.js"></script>-->
  <!-- Custom Js -->
</body>
</html>