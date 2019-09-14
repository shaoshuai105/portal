<?php
session_start();
if (!isset($_SESSION['user_info'])){
    header("location:login.php");
}

?>
<?php
    include "includes/db-connect.php";
    if (isset($_POST['current_level'])){
        $sql = "INSERT INTO view (current_level,current_status,referral_date_start,referral_date_end,signup_date_start,signup_date_end,award_date_start,award_date_end)
 VALUES ('".$_POST['current_level']."','".$_POST['current_status']."','".$_POST['referral_date_start']."','".$_POST['referral_date_end']."','".$_POST['signup_date_start']."',
 '".$_POST['signup_date_end']."','".$_POST['award_date_start']."','".$_POST['award_date_end']."')";

        $result = mysqli_query($link,$sql);
        if ($result){
            echo "Success";
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
            <div class="col-md-4">
                <div class="form-group">
                    <select id="criteria" name="criteria" class="form-control mb-10" data-parsley-trigger="change" onchange="getlist(this.value)" required>
                        <option value="">Dropdown option for list views</option>
                        <option value="Pending Level 1">Initial Application</option>
                        <option value="Pending Level 2">Request for Reconsideration</option>
                        <option value="Pending Level 3">Hearing Requested</option>
                        <option value="hearing date and time not blank">Hearing Scheduled</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="filter" style="padding-top: 5px">Search:</label>
                    <input id="filter" type="text" class="form-control rounded w-md mb-10 inline-block" />
                </div>
            </div>
            <div class="col-md-4" style="text-align: center">
                <button class="btn btn-raised btn-success" data-toggle="modal" data-target="#create_view">Create New View</button>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <section class="boxs" style="background-color: unset;">
                    <div class="boxs-body">

                        <table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                            <thead>
                            <tr>
                                <th>Claim#</th>
                                <th>Name</th>
                                <th data-hide="phone">Current Level</th>
                                <th data-hide='phone, tablet'>Current SMMS</th>
                                <th data-hide='phone, tablet'>LTD REP</th>
                                <th>Created Date</th>
                                <th>Last Engagement Date</th>

                            </tr>
                            </thead>
                            <tbody id="list_content">

                            </tbody>
                            <tfoot class="hide-if-no-paging">
                            <tr>
                                <td colspan="5" class="text-right">
                                    <ul class="pagination">
                                    </ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
</div>

<div class="modal fade" id="create_view" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-decoration: underline;text-align: center;">Create New View</h4><br>
            </div>

            <div class="modal-body">

                <section class="boxs">
                    <!-- boxs header -->
                    <div class="boxs-header">
                        <h3 class="custom-font hb-blush">
                            Enter View information
                        </h3>
                    </div>
                    <div class="boxs-body">
                        <form action="list_views.php" method="post">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Current Level </label>
                                    <input type="text" name="current_level" id="current_level" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Current Status</label>
                                    <input type="text" name="current_status" id="current_status" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Referral Date Start </label>
                                    <input type="date" name="referral_date_start" id="referral_date_start" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Referral Date End </label>
                                    <input type="date" name="referral_date_end" id="referral_date_end" class="form-control" required>
                                </div>
<!--                                <div class="form-group col-md-6">-->
<!--                                    <label for="name">Owner</label>-->
<!--                                    <input type="text" name="owner" id="owner" class="form-control" required>-->
<!--                                </div>-->
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Signup Date Start</label>
                                    <input type="date" name="signup_date_start" id="signup_date_start" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Signup Date End</label>
                                    <input type="date" name="signup_date_end" id="signup_date_end" class="form-control" required>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Award Date Start</label>
                                    <input type="date" name="award_date_start" id="award_date_start" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Award Date End</label>
                                    <input type="date" name="award_date_end" id="award_date_end" class="form-control" required>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-raised btn-success">Save</button>

                            </div>
                        </form>
                    </div>
                </section>
            </div>

        </div>
    </div>
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
<script src="assets/js/vendor/footable/footable.all.min.js"></script>



<script type="text/javascript">
    $('.header-title').html('Claimant List View');
    $(window).load(function () {
        $('.footable').footable();
    });
    function getlist(val){
        $.post('/ajax.php',{task:'getlist',value:val},
        function (data) {

            $("#searchTextResults").html(data);
        })
    }
</script>
</body>
</html>