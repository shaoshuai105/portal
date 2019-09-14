<?php
session_start();
if (!isset($_SESSION['user_info'])){
    header("location:login.php");
}

?>
<?php
include "includes/header-content.php";
include "includes/sidebar-content.php";
?>
<section id="content">
    <div class="page page-tables-footable">
        <!-- bradcome -->
        <div class="b-b mb-10">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">Workers Compensation</h1>
                    <small class="text-muted">Created at May 20,2019</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="boxs-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><b>Client Information</b></label>

                    </div>
                    <div class="form-group">
                        <label class="">Name</label>
                       <label class=""></label>
                    </div>
                    <div class="form-group">
                        <label class="">Phone</label>
                        <label class=""></label>
                    </div>
                    <div class="form-group">
                        <label class="">Email</label>
                        <label class=""></label>
                    </div>
                    <div class="form-group">
                        <label class="">Adress</label>
                        <label class=""></label>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><b>Case Information</b></label>

                    </div>
                    <div class="form-group">
                        <label class="">Type</label> &nbsp;:
                        <label class="">Workers Compensation</label>
                    </div>
                    <div class="form-group">
                        <label class="">Location</label>&nbsp;:&nbsp;
                        <label class="">FL</label>
                    </div>
                    <div class="form-group">
                        <label class="">Date</label>&nbsp;:&nbsp;
                        <label class="">N/A</label>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="col-md-12">
        <div class="boxs-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><b>Referral Information</b></label>
                    </div>
                    <div class="form-group">
                        <label>Your reference <br>number</label>
                        <label></label>
                    </div>
                    <div class="form-group">
                        <label>Created by</label>
                        <label</label>
                    </div>


                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label></label>

                    </div>
                    <div class="form-group">
                        <label class="">Handled by</label>
                        <label class=""></label>
                    </div>
                    <div class="form-group">
                        <label class="">Handling firm</label>
                        <label class=""></label>
                    </div>
                    <div class="form-group">
                        <label class="">Referral Agreement</label>
                        <label class=""></label>
                    </div>
                    <div class="form-group">
                        <label class="">Referral Sent</label>
                        <label class=""></label>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script>
<script src="assets/js/vendor/footable/footable.all.min.js"></script>
<!--/ vendor javascripts -->

<!--  Custom JavaScripts  -->
<script src="assets/bundles/mainscripts.bundle.js"></script>	<!-- Custom Js -->

<!--  Page Specific Scripts  -->
<script >
    $(window).load(function () {
        $('.footable').footable();
    });
</script>
</body>
</html>