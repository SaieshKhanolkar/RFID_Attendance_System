<?php 
require('connectDB.php');

    $stu_rfid = $_POST['exampleInputRoll'];
    $stu_name = $_POST['exampleInputName'];
    $stu_roll = $_POST['exampleFormControlSelect1'];
    $stu_dept = $_POST['exampleFormControlSelect2'];
    $stu_mob = $_POST['exampleInputmobile'];
    $stu_email = $_POST['exampleInputEmail'];
    $stu_date = $_POST['exampleInputdate'];
    $stu_genders = $_POST['gender'];

    //echo $stu_mob;
    $token = random_bytes(8);
    $dev_token = bin2hex($token);

    $sql = "UPDATE `student` SET `Rfid_No`='$stu_rfid' WHERE Roll_no='$stu_roll'";
    $res = mysqli_query($conn, $sql);

    $sql = "UPDATE `rfid` SET `Roll_no`='$stu_roll' WHERE Rfid_No='$stu_rfid'";
    $res = mysqli_query($conn, $sql);
    
    header("Location: http://localhost/Final/Rfid_add.php");

//*********************************************************************************
?>