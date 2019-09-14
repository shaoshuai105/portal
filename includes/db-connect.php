<?php

include 'includes/config.php';
$link= mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(!$link){
    die('Could not connect to MySQL: ' . mysqli_error());
}

?>