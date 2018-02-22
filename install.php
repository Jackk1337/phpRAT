<?php
if (isset($_POST['create'])) {
    //Gather server connection details
    $server = $_POST['database_host'];
    $username = $_POST['database_username'];
    $password = $_POST['database_password'];
    //Initlize connection
    $connect = mysqli_connect($server, $username, $password);
    if (!$connect) {
        $error = "Unable to connect to database server. Please check details and try again.";
    }else{
        $sql = "CREATE DATABASE phpRAT";
        if (mysqli_query($connect, $sql)) {
            $success = "Created database phpRAT on server " . $server . "!";
            $database = "phpRAT";
            mysqli_close($connect);
            $connect = mysqli_connect($server, $username, $password, $database);
            $sql = "CREATE TABLE `users` (
                `uid` int(11) NOT NULL,
                `username` varchar(30) NOT NULL,
                `password` varchar(60) NOT NULL,
                `email` varchar(30) NOT NULL,
                `ipaddress` varchar(128) NOT NULL
              )";
              if (mysqli_query($connect, $sql)) {
                $success = "Created table 'users' inside database phpRAT on server " . $server . "!";
              }else{
                $error = "Error creating table 'users' inside database 'phpRAT'" . mysqli_error($connect);
              }
        }else{
            $error = "We connected, but we were unable to create the database! " . mysqli_error($connect);
        }
        mysqli_close($connect);
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>phpRAT - Install</title>
  </head>
  <body>
 <!-- Custom styles for this template -->
 <link href="/css/install.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="install.php" method="POST">
        <center><h2 class="form-signin-heading">phpRAT Installer</h2></center>
        <input type="text" name="database_host" class="form-control" placeholder="Database Host" required autofocus>
        <input type="text" name="database_username" class="form-control" placeholder="Database Username" required>
        <input type="password" name="database_password" class="form-control" placeholder="Database Password" required>
        <button name="create"class="btn btn-lg btn-primary btn-block" type="submit">Install!</button>
        <?php 
        if (isset($error)) {
            echo "<font color='red'>" .$error. "!</font>";
        }
        if (isset($success)) {
            echo "<font color='green'>" .$success. "</font>";
        }
        ?>
      </form>
    </div> <!-- /container -->
  </body>
</html>
  </body>
</html>
