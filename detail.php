<?php
session_start();
if (!isset($_SESSION['user_info'])){
    header("location:login.php");
}

?>
<?php
include "includes/db-connect.php";

?>
<?php
include "includes/header-content.php";
//include "includes/sidebar-content.php";
?>
<section id="content">
    <div class="page charts-page">

        <div class="b-b mb-10">
            <div class="row">
                <div class="col-sm-8 col-xs-12">
                    <h1 class="h3" style="text-align: center;">Claiment Detail</h1>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <section class="boxs" style="background-color: unset;">
                    <div class="boxs-header">
                        <!--                        <h3 class="custom-font hb-cyan">-->
                        <!--                            <strong>FooTable</strong> Example</h3>-->

                    </div>
                    <div class="boxs-body">

                        <table id="searchTextResults" data-filter="#filter" data-page-size="50" class="footable table table-custom">
                            <tbody id="list_content">
                                    <?php
                                        $data = array();
                                        $field = array();
                                        $sql = "SHOW COLUMNS FROM accounts";
                                        $num = 0;
                                        $result = mysqli_query($link,$sql);
                                        while ($row = mysqli_fetch_array($result)){
                                            $field[] = $row[0];//field name
                                            $num++;
                                        }
                                        if (isset($_GET['id'])){
                                            $sql1 = "SELECT * FROM accounts WHERE AccountId = '".$_GET['id']."'";
                                            $result1 = mysqli_query($link,$sql1);
                                            while ($row1 = mysqli_fetch_array($result1)){
                                                $data[] = $row1;
                                            }
                                        }

                                        for ($i = 0; $i < $num; $i++){
                                            echo "<tr>
                                                    <td>".$field[$i]."</td>
                                                    <td>".$data[0][$i]."</td>
                                                  </tr>";
                                        }
                                    ?>

                            </tbody>
                            <tfoot class="hide-if-no-paging">
                            <tr>
                                <td colspan="15" class="text-right">
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