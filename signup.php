<?php
include "includes/db-connect.php";
if (isset($_POST['user_email'])){
    $sql = "SELECT * FROM users WHERE user_email = '".$_POST['user_email']."'";
    $result = mysqli_query($link, $sql);
    if (isset($_POST['agree'])){

        if ($row = mysqli_fetch_object($result)){

            header("location:signup.php?error=email_dump");
        } else {
            $sqla = "INSERT INTO users (user_name,user_email,user_password,user_level,status,user_pic,accountid) VALUES ('".$_POST['user_name']."','".$_POST['user_email']."','".$_POST['user_password']."',0,0,'','".$_POST['accountid']."')";

            $resulta = mysqli_query($link, $sqla);
            if ($resulta) {
                header('location:login.php');
            }
        }
    } else{
        header("location:signup.php?error=not_agree");
    }
}
?>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Portal</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <link rel="stylesheet" href="assets/js/vendor/bootstrap/bootstrap.min.css">
    <!--  Fonts and icons -->
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
<!-- Application Content -->
<div class="wrapper">
    <div class="header header-filter">
        <img src="assets/images/logo.png" width="320" height="100" style="margin: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
                    <div class="card card-signup">
                        <form class="form" method="post" action="signup.php">
                            <?php
                            if(isset($_GET['error'])){
                                if($_GET['error']=='email_dump'){
                                    echo 'Rewrite email';
                                }
                                if($_GET['error']=='not_agree') {
                                    echo 'please check AGREE TREMS';
                                }
                            }
                            ?>
<!--                            <div class="header header-primary text-center">-->
<!--                                <h4>Sign Up</h4>-->
<!--                                <div class="social-line">-->
<!--                                    <a href="#" class="btn btn-just-icon">-->
<!--                                        <i class="fa fa-facebook-square"></i>-->
<!--                                    </a>-->
<!--                                    <a href="#" class="btn btn-just-icon">-->
<!--                                        <i class="fa fa-twitter"></i>-->
<!--                                    </a>-->
<!--                                    <a href="#" class="btn btn-just-icon">-->
<!--                                        <i class="fa fa-google-plus"></i>-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <h3 class="mt-0">Falcon</h3>-->
                            <p class="help-block"></p>
                            <div class="content">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Your Name" name="user_name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control underline-input" placeholder="Enter Your Email" name="user_email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Password..." class="form-control" name="user_password" required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Your AccountID" name="accountid" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="agree"> I agree to the
                                        <a href="javascript:;">Terms of Service</a> &amp;
                                        <a href="javascript:;">Privacy Policy</a>
                                    </label>
                                </div>
                            </div>
                            <div class="footer text-center mb-20">
                                <button class="btn btn-info btn-raised" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center mt-20">
                        <a href="login.php" class="text-uppercase text-blue">Back</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!--/ Application Content -->
<!--  Vendor JavaScripts -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/mainscripts.bundle.js"></script>  <!-- Custom Js -->
</body>
</html>