<?php
$dbHost = '127.0.0.1:3307';
$dbName = 'rfid_attendance';
$dbUsername = 'root';
$dbPassword = '';

$connect = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
?>
<?php
if($_FILES['file']['name'])
 {
$filename = explode(".", $_FILES['file']['name']);
if($filename[1] == 'csv')
{
$handle = fopen($_FILES['file']['tmp_name'], "r");
while($data = fgetcsv($handle))//handling csv file 
{
$item1 = mysqli_real_escape_string($connect, $data[0]);  
$item2 = mysqli_real_escape_string($connect, $data[1]);
$item3 = mysqli_real_escape_string($connect, $data[2]);  
$item4 = mysqli_real_escape_string($connect, $data[3]);
$item5 = mysqli_real_escape_string($connect, $data[4]);  
$item6 = mysqli_real_escape_string($connect, $data[5]);
$item7 = mysqli_real_escape_string($connect, $data[6]);  
//$item8 = mysqli_real_escape_string($connect, $data[7]);
//insert data from CSV file 
$query = "INSERT into student(Name,Roll_no,Department,Gender,mobile,email,dob) values('$item1','$item2','$item3','$item4','$item5','$item6','$item7')";
mysqli_query($connect, $query);
}
fclose($handle);
echo "File sucessfully imported";
header("Location: http://localhost/attendance/Add_Device.php");
}
}
header("Location: http://localhost/attendance/Add_Device.php");
?>
