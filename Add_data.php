<?php
//session_start();
//if (!isset($_SESSION['admin'])) {
  //header("location: index1.php");
// }
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
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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

  <!-- Main Code -->
  <main id="main" class="main">
    <div class="card">
      <div class="card-header">
        Students
          <button style="float:right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Upload New Data
          </button>
        
      </div>
      <table class="table table-borderless datatable" style="margin-left:10px">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Roll No.</th>
            <th scope="col">Depart</th>
            <th scope="col">Mobile</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
        <?php
          require_once("connectDB.php");
          $sql = "SELECT * FROM student ORDER BY Roll_no DESC";
          $res = mysqli_query($conn, $sql);
					    while ($result = mysqli_fetch_assoc($res)){
                ?>
                                <tr>
                                  <td><?php echo $result["Name"]?></td>
                                  <td><?php echo $result["Roll_no"]?></td>
                                  <td><?php echo $result["Department"]?></td>
                                  <td><?php echo $result["mobile"]?></td>
                                  <td><?php echo $result["email"]?></td>
                                  <td>
                                  <?php
                                      if ($result["Status"] == "1") {
                                        echo '<div class="btn btn-success">IN</div>';
                                      } else {
                                        echo '<div class="btn btn-danger">OUT</div>';
                                      } 
                                      ?>
                                  </td>
                                </tr>
                  <?php
					    }
		    ?>
        </tbody>
      </table>
    </div>

    <!-- New Devices -->
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  style="float:centre">Upload Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="stu_config.php" method="POST" enctype="multipart/form-data">
			      <div class="modal-body">
              <label>Select CSV File:</label>
			      	<input type="file" name="file">
			      </div>
			      <div class="modal-footer">
			        <button type="submit" name="dev_add" id="dev_add" class="btn btn-success">Upload</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			  </form>
    </div>
  </div>
</div>
		<!-- //New Devices -->

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