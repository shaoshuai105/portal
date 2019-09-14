<?php
include 'includes/config.php';
$link= mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(!$link) {
    die('Could not connect to MySQL: ' . mysqli_error());
}
$final_data = '';
$dashboard_data = array();
if ($_POST['task'] == 'get_dashboard'){

    if (isset($_POST['level_start_value']) AND isset($_POST['level_end_value'])){

        $h = "SELECT * From level";
        $c = "SELECT * From closed_reason";
        $p = "SELECT * FROM payment_status";

        $result_h = mysqli_query($link, $h);
        $result_c = mysqli_query($link, $c);
        $result_p = mysqli_query($link, $p);

        while ($row_h = mysqli_fetch_array($result_h)) {
            $s1 = "SELECT COUNT(*) c FROM accounts WHERE Claim_Current_Level__c='" . $row_h['name'] . "' AND CreatedDate > '".$_POST['level_start_value']."' AND CreatedDate < '".$_POST['level_end_value']."'";

            $result_s1 = mysqli_query($link, $s1);
            $dashboard_data[0][] = mysqli_fetch_assoc($result_s1);
            $dashboard_data[2][] = $row_h['name'];
        }
        while ($row_c = mysqli_fetch_array($result_c)) {
            $s2 = "SELECT COUNT(*) c FROM accounts WHERE Closed_Reason__c='" . $row_c['subject'] . "'";
            $result_s2 = mysqli_query($link, $s2);
            $dashboard_data[1][] = mysqli_fetch_assoc($result_s2);
        }
        while ($row_P = mysqli_fetch_array($result_p)) {
            $s3 = "SELECT COUNT(*) c FROM awardspayments WHERE Payment_Status__c='" . $row_P['payment_status'] . "'";
            $result_s3 = mysqli_query($link, $s3);
            $dashboard_data[3][] = mysqli_fetch_assoc($result_s3);
        }

        $final_data = json_encode($dashboard_data);
    }elseif (isset($_POST['payment_start_value']) AND isset($_POST['payment_end_value'])){
        $h = "SELECT * From level";
        $c = "SELECT * From closed_reason";
        $p = "SELECT * FROM payment_status";

        $result_h = mysqli_query($link, $h);
        $result_c = mysqli_query($link, $c);
        $result_p = mysqli_query($link, $p);

        while ($row_h = mysqli_fetch_array($result_h)) {
            $s1 = "SELECT COUNT(*) c FROM accounts WHERE Claim_Current_Level__c='" . $row_h['name'] . "' ";

            $result_s1 = mysqli_query($link, $s1);
            $dashboard_data[0][] = mysqli_fetch_assoc($result_s1);
            $dashboard_data[2][] = $row_h['name'];
        }
        while ($row_c = mysqli_fetch_array($result_c)) {
            $s2 = "SELECT COUNT(*) c FROM accounts WHERE Closed_Reason__c='" . $row_c['subject'] . "'";
            $result_s2 = mysqli_query($link, $s2);
            $dashboard_data[1][] = mysqli_fetch_assoc($result_s2);
        }
        while ($row_P = mysqli_fetch_array($result_p)) {
            $s3 = "SELECT COUNT(*) c FROM awardspayments WHERE Payment_Status__c='" . $row_P['payment_status'] . "'AND CreatedDate > '".$_POST['payment_start_value']."'AND CreatedDate < '".$_POST['payment_end_value']."'";
            $result_s3 = mysqli_query($link, $s3);
            $dashboard_data[3][] = mysqli_fetch_assoc($result_s3);
        }

        $final_data = json_encode($dashboard_data);
    }elseif (isset($_POST['reason_start_value']) AND isset($_POST['reason_end_value'])){
        $h = "SELECT * From level";
        $c = "SELECT * From closed_reason";
        $p = "SELECT * FROM payment_status";

        $result_h = mysqli_query($link, $h);
        $result_c = mysqli_query($link, $c);
        $result_p = mysqli_query($link, $p);

        while ($row_h = mysqli_fetch_array($result_h)) {
            $s1 = "SELECT COUNT(*) c FROM accounts WHERE Claim_Current_Level__c='" . $row_h['name'] . "' ";

            $result_s1 = mysqli_query($link, $s1);
            $dashboard_data[0][] = mysqli_fetch_assoc($result_s1);
            $dashboard_data[2][] = $row_h['name'];
        }
        while ($row_c = mysqli_fetch_array($result_c)) {
            $s2 = "SELECT COUNT(*) c FROM accounts WHERE Closed_Reason__c='" . $row_c['subject'] . "'AND CreatedDate > '".$_POST['reason_start_value']."'AND CreatedDate < '".$_POST['reason_end_value']."'";
            $result_s2 = mysqli_query($link, $s2);
            $dashboard_data[1][] = mysqli_fetch_assoc($result_s2);
        }
        while ($row_P = mysqli_fetch_array($result_p)) {
            $s3 = "SELECT COUNT(*) c FROM awardspayments WHERE Payment_Status__c='" . $row_P['payment_status'] . "'";
            $result_s3 = mysqli_query($link, $s3);
            $dashboard_data[3][] = mysqli_fetch_assoc($result_s3);
        }

        $final_data = json_encode($dashboard_data);
    }else {

        $h = "SELECT * From level";
        $c = "SELECT * From closed_reason";
        $p = "SELECT * FROM payment_status";

        $result_h = mysqli_query($link, $h);
        $result_c = mysqli_query($link, $c);
        $result_p = mysqli_query($link, $p);

        while ($row_h = mysqli_fetch_array($result_h)) {
            $s1 = "SELECT COUNT(*) c FROM accounts WHERE Claim_Current_Level__c='" . $row_h['name'] . "'";
            $result_s1 = mysqli_query($link, $s1);
            $dashboard_data[0][] = mysqli_fetch_assoc($result_s1);
            $dashboard_data[2][] = $row_h['name'];
        }
        while ($row_c = mysqli_fetch_array($result_c)) {
            $s2 = "SELECT COUNT(*) c FROM accounts WHERE Closed_Reason__c='" . $row_c['subject'] . "'";
            $result_s2 = mysqli_query($link, $s2);
            $dashboard_data[1][] = mysqli_fetch_assoc($result_s2);
        }
        while ($row_P = mysqli_fetch_array($result_p)) {
            $s3 = "SELECT COUNT(*) c FROM awardspayments WHERE Payment_Status__c='" . $row_P['payment_status'] . "'";
            $result_s3 = mysqli_query($link, $s3);
            $dashboard_data[3][] = mysqli_fetch_assoc($result_s3);
        }

        $final_data = json_encode($dashboard_data);
    }
echo $final_data;
}

if ($_POST['task'] == 'getlist'){
    //echo $_POST['value'];
    //Closed_Date__c  Claim_Current_Level__c
    if ($_POST['value'] == "Closed_Date__c"){
        $sql = "SELECT * FROM accounts WHERE Closed_Date__c IS NOT NULL";
        $result = mysqli_query($link,$sql);
        $h = "<thead>
                            <tr>
                                <th>Claim#</th>
                                <th>Name</th>
                                <th data-hide=\"phone\">Current Level</th>
                                <th data-hide='phone, tablet'>Current SMMS</th>
                                <th data-hide='phone, tablet'>LTD REP</th>
                                <th>Created Date</th>
                                <th>Last Engagement Date</th>

                            </tr>
                            </thead><tbody>";
        while ($row = mysqli_fetch_array($result)){
            $h.= "<tr>
                    <td>".$row['AccountId']."</td>
                    <td><a href='/record-detail.php?id=".$row['AccountId']."' target='_blank'>".$row['Name']."</a></td>
                    <td>".$row['Claim_Current_Level__c']."</td>
                    <td>".$row['AccountId']."</td>
                    <td>".$row['AccountId']."</td>
                    <td>".$row['CreatedDate']."</td>
                    <td>".$row['Last_Client_Engagement__c']."</td>
              </tr>";
        }
        $h.="</tbody>";
        echo $h;
    } elseif ($_POST['value'] == "hearing date and time not blank"){
        $sql1 = "SELECT * FROM accounts JOIN hearings ON accounts.AccountId=hearings.AccountId WHERE hearings.Hearing_Date_Time__c IS NOT NULL";

        $result1 = mysqli_query($link,$sql1);
        $html = "<thead>
                        <tr>
                            <th>Status</th>
                            <th>Onset Date</th>
                            <th>Claim Current Level</th>
                            <th>Asset Received Date</th>
                            <th>Client Pack Received Date</th>
                            <th>Government Pack Prited Date</th>
                            <th>Name</th>
                            <th>Created date</th>
                            <th>Client Last Engagement</th>
                            <th>Claim Type</th>
                            <th>Claim Number</th>
                            <th>decision initial</th>
                            <th>DDS Initial Acknowledgment</th>
                            <th>Online App Error</th>
                            <th>Backlog app Submitted</th>
                            <th>Online Recon Attempted</th>
                            <th>Online Recon Reentry</th>
                            <th>Online Hearing Attempted</th>
                            <th>Online Hearing Reentry</th>
                            <th>Claim Hearing Date</th>
                            
                        </tr>
                </thead>
                <tbody>";
        while ($row = mysqli_fetch_array($result1)){
            $html.= "<tr>
                    <td>".$row['Status__c']."</td>
                    <td>".$row['Onset_Date__c']."</td>
                    <td>".$row['Claim_Current_Level__c']."</td>
                    <td>".$row['Asset_Received_Date__c']."</td>
                    <td>".$row['Client_Pack_Received__c']."</td>
                    <td>".$row['Government_Pack_Printed__c']."</td>
                    <td><a href='/record-detail.php?id=".$row['AccountId']."' target='_blank'>".$row['Name']."</a></td>
                    <td>".$row['CreatedDate']."</td>
                    <td>".$row['Last_Client_Engagement__c']."</td>
                    <td>".$row['Claim_Type__c']."</td>
                    <td>".$row['Client_Number__c']."</td>
                    <td>".$row['Decision_Initial__c']."</td>
                    <td>".$row['DDS_Initial_Acknowledgement__c']."</td>
                    <td>".$row['Online_App_Error__c']."</td>
                    <td>".$row['Backlog_App_Submitted__c']."</td>
                    <td>".$row['Online_Recon_Attempted__c']."</td>
                    <td>".$row['Online_Recon_Reentry__c']."</td>
                    <td>".$row['Online_Hearing_Attempted__c']."</td>
                    <td>".$row['Online_Hearing_Reentry__c']."</td>
                    <td>".$row['Claim_Hearing_Date__c']."</td>
                    
              </tr>";
        }
        $html.="</tbody>";
        echo $html;
    }
    $sql = "SELECT * FROM accounts WHERE Claim_Current_Level__c='".$_POST['value']."'";

    $result = mysqli_query($link,$sql);
    if ($_POST['value'] == "Pending Level 1"){
        $html1 = "<thead>
                        <tr>
                            <th>Status</th>
                            <th>Onset Date</th>
                            <th>Claim Current Level</th>
                            <th>Asset Received Date</th>
                            <th>Client Pack Received Date</th>
                            <th>Government Pack Prited Date</th>
                            <th>Name</th>
                            <th>Created date</th>
                            <th>Client Last Engagement</th>
                            <th>Claim Type</th>
                            <th>Claim Number</th>
                            <th>decision initial</th>
                            <th>DDS Initial Acknowledgment</th>
                            <th>Online App Error</th>
                            <th>Backlog app Submitted</th>
                            
                            
                        </tr>
                </thead>
                <tbody>";
        while ($row = mysqli_fetch_array($result)){
            $html1.= "<tr>
                <td>".$row['Status__c']."</td>
                <td>".$row['Onset_Date__c']."</td>
                <td>".$row['Claim_Current_Level__c']."</td>
                <td>".$row['Asset_Received_Date__c']."</td>
                <td>".$row['Client_Pack_Received__c']."</td>
                <td>".$row['Government_Pack_Printed__c']."</td>
                <td><a href='/record-detail.php?id=".$row['AccountId']."' target='_blank'>".$row['Name']."</a></td>
                <td>".$row['CreatedDate']."</td>
                <td>".$row['Last_Client_Engagement__c']."</td>
                <td>".$row['Claim_Type__c']."</td>
                <td>".$row['Client_Number__c']."</td>
                <td>".$row['Decision_Initial__c']."</td>
                <td>".$row['DDS_Initial_Acknowledgement__c']."</td>
                <td>".$row['Online_App_Error__c']."</td>
                <td>".$row['Backlog_App_Submitted__c']."</td>
                              
          </tr>";

        }
        $html1.="</tbody>";
        echo $html1;
    }elseif ($_POST['value'] == "Pending Level 2"){
        $html2 = "<thead>
                        <tr>
                            <th>Status</th>
                            <th>Onset Date</th>
                            <th>Claim Current Level</th>
                            <th>Asset Received Date</th>
                            <th>Client Pack Received Date</th>
                            <th>Government Pack Prited Date</th>
                            <th>Name</th>
                            <th>Created date</th>
                            <th>Client Last Engagement</th>
                            <th>Claim Type</th>
                            <th>Claim Number</th>
                            <th>decision initial</th>
                            <th>DDS Initial Acknowledgment</th>
                            <th>Online App Error</th>
                            <th>Backlog app Submitted</th>
                            <th>Online Recon Attempted</th>
                            <th>Online Recon Reentry</th>
                            
                            
                        </tr>
                </thead>
                <tbody>";
        while ($row = mysqli_fetch_array($result)){
            $html2.= "<tr>
                    <td>".$row['Status__c']."</td>
                    <td>".$row['Onset_Date__c']."</td>
                    <td>".$row['Claim_Current_Level__c']."</td>
                    <td>".$row['Asset_Received_Date__c']."</td>
                    <td>".$row['Client_Pack_Received__c']."</td>
                    <td>".$row['Government_Pack_Printed__c']."</td>
                    <td><a href='/record-detail.php?id=".$row['AccountId']."' target='_blank'>".$row['Name']."</a></td>
                    <td>".$row['CreatedDate']."</td>
                    <td>".$row['Last_Client_Engagement__c']."</td>
                    <td>".$row['Claim_Type__c']."</td>
                    <td>".$row['Client_Number__c']."</td>
                    <td>".$row['Decision_Initial__c']."</td>
                    <td>".$row['DDS_Initial_Acknowledgement__c']."</td>
                    <td>".$row['Online_App_Error__c']."</td>
                    <td>".$row['Backlog_App_Submitted__c']."</td>
                    <td>".$row['Online_Recon_Attempted__c']."</td>
                    <td>".$row['Online_Recon_Reentry__c']."</td>
                    
                    
              </tr>";
        }
        $html2.="</tbody>";
        echo $html2;
    }elseif ($_POST['value'] == "Pending Level 3"){
        $html3 = "<thead>
                        <tr>
                            <th>Status</th>
                            <th>Onset Date</th>
                            <th>Claim Current Level</th>
                            <th>Asset Received Date</th>
                            <th>Client Pack Received Date</th>
                            <th>Government Pack Prited Date</th>
                            <th>Name</th>
                            <th>Created date</th>
                            <th>Client Last Engagement</th>
                            <th>Claim Type</th>
                            <th>Claim Number</th>
                            <th>decision initial</th>
                            <th>DDS Initial Acknowledgment</th>
                            <th>Online App Error</th>
                            <th>Backlog app Submitted</th>
                            <th>Online Recon Attempted</th>
                            <th>Online Recon Reentry</th>
                            <th>Online Hearing Attempted</th>
                            <th>Online Hering Reentry</th>
                            <th>Claim Hearing Date</th>
                            
                        </tr>
                </thead>
                <tbody>";
        while ($row = mysqli_fetch_array($result)){
            $html3.= "<tr>
                    <td>".$row['Status__c']."</td>
                    <td>".$row['Onset_Date__c']."</td>
                    <td>".$row['Claim_Current_Level__c']."</td>
                    <td>".$row['Asset_Received_Date__c']."</td>
                    <td>".$row['Client_Pack_Received__c']."</td>
                    <td>".$row['Government_Pack_Printed__c']."</td>
                    <td><a href='/record-detail.php?id=".$row['AccountId']."' target='_blank'>".$row['Name']."</a></td>
                    <td>".$row['CreatedDate']."</td>
                    <td>".$row['Last_Client_Engagement__c']."</td>
                    <td>".$row['Claim_Type__c']."</td>
                    <td>".$row['Client_Number__c']."</td>
                    <td>".$row['Decision_Initial__c']."</td>
                    <td>".$row['DDS_Initial_Acknowledgement__c']."</td>
                    <td>".$row['Online_App_Error__c']."</td>
                    <td>".$row['Backlog_App_Submitted__c']."</td>
                    <td>".$row['Online_Recon_Attempted__c']."</td>
                    <td>".$row['Online_Recon_Reentry__c']."</td>
                    <td>".$row['Online_Hearing_Attempted__c']."</td>
                    <td>".$row['Online_Hearing_Reentry__c']."</td>
                    <td>".$row['Claim_Hearing_Date__c']."</td>
                    
              </tr>";
        }
        $html3.="</tbody>";
        echo $html3;
    }


}