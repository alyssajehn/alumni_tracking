<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "alumni_tracking_system";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>