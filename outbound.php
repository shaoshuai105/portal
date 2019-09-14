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
                    <h1 class="h3 m-0">Outbound Referrals</h1>
                    <small class="text-muted">12 items Last updated 06/15 at 12:00am</small>
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <section class="boxs ">
                    <div class="boxs-header">
<!--                        <h3 class="custom-font hb-cyan">-->
<!--                            <strong>FooTable</strong> Example</h3>-->

                    </div>
                    <div class="boxs-body">
                        <div class="form-group">
                            <label for="filter" style="padding-top: 5px">Search:</label>
                            <input id="filter" type="text" class="form-control rounded w-md mb-10 inline-block" />
                        </div>
                        <table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                            <thead>
                            <tr>
                                <th>REF#</th>
                                <th>Client</th>
                                <th data-hide="phone">Case Type</th>
                                <th data-hide='phone, tablet'>Case Location</th>
                                <th data-hide='phone, tablet'>Sent On</th>
                                <th>Last Updated</th>
                                <th>Status</th>
                                <th>Handler</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>235961</td>
                                <td></td>
                                <td>workers compensation</td>
                                <td>FL</td>
                                <td>May 20,2019</td>
                                <td>May 20,2019</td>
                                <td>Under Review</td>
                                <td>Pond,Lehocky,stern Danny Gonzalez</td>

                            </tr>
                            <tr>
                                <td>235961</td>
                                <td></td>
                                <td>workers compensation</td>
                                <td>FL</td>
                                <td>May 20,2019</td>
                                <td>May 20,2019</td>
                                <td>Under Review</td>
                                <td>Pond,Lehocky,stern Danny Gonzalez</td>

                            </tr>
                            <tr>
                                <td>235961</td>
                                <td></td>
                                <td>workers compensation</td>
                                <td>FL</td>
                                <td>May 20,2019</td>
                                <td>May 20,2019</td>
                                <td>Under Review</td>
                                <td>Pond,Lehocky,stern Danny Gonzalez</td>

                            </tr>
                            <tr>
                                <td>235961</td>
                                <td></td>
                                <td>workers compensation</td>
                                <td>FL</td>
                                <td>May 20,2019</td>
                                <td>May 20,2019</td>
                                <td>Under Review</td>
                                <td>Pond,Lehocky,stern Danny Gonzalez</td>

                            </tr>
                            <tr>
                                <td>235961</td>
                                <td></td>
                                <td>workers compensation</td>
                                <td>FL</td>
                                <td>May 20,2019</td>
                                <td>May 20,2019</td>
                                <td>Under Review</td>
                                <td>Pond,Lehocky,stern Danny Gonzalez</td>

                            </tr>
                            <tr>
                                <td>235961</td>
                                <td></td>
                                <td>workers compensation</td>
                                <td>FL</td>
                                <td>May 20,2019</td>
                                <td>May 20,2019</td>
                                <td>Under Review</td>
                                <td>Pond,Lehocky,stern Danny Gonzalez</td>

                            </tr>
                            <tr>
                                <td>235961</td>
                                <td></td>
                                <td>workers compensation</td>
                                <td>FL</td>
                                <td>May 20,2019</td>
                                <td>May 20,2019</td>
                                <td>Under Review</td>
                                <td>Pond,Lehocky,stern Danny Gonzalez</td>

                            </tr>
                            <tr>
                                <td>235961</td>
                                <td></td>
                                <td>workers compensation</td>
                                <td>FL</td>
                                <td>May 20,2019</td>
                                <td>May 20,2019</td>
                                <td>UReview</td>
                                <td>Pond,Lehocky,stern Danny Gonzalez</td>

                            </tr>
                            <tr>
                                <td>235961</td>
                                <td></td>
                                <td>workers compensation</td>
                                <td>FL</td>
                                <td>May 20,2019</td>
                                <td>May 20,2019</td>
                                <td>Under Review</td>
                                <td>Pond,Lehocky,stern Danny Gonzalez</td>

                            </tr>
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