<?php
    require_once("connectDB.php");
    $sql = "SELECT COUNT(*) as cnt FROM student";
    $res = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($res)
?>

<?php
    $d = date("Y-m-d");
    require_once("connectDB.php");
    $sql = "SELECT COUNT(*) as cnt2 FROM ( SELECT COUNT(*) FROM user_log join student on Rfid_no=user_rfid where Status=1 and checkindate='$d' group by Roll_no) as tmp";
    $res = mysqli_query($conn, $sql);
    $result2 = mysqli_fetch_assoc($res)
?>

<h6><?php echo $result2['cnt2'];?>/<?php echo $result['cnt'];?></h6>