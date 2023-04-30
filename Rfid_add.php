<?php
//session_start();
//if (!isset($_SESSION['admin'])) {
  //header("location: index1.php");
//}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Students</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <?php include 'header.php';?>
    </header>
  <!-- ======= End Header ======= -->

  <!-- ======= Sidebar ======= -->
  <?php include 'sidebar.php';?>
  <!-- ======= End Sidebar ======= -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Student Details</h1>
    </div><!-- End Page Title -->

  <form  action="rfid_config.php" method="POST" enctype="multipart/form-data">    
    <div class="mb-3">
    <label for="exampleInputRoll" class="form-label">Rfid Number</label>
    <select name="exampleInputRoll" class="form-control form-select" id="exampleInputRoll">
    <?php
            require_once("connectDB.php");
            $sql = "SELECT * FROM rfid where Roll_no IS NULL";
            $res = mysqli_query($conn, $sql);
            while ($result = mysqli_fetch_assoc($res)){
        ?>
                <option value="<?php echo $result['Rfid_No'];?>"><?php echo $result['Rfid_No']; ?></option>
        <?php
              }
        ?>
    </select>
    </div>

    <div class="mb-3">
    <label for="exampleFormControlSelect1" class="form-label">Roll Number</label>
    <select name="exampleFormControlSelect1" class="form-control form-select" id="exampleFormControlSelect1">
    <?php
            require_once("connectDB.php");
            $sql = "SELECT * FROM student where Rfid_No IS NULL";
            $res = mysqli_query($conn, $sql);
            while ($result = mysqli_fetch_assoc($res)){
        ?>
                <option value="<?php echo $result['Roll_no'];?>"><?php echo $result['Roll_no']; ?></option>
        <?php
              }
        ?>
    </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'footer.php';?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>