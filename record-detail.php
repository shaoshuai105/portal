<?php
session_start();
if (!isset($_SESSION['user_info'])){
    header("location:login.php");
}

?>
<?php
include "includes/header-content.php";
include "includes/sidebar-content.php";
include "includes/config.php";
$link= mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(!$link) {
    die('Could not connect to MySQL: ' . mysqli_error());
}

    $sql = "SELECT * FROM accounts WHERE AccountId = '".$_GET['id']."'";
    $result = mysqli_query($link,$sql);
    $data = mysqli_fetch_assoc($result);

    $query = "SELECT * FROM page_layout";
    $query_result = mysqli_query($link,$query);

?>
<style>
    .collapsible {
        background-color: #f0f3f5;
        color: black;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    }

    .active, .collapsible:hover {
        background-color: lightgrey;
    }

    .content {
        padding: 0 18px;
        display: none;
        overflow: hidden;
        /*background-color: #f1f1f1;*/
    }
</style>
<section id="content">
    <div class="page charts-page">
        <div class="row">
            <div class="col-md-12">
                <section class="record-box">

                    <div class="boxs-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label>Claim#</label></div>
                                <div class="col-md-8">
                                    <span class="under-text"><?php echo $data['Claimant__c']?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label>Account Name</label>&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-8">
                                    <span class="under-text"><?php echo $data['Name']?></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label>PIA</label>&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-8">
                                    <span class="under-text"><?php echo $data['PIA__c']?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label>Account SSN</label>&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-8">
                                    <span class="under-text"><?php echo $data['SSN__c']?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label>Street1</label>&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-8">
                                    <span class="under-text"><?php echo $data['Mailing_Street_1__c']?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label>Application Date</label>&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-8">
                                    <span class="under-text"><?php echo $data['Watermarked_Application_Printed__c']?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label>Street2</label>&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-8">
                                    <span class="under-text"><?php echo $data['Mailing_Street_2__c']?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label>Current Level</label>&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-8">
                                    <span class="under-text"><?php echo $data['Claim_Current_Level__c']?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label>Phone1</label>&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-8">
                                    <span class="under-text"><?php echo $data['Alt_Contact_1_Phone__c']?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label>City</label>&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-8">
                                    <span class="under-text"><?php echo $data['Mailing_City__c']?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label>Claim Status</label>&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-8">
                                    <span class="under-text"><?php echo $data['Status__c']?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label>Phone2</label>&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-8">
                                    <span class="under-text"><?php echo $data['Alt_Contact_2_Phone__c']?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label>State</label>&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-8">
                                    <span class="under-text"><?php echo $data['Applicant_Birth_City_State__c']?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label>Zip</label>&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-8">
                                    <span class="under-text"><?php echo $data['Residential_Zip__c']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <button class="collapsible">Awaiting Signature Pack</button>
            <div class="content">
                <table id="" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                    <?php
                    $data_row = array();
                    while ($row = mysqli_fetch_array($query_result)){
                        $data_row [] = $row;
                    }
                    for ($i = 0; $i<sizeof($data_row); $i++){
                        if ($data_row[$i][1] == '') break;
                        $field1 = $data_row[$i][1];
                        if ($field1 == '') echo sizeof($data_row);
                        echo "<tr><td style='width: 30%;'>".$field1."</td><td>".$data[$field1]."</td></tr>";
                        if ($data_row[$i][1] == '') break;
                    }
                    ?>
                </table>
            </div>
            <button class="collapsible">Initial Application</button>
            <div class="content">
                <table id="" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                    <?php
                    for ($i = 0; $i<sizeof($data_row); $i++){
                        if ($data_row[$i][2] == '') break;
                        $field2 = $data_row[$i][2];
                        echo "<tr><td style='width: 30%;'>".$field2."</td><td>".$data[$field2]."</td></tr>";
                        if ($data_row[$i][2] == '') break;
                    }

                    ?>
                </table>
            </div>
            <button class="collapsible">Request for Reconsideration</button>
            <div class="content">
                <table id="" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                    <?php
                    for ($i = 0; $i<sizeof($data_row); $i++){
                        if ($data_row[$i][3] == '') break;
                        $field3 = $data_row[$i][3];
                        echo "<tr><td style='width: 30%;'>".$field3."</td><td>".$data[$field3]."</td></tr>";
                        if ($data_row[$i][3] == '') break;
                    }
                    ?>
                </table>
            </div>
            <button class="collapsible">Hearing</button>
            <div class="content">
                <table id="" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                    <?php
                    for ($i = 0; $i<sizeof($data_row); $i++){
                        if ($data_row[$i][4] == '') break;
                        $field4 = $data_row[$i][4];
                        echo "<tr><td style='width: 30%'>".$field4."</td><td>".$data[$field4]."</td></tr>";
                        if ($data_row[$i][4] == '') break;
                    }
                    ?>
                </table>
            </div>
            <button class="collapsible">Appeals Council</button>
            <div class="content">
                <table id="" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                    <?php
                    for ($i = 0; $i<sizeof($data_row); $i++){
                        if ($data_row[$i][5] == '') break;
                        $field5 = $data_row[$i][5];
                        echo "<tr><td style='width: 30%'>".$field5."</td><td>".$data[$field5]."</td></tr>";
                        if ($data_row[$i][5] == '') break;
                    }
                    ?>
                </table>
            </div>
            <button class="collapsible">Closed Claim Information</button>
            <div class="content">
                <table id="" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                    <?php
                    echo "<tr>";
                    for ($i = 0; $i<sizeof($data_row); $i++){
                        if ($data_row[$i][6] == '') break;
                        $field6 = $data_row[$i][6];
                        echo "<tr><td style='width: 30%'>".$field6."</td><td>".$data[$field6]."</td></tr>";

                    }
                    ?>
                </table>
            </div>
            <button class="collapsible">Cases</button>
            <div class="content">
                <table id="" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                    <tr>
                        <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Created Date</td>
                        <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">CaseNumber</td>
                        <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">RecordType Name</td>
                        <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Subject</td>
                        <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Status</td>

                    </tr>
                    <?php
                    $query1 = "SELECT * FROM cases WHERE AccountId='".$_SESSION['user_info']['accountid']."'";
                    $re2 = mysqli_query($link,$query1);
                    while ($result3 = mysqli_fetch_array($re2)){

                        echo "<tr><td>".$result3['CreatedDate']."</td><td>".$result3['CaseNumber']."</td><td>".$result3['RecordType.Name']."</td><td>".$result3['Subject']."</td><td>".$result3['Status']."</td></tr>";
                    }
                    ?>
                </table>
            </div>
            <button class="collapsible">Attachments</button>
            <div class="content">
                <table id="" data-filter="#filter" data-page-size="5" class="footable table table-custom">
                    <tr>
                        <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Created Date</td>
                        <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Name</td>
                    </tr>
                    <?php
                    $query = "SELECT * FROM attachments WHERE AccountId='".$_SESSION['user_info']['accountid']."'";
                    $re1 = mysqli_query($link,$query);
                    while ($result1 = mysqli_fetch_array($re1)){
                        if ($result1['Name'] == ''){
                            break;
                        }else{
                            echo "<tr><td>".$result1['CreatedDate']."</td><td><a href='attachments/1.pdf' target='_blank'>".$result1['Name']."</a></td></tr>";
                        }
                    }
                    ?>
                </table>
            </div>
            <button class="collapsible">Payments</button>
            <div class="content">
                <table id="" data-filter="#filter" data-page-size="5" class="footable table table-custom">

                    <tr>
                        <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Created Date</td>
                        <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Name</td>
                        <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">RecordType Name</td>
                        <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Award Date</td>
                        <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Payment Status</td>
                        <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Payment Type</td>
                    </tr>
                    <?php
                    $sql_payment= "SELECT * FROM awardspayments WHERE AccountId='".$_SESSION['user_info']['accountid']."'";
                    $re_payment = mysqli_query($link,$sql_payment);

                    while ($result2 = mysqli_fetch_array($re_payment)){

                        echo "<tr><td>".$result2['CreatedDate']."</td><td>".$result2['Name']."</td><td>".$result2['RecordType.Name']."</td><td>".$result2['Award_Date__c']."</td><td>".$result2['Payment_Status__c']."</td><td>".$result2['Payment_Type__c']."</td></tr>";
                    }
                    ?>
                </table>
            </div>

        </div>

    </div>
<!--        <div class="row">-->
<!---->
<!--            <div class="col-md-12">-->
<!--                <section class="record-box">-->
<!--                    <div class="boxs-body">-->
<!--                        <table id="" data-filter="#filter" data-page-size="5" class="footable table table-custom">-->
<!--                            <tr>-->
<!--                                <td>-->
<!--                                    <table>-->
<!--                                        <tr><th colspan="2" class="td-title" style="border-bottom: 2px solid #ddd;">Realated Attachments</th></tr>-->
<!--                                        <tr>-->
<!--                                            <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Created Date</td>-->
<!--                                            <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Name</td>-->
<!--                                        </tr>-->
<!--                                        --><?php
//                                        $query = "SELECT * FROM attachments WHERE AccountId='".$_SESSION['user_info']['accountid']."'";
//                                        $re1 = mysqli_query($link,$query);
//                                        while ($result1 = mysqli_fetch_array($re1)){
//                                            if ($result1['Name'] == ''){
//                                                break;
//                                            }else{
//                                                echo "<tr><td>".$result1['CreatedDate']."</td><td><a href='attachments/1.pdf' target='_blank'>".$result1['Name']."</a></td></tr>";
//                                            }
//                                        }
//                                        ?>
<!--                                    </table>-->
<!--                                </td>-->
<!--                                <td>-->
<!--                                    <table>-->
<!--                                        <tr><th colspan="6" class="td-title" style="border-bottom: 2px solid #ddd;">Realated Payments</th></tr>-->
<!--                                        <tr>-->
<!--                                            <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Created Date</td>-->
<!--                                            <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Name</td>-->
<!--                                            <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">RecordType Name</td>-->
<!--                                            <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Award Date</td>-->
<!--                                            <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Payment Status</td>-->
<!--                                            <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Payment Type</td>-->
<!--                                        </tr>-->
<!--                                        --><?php
//                                        $sql_payment= "SELECT * FROM awardspayments WHERE AccountId='".$_SESSION['user_info']['accountid']."'";
//                                        $re_payment = mysqli_query($link,$sql_payment);
//
//                                            while ($result2 = mysqli_fetch_array($re_payment)){
//
//                                                echo "<tr><td>".$result2['CreatedDate']."</td><td>".$result2['Name']."</td><td>".$result2['RecordType.Name']."</td><td>".$result2['Award_Date__c']."</td><td>".$result2['Payment_Status__c']."</td><td>".$result2['Payment_Type__c']."</td></tr>";
//                                            }
//                                        ?>
<!--                                    </table>-->
<!--                                </td>-->
<!--                                <td>-->
<!--                                    <table>-->
<!--                                        <tr><th colspan="5" class="td-title" style="border-bottom: 2px solid #ddd;">Realated Cases</th></tr>-->
<!--                                        <tr>-->
<!--                                            <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Created Date</td>-->
<!--                                            <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">CaseNumber</td>-->
<!--                                            <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">RecordType Name</td>-->
<!--                                            <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Subject</td>-->
<!--                                            <td class="td-subtitle" style="border-bottom: 2px solid #ddd;">Status</td>-->
<!---->
<!--                                        </tr>-->
<!--                                        --><?php
//                                        $query1 = "SELECT * FROM cases WHERE AccountId='".$_SESSION['user_info']['accountid']."'";
//                                        $re2 = mysqli_query($link,$query1);
//                                        while ($result3 = mysqli_fetch_array($re2)){
//
//                                            echo "<tr><td>".$result3['CreatedDate']."</td><td>".$result3['CaseNumber']."</td><td>".$result3['RecordType.Name']."</td><td>".$result3['Subject']."</td><td>".$result3['Status']."</td></tr>";
//                                        }
//                                        ?>
<!--                                    </table>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                            <tbody>-->
<!--                        </table>-->
<!--                    </div>-->
<!--                </section>-->
<!--            </div>-->
<!--        </div>-->
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
    $('.header-title').html('Claimant Detail');
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>

</body>
</html>