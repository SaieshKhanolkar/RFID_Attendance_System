<?php
    require_once("connectDB.php");
    //date_default_timezone_set('Asia/Damascus');
    //$d = date("Y-m-d");
    //$t = date("H:i:sa");

    if(isset($_GET['card_uid']) && isset($_GET['device_token']))
    {
        $card_uid = $_GET['card_uid'];
        $device_uid = $_GET['device_token'];

        $sql="INSERT INTO `rfid` (`Rfid_No`) VALUES ('$card_uid')";
        $res = mysqli_query($conn, $sql);
    }
?>