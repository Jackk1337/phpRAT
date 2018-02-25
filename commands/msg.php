<?php 
include("../includes/connect.php");
if (isset($_GET['guid'])) {
    $guid = mysqli_real_escape_string($connect, $_GET['guid']);
    $sql = "SELECT * FROM messages WHERE guid = '$guid'";
    $query = mysqli_query($connect, $sql);
    if (mysqli_num_rows($query) !=0 ) {
        while($rows = mysqli_fetch_array($query)) {
            echo $rows['message'];
        }

    }

}


?>