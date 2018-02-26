<?php
include("includes/connect.php");
if (isset($_GET['new'])) {
    $guid = mysqli_real_escape_string($connect, $_GET['guid']);
    $hostname = mysqli_real_escape_string($connect, $_GET['hostname']);
    $ipaddress = mysqli_real_escape_string($connect, $_GET['ipaddress']);
    $os = mysqli_real_escape_string($connect, $_GET['os']);
    $ram = mysqli_real_escape_string($connect, $_GET['ram']);
    $processor = mysqli_real_escape_string($connect, $_GET['processor']);
    $gpu = mysqli_real_escape_string($connect, $_GET['gpu']);

    $sql = "INSERT INTO clients (hostname, ipaddress, guid, os, ram, gpu, processor, online) VALUES ('$hostname', '$ipaddress', '$guid', '$os', '$ram', '$gpu', '$processor', '1')";
    $query = mysqli_query($connect, $sql);
    echo mysqli_error($connect);
}   

?>