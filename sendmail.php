<?php
require_once("connectDB.php");

$sql="SELECT * FROM `student` where `Roll_no`=201105040";
$res = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($res);

echo $result['email'];
$to_email = $result['email'];
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = "From:rahulkolwalkar2115@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

?>