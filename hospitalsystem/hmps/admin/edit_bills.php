<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$did=intval($_GET['id']);// get doctor id
if(isset($_POST['submit']))
{
  $docspecialization=$_POST['Doctorspecialization'];
$docname=$_POST['docname'];
$docaddress=$_POST['clinicaddress'];
$docfees=$_POST['docfees'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
//$sql=$conn->query("Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail' where id='$did'");
//if($sql)
///{
//echo "<script>alert('Doctor Details updated Successfully');</script>";

//}
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Hospital Management System</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <script type="text/javascript">
function getdoctor(val) {
  $.ajax({
  type: "POST",
  url: "get_doctors.php",
  data:'specilizationid='+val,
  success: function(data){
    $("#doctor").html(data);
  }
  });
}
</script> 


<script>
function getfee(val) {
  $.ajax({
  type: "POST",
  url: "get_doctors.php",
  data:'doctor='+val,
  success: function(data){
    $("#fees").html(data);
  }
  });
}
</script> 

</head>
<body>
  <!-- Sidenav -->
   <?php include('include/sidebar.php');?> 
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include('include/header.php');?>
    
    <!-- Header -->
    <!-- Header -->


    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Admin</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Admin</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
  <div class="col-xl-8 container-fluid mt--6 ">
          <div class="card">
            <div class="card-header">
                  
                  <div class="row margin-top-30">
                    <div class="col-lg-8 col-md-12">
                      <div class="panel panel-white">
                        <div class="panel-heading">
                          <h5 class="panel-title">Generate Bills</h5>
                        </div>

                        <div class="panel-body">
                  <?php $sql=$conn->query("select * from doctors where id='$did'");
while($data=mysqli_fetch_array($sql))
{
?>
                          <form role="form" action="pdf.php" method="POST">
                            <div class="form-group">
                              <label for="PatientName">
                                PatientName
                              </label>
                  <input type="text" name="patientname" class="form-control" required="required"  >
                            </div>

                            <div class="form-group">
                              <label for="DoctorSpecialization">
                                Doctor Specialization
                              </label>
              <select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
                                <option value="">Select Specialization</option>
<?php $ret=$conn->query("select * from doctorspecilization");
while($row=mysqli_fetch_array($ret))
{
?>
                                <option value="<?php echo htmlentities($row['specilization']);?>">
                                  <?php echo htmlentities($row['specilization']);?>
                                </option>
                                <?php } ?>
                                
                              </select>
                            </div>


<div class="form-group">
                              <label for="doctor">
                                Doctors
                              </label>
            <select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">
            <option value="">Select Doctor</option>
            </select>
                            </div>
                            <div class="form-group">
                              <label for="AppointmentDate">
                                Date
                              </label>
                  <input class="form-control datepicker" name="appdate"  type="date" required="required">
                            </div>

<div class="form-group">
                              <label for="fess">
                                 Doctor Consultancy Fees
                              </label>
    <input type="text" name="docfees" class="form-control" required="required" onChange="getfee(this.value);"  >
                            </div>
  
<div class="form-group">
                  <label for="fess">
                                 Hospital Fees
                              </label>
          <input type="text" name="hfees" class="form-control" required="required"  >
                            </div>
                            
                            <?php } ?>
                            
                            
                            <button type="submit" name="submit" class="btn btn-o btn-primary">
                              Generate
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                      
                      </div>
                    </div>
                  <div class="col-lg-12 col-md-12">
                      <div class="panel panel-white">
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>


