
<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">

    <title>Portal</title>
    <link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- vendor css files -->
    <link rel="stylesheet" href="assets/js/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/animsition.min.css">
    <link rel="stylesheet" href="assets/js/vendor/morris/morris.css">
    <!-- project main css files -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="assets/js/vendor/rickshaw/rickshaw.min.css">
    <link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">

    <link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />


</head>
<body id="falcon" class="main_Wrapper">
<div id="wrap" class="animsition">
    <!-- HEADER Content -->
    <div id="header">
        <header class="clearfix">
            <!-- Branding -->
            <div class="branding">
                <a href="/"><img src="/assets/images/logo.png" width="220px" height="75px"></a>
            </div>
            <span class="header-title">

            </span>
            <!-- Right-side navigation -->
            <ul class="nav-right pull-right list-inline">

                <li class="dropdown nav-profile">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
<!--                        <img src="assets/images/profile-photo.jpg" alt="" class="0 size-30x30"> -->
                        <div class="user-info">
                            <div class="user-name">
                                <?php
                                echo $_SESSION['user_info']['user_name'];
                                ?>
                            </div>

                        </div>
                    </a>
                    <ul class="dropdown-menu pull-right" role="menu">

                        <li>
                            <a href="profile.php" role="button" tabindex="0">

                                <i class="fa fa-user"></i>Edit</a>
                        </li>

<!--                        <li>-->
<!--                            <a role="button" tabindex="0">-->
<!--                                <i class="fa fa-cog"></i>Firm Settings</a>-->
<!--                        </li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li>-->
<!--                            <a href="" role="button" tabindex="0">-->
<!--                                <i class="fa fa-lock"></i>Support</a>-->
<!--                        </li>-->
                        <li>
                            <a href="logout.php" role="button" tabindex="0">
                                <i class="fa fa-sign-out"></i>Logout</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <!-- Right-side navigation end -->
        </header>

    </div>
