<?php
    require_once("connectDB.php");
    date_default_timezone_set('Asia/Kolkata');
    $d = date("Y-m-d");
    $t = date("H:i:sa");

    $card_uid = $_GET['card_uid'];

    $sql="SELECT * FROM `student` where `Rfid_No`=$card_uid";
    $res = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($res);

    if(isset($_GET['card_uid']) && $result['Status'] == 0 )          
    {

        $sql="SELECT * FROM `user_log` where user_rfid=$card_uid";
        $res = mysqli_query($conn, $sql);

        $sql="INSERT INTO `user_log` (`user_rfid`, `checkindate`, `timein`, `timeout`) VALUES ('$card_uid', '$d', '$t', NULL)";
        $res = mysqli_query($conn, $sql);

        $sql="UPDATE `student` set `Status` = 1 where Rfid_No=$card_uid";
        $res = mysqli_query($conn, $sql);

        $to_email = $result['email'];
        $subject = "Attendance";
        $body = "Dear Parent,\nYour ward entered the dept on $d at $t";
        $headers = "From:Goa Engineering College";

        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";
        } else {
            echo "Email sending failed...";
        }
    }   

    elseif(isset($_GET['card_uid']) && $result['Status'] == 1 )          
    {

        $sql="SELECT * FROM `user_log` where user_rfid=$card_uid and `timeout` IS NULL";
        $res = mysqli_query($conn, $sql);
        $result2 = mysqli_fetch_assoc($res);

        $da = date("Y-m-d", strtotime($result2['checkindate']));

        if( strtotime($d) == strtotime($da) )
        {
            $sql="UPDATE `user_log` SET `timeout`= '$t' where user_rfid=$card_uid AND `timeout` IS NULL AND checkindate = '$d'";
            $res = mysqli_query($conn, $sql);

            $sql="UPDATE `student` set `Status` = 0 where Rfid_No=$card_uid";
            $res = mysqli_query($conn, $sql);

            $to_email = $result['email'];
            $subject = "Attendance";
            $body = "Dear Parent,\nYour ward Left the dept on $d at $t";
            $headers = "From:Goa Engineering College";

            if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";
            } else {
            echo "Email sending failed...";
            }
        }

        else
        {
            $sql="SELECT * FROM `user_log` where user_rfid=$card_uid";
            $res = mysqli_query($conn, $sql);

            $sql="INSERT INTO `user_log` (`user_rfid`, `checkindate`, `timein`, `timeout`) VALUES ('$card_uid', '$d', '$t', NULL)";
            $res = mysqli_query($conn, $sql);

            $sql="UPDATE `student` set `Status` = 1 where Rfid_No=$card_uid";
            $res = mysqli_query($conn, $sql);

            $to_email = $result['email'];
            $subject = "Attendance";
            $body = "Dear Parent,\nYour ward entered the dept on $d at $t";
            $headers = "From:Goa Engineering College";

            if (mail($to_email, $subject, $body, $headers)) {
                echo "Email successfully sent to $to_email...";
            } 
            else {
                echo "Email sending failed...";
            }
        }
        
    }

    else
    {
        echo "Error";
    }

    
?>