<?php
include "includes/db-connect.php";
    if (isset($_POST['export'])){
        if ($_POST['criteria'] == "hearing date and time not blank"){
            header('Connect-Type: text/csv; charset=uft-8');
            header('Content-Disposition: attachment; filename=data.csv');
            $output = fopen("php://output","w");
            fputcsv($output,array('Status','Onset Date','Claim Current Level','Asset Received Date','Client Pack Received Date','Government Pack Prited Date','Name','Created date','Client Last Engagement','Claim Type',
                'Claim Number','decision initial','DDS Initial Acknowledgment','Online App Error','Backlog app Submitted','Online Recon Attempted',
                'Online Recon Reentry','Online Hearing Attempted','Online Hering Reentry','Claim Hearing Date'));
            $sql1 = "SELECT * FROM accounts JOIN hearings ON accounts.AccountId=hearings.AccountId WHERE hearings.Hearing_Date_Time__c IS NOT NULL";
            $result1 = mysqli_query($link,$sql1);
            while ($row = mysqli_fetch_array($result1)){
                fputcsv($output,array($row['Status__c'],$row['Onset_Date__c'],$row['Claim_Current_Level__c'],$row['Asset_Received_Date__c'],$row['Client_Pack_Received__c'],$row['Government_Pack_Printed__c'],$row['AccountId'],$row['CreatedDate'],$row['Last_Client_Engagement__c'],$row['Claim_Type__c'],$row['Client_Number__c'],$row['Decision_Initial__c'],$row['DDS_Initial_Acknowledgement__c'],$row['Online_App_Error__c'],$row['Backlog_App_Submitted__c'],$row['Online_Recon_Attempted__c'],$row['Online_Recon_Reentry__c'],$row['Online_Hearing_Attempted__c'],$row['Online_Hearing_Reentry__c'],$row['Claim_Hearing_Date__c']));
            }
            fclose($output);
        }else{
            header('Connect-Type: text/csv; charset=uft-8');
            header('Content-Disposition: attachment; filename=data.csv');
            $output = fopen("php://output","w");
            fputcsv($output,array('Status','Onset Date','Claim Current Level','Asset Received Date','Client Pack Received Date','Government Pack Prited Date','Name','Created date','Client Last Engagement','Claim Type',
                'Claim Number','decision initial','DDS Initial Acknowledgment','Online App Error','Backlog app Submitted','Online Recon Attempted',
                'Online Recon Reentry','Online Hearing Attempted','Online Hering Reentry','Claim Hearing Date'));
            $sql = "SELECT * FROM accounts WHERE Claim_Current_Level__c='".$_POST['criteria']."'";
            $result = mysqli_query($link,$sql);
            while ($row = mysqli_fetch_array($result)){
                fputcsv($output,array($row['Status__c'],$row['Onset_Date__c'],$row['Claim_Current_Level__c'],$row['Asset_Received_Date__c'],$row['Client_Pack_Received__c'],$row['Government_Pack_Printed__c'],$row['AccountId'],$row['CreatedDate'],$row['Last_Client_Engagement__c'],$row['Claim_Type__c'],$row['Client_Number__c'],$row['Decision_Initial__c'],$row['DDS_Initial_Acknowledgement__c'],$row['Online_App_Error__c'],$row['Backlog_App_Submitted__c'],$row['Online_Recon_Attempted__c'],$row['Online_Recon_Reentry__c'],$row['Online_Hearing_Attempted__c'],$row['Online_Hearing_Reentry__c'],$row['Claim_Hearing_Date__c']));
            }
            fclose($output);
        }


    }
?>