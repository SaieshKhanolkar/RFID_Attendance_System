<?php
  date_default_timezone_set('Asia/Kolkata');
  $d = date("Y-m-d");

  require_once("connectDB.php");
  $sql = "SELECT * FROM user_log join student on user_rfid=Rfid_No where checkindate = '$d'";
  $res = mysqli_query($conn, $sql);
  
  while ($result = mysqli_fetch_assoc($res)){
?>

<tr>
  <td><?php echo $result['Roll_no'];?></td>
  <td><?php echo $result['Name'];?></td>
  <td><?php echo $result['Department'];?></td>
  <td><?php echo $result['checkindate'];?></td>
  <td><?php echo $result['timein'];?></td>
  <td><?php echo $result['timeout'];?></td>
  </tr>

<?php
  }
?>                    