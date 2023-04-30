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

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

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

  <!-- Link to call php files -->
  <script language="javascript" type="text/javascript">
  var timeout = setInterval(reloadChat,3000);    
  function reloadChat () {
     $('#links').load('present.php');
     $('#links1').load('absent.php');
     $('#links2').load('Attendance.php');
  }
  </script>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    .material-icons.orange600 { color: #FF0000; }
  </style>

  <style>
    .material-icons.green600 { color: #00ff00; }
  </style>

  <?php
    require_once("connectDB.php");
    $sql = "SELECT COUNT(*) as cnt FROM student";
    $res = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($res)
  ?>
                    
  <?php
    date_default_timezone_set('Asia/Kolkata');
    $d = date("Y-m-d");
    require_once("connectDB.php");
    $sql = "SELECT COUNT(*) as cnt2 FROM ( SELECT COUNT(*) FROM user_log join student on Rfid_no=user_rfid where Status=1 and checkindate='$d' group by Roll_no) as tmp";
    $res = mysqli_query($conn, $sql);
    $result2 = mysqli_fetch_assoc($res)
  ?>

   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Present',     <?php echo $result2['cnt2'];?>],
          ['Absent',      <?php echo $result['cnt'] - $result2['cnt2'];?>],
        ]);

        var options = {
          title: "Today's Attendance",
          is3D: true,
          colors: ['#1b9e77', '#d95f02']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
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
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Students Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Present <span>| Today</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span class="material-icons green600">group</span>
                    </div>
                    <div class="ps-3">
                    <div id="links">
                  </div>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Students Card -->

             <!-- Students Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Absent <span>| Today</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <span class="material-icons orange600">group_off </span>
                    </div>
                    <div class="ps-3">
                    <div id="links1">
                    </div>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Student Card -->

            <!-- Recent Attendance -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Recent Attendance <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Roll No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time In</th>
                        <th scope="col">Time Out</th>
                      </tr>
                    </thead>
                    <tbody id="links2"> 
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent -->

          <!-- Reports -->
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Attendance Chart</h5>
                <!-- Line Chart -->
                <div id="piechart_3d" style="height: 500px;"></div>
                <!-- End Line Chart -->
              </div>
            </div>
          </div><!-- End Reports -->
          </div>
        </div>
        <!-- End Left side columns -->
      </div>
    </section>

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'footer.php';?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>