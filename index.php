<?php
if (file_exists("install.php")) {
    unlink("install.php");
}
include('includes/connect.php');

if (isset($_GET['p'])) {
$p = mysqli_real_escape_string($connect, $_GET['p']);

switch($p) {
    case "home":
    include("includes/header.php");
    include("home.php");
    break;

    case "clients":
    include("includes/header.php");
    include("clients.php");
    break;

    default:
    include("includes/header.php");
    include("home.php");
    break;
}
}else{
    include("includes/header.php");
    include("home.php");
}
?>