<?php
session_start();
if (!isset($_SESSION['user_info'])){
    header("location:login.php");
}

?>
<?php
include 'includes/db-connect.php';
if (isset($_POST['email'])){

    $sql = "INSERT INTO new_referral (ltd_claim,street1,ltd_policy,street2,f_name,city,l_name,state,dob,zip,ssn,phone,
date_last_worked,impairment,ocupation,email,add_info) VALUES ('".$_POST['ltd_claim']."','".$_POST['street1']."','".$_POST['ltd_policy']."','".$_POST['street2']."',
        '".$_POST['f_name']."','".$_POST['city']."','".$_POST['l_name']."','".$_POST['state']."','".$_POST['dob']."','".$_POST['zip']."',
        '".$_POST['ssn']."','".$_POST['phone']."','".$_POST['date_last_worked']."','".$_POST['impairment']."',
        '".$_POST['ocupation']."','".$_POST['email']."','".$_POST['add_info']."')";

    $result = mysqli_query($link,$sql);
    if ($result){
        header('location:list_views.php');
    }
}
?>
<?php
include "includes/header-content.php";
include "includes/sidebar-content.php";

?>

<section id="content">
    <div class="page charts-page">
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">

                    <div class="boxs-body">
                        <form method="post" action="new-referral.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>LTD Claim#</label>
                                        <input type="text" id="ltd_claim" name="ltd_claim" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Street1</label>
                                        <input type="text" id="street1" name="street1" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>LTD Policy#</label>
                                        <input type="text" id="ltd_policy" name="ltd_policy" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Street2</label>
                                        <input type="text" id="street2" name="street2" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" id="f_name" name="f_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" id="city" name="city" maxlength="25" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" id="l_name" name="l_name" maxlength="25" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" id="state" name="state" maxlength="25" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DOB</label>
                                        <input type="text" id="dob" name="dob" maxlength="25" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Zip</label>
                                        <input type="text" id="zip" name="zip" maxlength="25" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SSN</label>
                                        <input type="text" id="ssn" name="ssn" maxlength="25" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" id="phone" class="form-control" name="phone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date Last worked</label>
                                        <input type="text" id="date_last_worked" name="date_last_worked" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Impairment</label>
                                        <input type="text" id="impairment" name="impairment" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ocupation</label>
                                        <input type="text" id="ocupation" name="ocupation" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="email" name="email" class="form-control" type="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Additional Info</label>
                                        <textarea id="add_info" name="add_info" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button class="btn btn-raised btn-success" type="submit">Create</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
</div>

<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
<script src="assets/bundles/flotscripts.bundle.js"></script>
<script src="assets/js/vendor/gaugejs/gauge.min.js"></script>
<script src="assets/js/vendor/raphael/raphael-min.js"></script>
<script src="assets/js/vendor/d3/d3.v2.js"></script>
<!--<script src="assets/js/vendor/rickshaw/rickshaw.min.js"></script>-->
<script src="assets/js/vendor/morris/morris.min.js"></script>
<script src="assets/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>
<script src="assets/js/vendor/countTo/jquery.countTo.js"></script>
<!--/ vendor javascripts -->

<!--  Custom JavaScripts -->
<script src="assets/bundles/mainscripts.bundle.js"></script> <!-- Custom Js -->

<!--/ custom javascripts -->
<script type="text/javascript">
    $('.header-title').html('Create New Referral');
</script>
</body>
</html>