<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{

$specilization=$_POST['Doctorspecialization'];
$doctorid=$_POST['doctor'];
$userid=$_SESSION['id'];
$fees=$_POST['fees'];
$appdate=$_POST['appdate'];
$time=$_POST['apptime'];
$userstatus=1;
$docstatus=1;

  $query=$conn->query("insert into appointment(doctorSpecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus')");
  if($query)
  {
    echo "<script>alert('Your appointment successfully booked');</script>";
  }

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
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
               <h6 class="h2 text-white d-inline-block mb-0"><?php $query=$conn->query("select fullName from patient where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
  echo $row['fullName'];
}
                  ?></h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User</li>
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
                          <h5 class="panel-title">Book Appointment</h5>
                        </div>
                        <div class="panel-body">
                <p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
                <?php echo htmlentities($_SESSION['msg1']="");?></p>  
                          <form role="form" name="book" method="post" >
                            


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
                              <label for="consultancyfees">
                                Consultancy Fees
                              </label>
          <select name="fees" class="form-control" id="docfees"  readonly >
            
            </select>
                            </div>
                            
<div class="form-group">
                              <label for="AppointmentDate">
                                Date
                              </label>
                  <input class="form-control datepicker" name="appdate"  type="date" required="required">
                            </div>
                            
<div class="form-group">
                              <label for="Appointmenttime">
                            
                            Time
                          
                              </label>
                  <input class="form-control datepicker" name="apptime" type="time" required="required">
                            </div>                            
                            
                            <button type="submit" name="submit" class="btn btn-o btn-primary">
                              Submit
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
   <?php include('include/footer.php');?>
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


