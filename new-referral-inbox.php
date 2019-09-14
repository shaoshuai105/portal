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
                    <h1 class="h3 m-0">New Referral Inbox</h1>
                    <small class="text-muted">0 items Last updated 06/15 at 12:00am</small>
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